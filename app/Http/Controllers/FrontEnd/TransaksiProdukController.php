<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\TransaksiProduk;
use App\Http\Controllers\Controller;
use App\Models\ProgressPembelian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiProdukController extends Controller
{

    public function detailProduk(Produk $produk)
    {

        return view('home.detail-produk', compact('produk'));
    }

    public function keranjang()
    {
        $user_id = Auth::user()->id;
        $keranjangs = Keranjang::with(['produk.kategori', 'user'])->where('status', 'Di Keranjang')->where('user_id', $user_id)->get();

        // dd(($keranjangs));
        return view('home.pembelian-produk.keranjang', compact('keranjangs'));
    }


    public function addToCart(Produk $Produk, Request $request)
    {

        $failsStatus = [];


        // Cek stok
        if ($Produk->stok < $request->qty) {
            $failsStatus = [
                'nama_produk' => $Produk->nama_produk,
                'stok_tersedia' => $Produk->stok,
                'qty_dipesan' => $request->qty
            ];
        }


        // Jika ada produk yang stoknya tidak mencukupi
        if (!empty($failsStatus)) {
            return redirect()->back()->with('errors', $failsStatus);
        }
        // dd($request->all());
        $keranjang = new Keranjang();
        $qty = $request->qty ?? 1;
        $user_id = Auth::user()->id;
        // dd($keranjang->where('user_id', $user_id)->where('produk_id', $Produk->id)->where('status', 'Di Keranjang')->exists());
        if ($keranjang->where('user_id', $user_id)->where('produk_id', $Produk->id)->where('status', 'Di Keranjang')->exists()) {
            $keranjang->where('user_id', $user_id)->where('status', 'Di Keranjang')->where('produk_id', $Produk->id)->increment('qty', $qty);
        } else {

            $keranjang->produk_id = $Produk->id;
            $keranjang->user_id = $user_id;
            $keranjang->qty = $qty;
            $keranjang->status = 'Di Keranjang';
            $keranjang->size = $request->size;
            $keranjang->save();
        }

        return to_route('home.keranjang');
    }

    private function createNotification($transaksi)
    {
       $notification = Notification::create([
            'title' => 'Transaksi Baru',
            'message' => 'Transaksi baru dibuat oleh ' . Auth::user()->name . ' - Total: Rp ' . number_format($transaksi->total_harga, 0, ',', '.'),
            'type' => 'transaction',
            'data' => [
                'transaction_id' => $transaksi->id,
                'customer_name' => Auth::user()->name,
                'total_amount' => $transaksi->total_harga,
                'status' => 'Dalam Transaksi'
            ]
        ]);

    }

    public function checkout(Request $request)
    {
        $total_harga = 0;


        // if ($request->has('id_')) {
        //     $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->whereIn('id', array_keys($request->produk_id))->get();
        // } else {

        //     $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->where('user_id', Auth::user()->id)->get();
        // }



        // Cek jika produk ada di transaksi
        $productExist = Keranjang::with(['produk.kategori', 'user', 'produk' => function ($query) use ($request) {
            $query->whereIn('id', array_keys($request->produk_id));
        }])
            ->where('status', 'Di Keranjang')
            ->where('user_id', Auth::user()->id);

        $productExistCheck = $productExist->get();

        if ($request->has('id_')) {
            $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->whereIn('id', $request->id_)->where('status', 'Di Keranjang')->where('user_id', Auth::user()->id)->get();
        } else {
            // Jika tidak
            $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->where('status', 'Di Keranjang')->where('user_id', Auth::user()->id)->get();
        }

        try {
            DB::beginTransaction();


            $newKeranjang->each(function($item) {
                $item->status = 'Dalam Transaksi';
                $item->save();
            });
            // Jika request punya yang di checkbox



            foreach ($newKeranjang as $item) {
                $price = $item->qty * $item->produk->harga_produk;
                $total_harga += $price;
            }


            $transaksi = new Transaksi();
            $transaksi->user_id = Auth::user()->id;
            $transaksi->status_pembayaran = 'Dalam Transaksi';
            $transaksi->total_harga = $total_harga;
            $transaksi->save();


            foreach ($newKeranjang as $cart) {
                $transaksiProduk = new TransaksiProduk();
                $transaksiProduk->transaksi_id = $transaksi->id;
                $transaksiProduk->produk_id = $cart->produk->id;
                $transaksiProduk->total_price = $cart->produk->harga_produk * $cart->qty;
                $transaksiProduk->qty = $cart->qty;
                $transaksiProduk->size = $cart->size;
                $transaksiProduk->save();
            }

            // $newKeranjang->update(['status' => 'Dalam Transaksi']);
            $this->createNotification($transaksi);



            DB::commit();
            return to_route('home.formTransaksiPembelian', ['transaksi' => $transaksi]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan checkout.');
        }
    }


    public function formLengkapiPembelian(Transaksi $transaksi)
    {
        $transaksi =  $transaksi->with(['detailTransaksi.produk.kategori', 'user'])->where('id', $transaksi->id)->first();

        return view('home.pembelian-produk.formulir-pembelian-produk', compact('transaksi'));
    }


    public function storeDataTransaksi(Request $request, Transaksi $transaksi)
    {

        // dd($request->all());
        $transaksi->update([
            'user_id' => Auth::id(), // atau gunakan $request->user_id jika ada
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'catatan' => $request->catatan,
            'status_pembayaran' => 'Dalam Transaksi', // Atur status default sebagai 'Dalam Transaksi'
            'metode_pembayaran' => $request->metode_pembayaran, // Misalkan metode pembayaran default
            'delivery' => $request->delivery
        ]);



        return to_route('home.formUploadBuktiTransaksiPembelian', ['transaksi' => $transaksi]);
    }



    public function formUploadBuktiTransaksiPembelian(Transaksi $transaksi)
    {
        $transaksi =  $transaksi->with(['detailTransaksi.produk.kategori', 'user','progress'])->where('id', $transaksi->id)->first();

        return view('home.pembelian-produk.formulir-pembayaran-produk', compact('transaksi'));
    }



    public function uploadBuktiTransaksi(Request $request, Transaksi $transaksi)
    {
        $transaksi = $transaksi->with('user')->where('id', $transaksi->id)->first();
        $file = $request->file('bukti_pembayaran');
        $fileName = $file->getClientOriginalName();
        $time = now()->format('Y-m-d H-i-s');
        $fileSaved = 'Bukti Pembayaran' . '-' . $transaksi->user->name . '-' . $time . $fileName;
        $file->move('bukti_pembayaran', $fileSaved);


        $transaksi->with(['detailTransaksi.produk', 'user'])->where('id', $transaksi->id)->first();
        $transaksi->bukti_pembayaran = $fileSaved;
        $transaksi->status_pembayaran = 'Dibayar';
        $transaksi->save();


        return redirect()->back();
    }


    public function daftarTransaksiPembelian()
    {
        $data['judul'] = 'Daftar transaksi pembelian anda';

        $data['transaksis'] = Transaksi::with(['detailTransaksi.produk', 'user','progress'])->where('user_id', Auth::id())->get();
        // dd($data['transaksis']);
        return view('home.pembelian-produk.transaksi', $data);
    }


    public function getProgress($progress)
    {

        $data = ProgressPembelian::find($progress);

        return response()->json($data);
    }
}
