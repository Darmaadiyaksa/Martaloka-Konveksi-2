<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Kategori;
use App\Models\CustomDesign;
use Illuminate\Http\Request;
use App\Models\SizeCustomDesign;
use App\Http\Controllers\Controller;
use App\Models\ProgressCustom;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiCustomDesign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Events\TransactionCommitted;

class TransaksiCustomDesignController extends Controller
{

    public function daftarCustom()
    {
        $data['customs'] = TransaksiCustomDesign::with(['progress','designs'])->where('user_id', Auth::user()->id)->get();

        return view('home.custom-design.custom-index', $data);
    }
    public function createDesign()
    {

        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();

        return view('home.custom-design.formulir-pemesanan-custom', compact('kategori'));
    }
    public function storeDesign(Request $request)
    {
        // dd(is_array($request->file('gambar_custom_design')));


        $validator = Validator::make($request->all(), [
            'nama_pemesan' => 'required',
            'alamat_pemesan' => 'required',
            'email_pemesan' => 'required',
            'nomor_hp_pemesan' => 'required',
            // 'catatan' => 'required',
            'gambar_custom_design*' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        ],[
            'nama_pemesan.required' => 'Nama pemesan harus diisi',
            'alamat_pemesan.required' => 'Alamat pemesan harus diisi',
            'email_pemesan.required' => 'Email pemesan harus diisi',
            'nomor_hp_pemesan.required' => 'Nomor HP pemesan harus diisi',
            'gambar_custom_design*.required' => 'Anda harus melampirkan gambar',
            'gambar_custom_design*.mimes' => 'File yang diupload harus berupa gambar (jpg, jpeg, png, svg)',
            'gambar_custom_design*.max' => 'Gambar tidak boleh lebih dari 2MB',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $harga_kategori = Kategori::find($request->kategori_id)->harga_kategori;

        $transaksi = TransaksiCustomDesign::create([
            'nama_custom' => $request->nama_custom,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(),
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'catatan' => $request->catatan,
            'total_pesanan' => $request->total_pesanan,
            'total_harga' => $request->total_pesanan * $harga_kategori,
            'status_pembayaran' => 'Dalam Transaksi',
            'delivery' =>  $request->delivery
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

        if ($request->has('gambar_custom_design')) {
            if ($request->has('gambar_custom_design')) {
                foreach ($request->file('gambar_custom_design') as $index => $file) {

                    $fileSavedName = $request->nama_pemesan . '-'.$index . '-' . $file->getClientOriginalName();

                    $path = $file->move('custom_designs/'.$request->nama_pemesan.'-'.now()->format('Y-m-d H-i-s'),$fileSavedName);
                    CustomDesign::create([
                        'transaksi_custom_design_id' => $transaksi->id,
                        'gambar_custom_design' => $path,
                    ]);
                }
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
        $fileSaved = $transaksiCustomDesign->user->name . '-' . $request->metode_pembayaran . '-' .now()->format('Y-m-d H-i-s') . '-' . $fileName;
        $file->move('custom_designs/bukti-bayar/', $fileSaved);


        $transaksiCustomDesign->update([
            'status_pembayaran' => 'Dibayar',
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => $fileSaved,
        ]);
        // dd($transaksiCustomDesign);

        return redirect()->back()->with('success', 'Transaksi Telah Diterima');
    }


    // public function detailProgressCustom(ProgressCustom $progress)
    // {

    //     return view('home.custom-design.detail-progres', compact('progress'));
    // }



    public function getProgress($progress)
    {
        $data = ProgressCustom::find($progress);

        return response()->json($data);
    }
}
