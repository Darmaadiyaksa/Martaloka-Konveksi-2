<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Kategori;
use App\Models\CustomDesign;
use Illuminate\Http\Request;
use App\Models\SizeCustomDesign;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiCustomDesign;
use App\Http\Controllers\Controller;


class TransaksiCustomDesignController extends Controller
{

    public function daftarCustom()
    {
        $data['custom'] = CustomDesign::where('user_id', Auth::user()->id)->get();

        return view('home.custom-design.custom-index', $data);
    }
    public function createDesign()
    {

        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();

        return view('home.custom-design.formulir-pemesanan-custom', compact('kategori'));
    }
    public function storeDesign(Request $request)
    {


        $harga_kategori = Kategori::find($request->kategori_id)->harga_kategori;

        $transaksi = TransaksiCustomDesign::create([
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(), // atau gunakan $request->user_id jika ada
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'email_pemesan' => $request->Email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'catatan' => $request->catatan,
            'total_pesanan' => $request->total_pesanan,
            'total_harga' => $request->total_pesanan * $harga_kategori,
            'status_pembayaran' => 'Pending', // Atur status default sebagai 'Pending'
            'metode_bayar' => 'Bank Transfer', // Misalkan metode pembayaran default
        ]);

        // Menyimpan data ukuran ke tabel size_custom_designs
        SizeCustomDesign::create([
            'transaksi_custom_design_id' => $transaksi->id,
            'co_s' => $request->co_s,
            'co_m' => $request->co_m,
            'co_l' => $request->co_l,
            'co_xl' => $request->co_xl,
            'co_xxl' => $request->co_xxl,
            'co_l1' => $request->co_l1,
            'co_l2' => $request->co_l2,
            'co_l3' => $request->co_l3,
            'co_l4' => $request->co_l4,
            'ce_s' => $request->ce_s,
            'ce_m' => $request->ce_m,
            'ce_l' => $request->ce_l,
            'ce_xl' => $request->ce_xl,
            'ce_xxl' => $request->ce_xxl,
            'ce_l1' => $request->co_l1,
            'ce_l2' => $request->co_l2,
            'ce_l3' => $request->co_l3,
            'ce_l4' => $request->co_l4,
        ]);

        if ($request->hasFile('gambar_custom_design')) {
            foreach ($request->file('gambar_custom_design') as $index => $file) {

                $fileSavedName = $request->nama_pemesan . $index . '-' . $file->getClientOriginalName(); // Ambil nama file dari request->file
                $path = $file->store('public/custom_designs/' . $fileSavedName); // Simpan file dan dapatkan path
                CustomDesign::create([
                    'transaksi_custom_design_id' => $transaksi->id,
                    'gambar_custom_design' => $path,
                ]);
            }
        }

        return to_route('home.formPembayaranTransaksiCustom', ['transaksiCustomDesign' => $transaksi]);
    }

    public function formPembayaranTransaksiCustom(TransaksiCustomDesign $transaksiCustomDesign)
    {

        $transaksiCustomDesign = $transaksiCustomDesign->with(['sizes', 'designs', 'kategori', 'progress' => function ($progress) {
            $progress->latest();
        }])->find($transaksiCustomDesign->id);

        // dd($transaksiCustomDesign);
        return view('home.custom-design.formulir-pembayaran-custom', compact('transaksiCustomDesign'));
    }


    public function uploadBuktiCustomDesign(Request $request, TransaksiCustomDesign $transaksiCustomDesign)
    {


        $file = $request->file('bukti_bayar');
        $fileName = $file->getClientOriginalName();
        $fileSaved = $transaksiCustomDesign->user->name . '-' . $request->metode_bayar . '-' . $fileName;
        $file->store('public/custom/bukti-bayar/' . $fileSaved);


        $transaksiCustomDesign->update([
            'status_pembayaran' => 'Diterima',
            'metode_bayar' => $request->bank,
            'bukti_pembayaran' => $fileSaved,
        ]);
        // dd($transaksiCustomDesign);

        return redirect()->back()->with('success', 'Transaksi Telah Diterima');
    }
}
