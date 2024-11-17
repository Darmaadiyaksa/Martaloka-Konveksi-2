@extends('home.home-layout')
@section('title', 'Upload Bukti Pembayaran')
@section('content')

    <section class="top-categories-area" style="padding: 30vh 0;">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mx-2">Selesaikan Pembayaran</h5>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="card-title">ID Transaksi</h5>
                                        <p class="card-text">{{ $transaksi->id ?? '-' }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Nama Pemesan</h5>
                                        <p class="card-text">{{ $transaksi->nama_pemesan ?? '-' }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Alamat Pemesan</h5>
                                        <p class="card-text">{{ $transaksi->alamat_pemesan ?? '-' }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Email Pemesan</h5>
                                        <p class="card-text">{{ $transaksi->email_pemesan ?? '-' }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <h5 class="card-title">Nomor Handphone</h5>
                                        <p class="card-text">{{ $transaksi->nomor_hp_pemesan ?? '-' }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title"> Metode Pembayaran </h5>
                                        <input type="text" class="form-control"
                                            value="{{ $transaksi->metode_pembayaran ?? '-' }}" readonly>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    @if ($transaksi->delivery == 'Diantar Ke Tempat Pemesan')
                                        <div class="kirim " id="kirim">
                                            <div class="mb-3">
                                                <h5 class="card-title">Kurir</h5>
                                                <input type="text" class="form-control" id="kurir" name="kurir"
                                                    value="{{ $transaksi->kurir }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <h5 class="card-title">Nomor Resi</h5>
                                                <input type="text" class="form-control" id="no_resi" name="no_resi"
                                                    value="{{ $transaksi->no_resi }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="card-title">Tujuan Antar</h5>
                                                <input type="text" class="form-control" id="tujuan_antar"
                                                    name="tujuan_antar" value="{{ $transaksi->tujuan_antar }}" readonly>
                                            </div>
                                        </div>
                                    @else
                                        <div class="pick-up " id="pick-up">

                                            <div class="mb-3">
                                                <h5 class="card-title">Alamat Martaloka Konveksi</h5>
                                                <textarea class="form-control" name="" id="" cols="30" rows="3" readonly>Jalan Banteng, Banjar, Kec. Banjar, Kabupaten Buleleng, Bali 81152</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="card-title">Tanggal dan Jam Ambil</h5>
                                                <input type="text" class="form-control" id="tanggal_ambil"
                                                    name="tanggal_ambil"
                                                    value="{{ $transaksi->tanggal_ambil ? $transaksi->tanggal_ambil->isoFormat('dddd, D MMMM YYYY HH:mm') : 'Tanggal belum ditentukan' }}"
                                                    readonly>
                                            </div>

                                        </div>
                                    @endif




                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 px-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <h5 class="card-title">Jumlah Pesanan</h5>
                                        <span
                                            class="btn btn-secondary rounded-0">{{ $transaksi->detailTransaksi->sum('qty') }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Produk</h5>
                                        <div class="row row-cols-2">

                                            @foreach ($transaksi->detailTransaksi as $produk)
                                                <div class="col">
                                                    <img src="{{ asset('produk/' . $produk->produk->gambar_produk) }}"
                                                        style="max-height: 100px;"
                                                        alt="{{ $produk->produk->nama_produk }}">

                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="mb-2">
                                        <h5 class="card-title">Total Harga</h5>
                                        <p class="card-text">Rp. {{ number_format($transaksi->total_harga) }}
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('home.uploadBuktiTransaksi', $transaksi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">


                            <div class="col-12 px-2">
                                <div class="card py-3">
                                    @if ($transaksi->status_pembayaran == 'Dalam Transaksi' || $transaksi->status_pembayaran == 'Belum Dibayar')
                                        @csrf
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <p
                                                    class="fs-1 fw-bold text-lg-left text-xxl-left text-xl-left text-sm-center ml-3">
                                                    Bukti Pembayaran</p>
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('bukti_Pembayaran/' . $transaksi->bukti_pembayaran) }}"
                                                        style="max-height: 250px;"
                                                        alt="{{ $transaksi->bukti_pembayaran }}">

                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <h2 class="text-center">Unggah Bukti Pembayaran</h2>

                                                <div class="py-3">
                                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                                        class="form-control" accept="image/*" required>
                                                    <img src="#" alt="Preview Uploaded Image" class="mt-5 d-none"
                                                        id="preview-bukti">

                                                </div>

                                                <button class="btn-one btn-block mt-4" type="submit">Kirim Bukti</button>
                                            </div>
                                        @else
                                            <h3 class="font-weight-bold text-center fs-5">Transaksi sedang diproses</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                    <p
                                                        class="fs-1 fw-bold text-lg-left text-xxl-left text-xl-left text-sm-center ml-3">
                                                        Bukti Pembayaran</p>
                                                    <div class="d-flex justify-content-center">
                                                        <img src="{{ asset('bukti_Pembayaran/' . $transaksi->bukti_pembayaran) }}"
                                                            style="max-height: 250px;"
                                                            alt="{{ $transaksi->bukti_pembayaran }}">

                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-lg-4 mt-sm-5">
                                                    <div class="px-3 mt-3">
                                                        <button class="btn-one" type="button">
                                                            {{ $transaksi->status_pembayaran }}</button>
                                                        <div class="mt-3">
                                                            @switch($transaksi->status_pembayaran)
                                                                @case('Dalam Transaksi')
                                                                    <p> Silahkan menunggu pihak Martaloka Konveksi Untuk melakukan
                                                                        konfirmasi.</p>
                                                                @break

                                                                @case('Dibayar')
                                                                    <p> Silahkan menunggu pihak Martaloka Konveksi Untuk melakukan
                                                                        konfirmasi.</p>
                                                                @break

                                                                @case('Ditolak')
                                                                    <p> Transaksi ditolak oleh pihak Martaloka Konveksi.</p>
                                                                    <h6>Keterangan : {{ $transaksi->keterangan_tambahan ?? '-' }}
                                                                    </h6>
                                                                @break

                                                                @case('Dibatalkan')
                                                                    <p> Transaksi dibatalkan oleh pihak Martaloka Konveksi.</p>
                                                                    <h6>Keterangan : {{ $transaksi->keterangan ?? '-' }}</h6>
                                                                @break

                                                                @case('Selesai')
                                                                    <p> Transaksi telah selesai.</p>
                                                                @break

                                                                @case('Diterima')
                                                                    <p> Silahkan menunggu pihak Martaloka Konveksi Untuk melakukan
                                                                        konfirmasi.</p>
                                                                @break

                                                                @default
                                                                    <p> Status transaksi tidak valid.</p>
                                                            @endswitch

                                                        </div>


                                                        @if ($transaksi->status_pembayaran == 'Selesai')
                                                            <div class="card mt-3">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Progress transaksi</h5>

                                                                    @if (count($transaksi->progress) <= 0)

                                                                        <p class="text-left">Belum ada progress transaksi
                                                                        </p>
                                                                    @else
                                                                        @foreach ($transaksi->progress()->latest()->get() as $index => $item)
                                                                            <li class="mb-3">
                                                                                <h6 class="font-weight-bold">
                                                                                    {{ $item->nama_progress }}
                                                                                    {!! $index == 0 ? '<span class="badge badge-success"> Status terakhir </span>' : '' !!}</h6>

                                                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y H:mm:ss') }}
                                                                                <br>
                                                                            </li>
                                                                            <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#staticBackdrop"
                                                                                class="btn-one px-4 py-0 detailProgress"
                                                                                data-id="{{ $item->id }}">Detail</button>
                                                                            <hr>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif





                                                    </div>
                                                </div>
                                            </div>

                                    @endif
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>

    {{-- <section class="blog-page-two">
        <div class="container" style="margin-top: 20vh;">
            <div class="row">

                <div class="col-12">

                    <div class="blog-page-two__content">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">

                                <h2 class="mb-3">Transaksi anda</h2>
                                @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                                    <div class="single-blog-style2">
                                        <div class="single-blog-style2__img-holder">
                                            <div class="inner">
                                                <img src="{{ asset('produk.' . $detailTransaksi->produk->gambar_produk) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="single-blog-style2__text-holder">
                                            <div class="top">
                                                <div class="category-box">
                                                    <div class="dot-box"></div>
                                                    <p>{{ $detailTransaksi->produk->kategori->nama_kategori }}</p>
                                                </div>
                                            </div>
                                            <h3 class="blog-title">
                                                <a href="{{ route('home.detail-produk', $detailTransaksi->produk->id) }}">
                                                    {{ $detailTransaksi->produk->nama_produk }}
                                                </a>
                                            </h3>

                                            <div class="bottom-box">
                                                <div class="btn-box">
                                                    <a href="#">
                                                        <span class="icon-right-arrow-1"></span>Deskripsi
                                                    </a>
                                                </div>
                                                <div class="meta-info">
                                                    <ul>
                                                        <li>
                                                            <span class="icon-user"></span>
                                                            <a href="#">Thomas Maverick</a>
                                                        </li>
                                                        <li>
                                                            <span class="icon-calendar"></span>
                                                            <a href="#">Nov 25, 2022</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">

                                <h2 class="mb-3">Detail</h2>
                                <form action="{{ route('home.uploadBuktiTransaksi', $transaksi) }}"
                                    enctype="multipart/form-data" class="">
                                    @csrf

                                    <div class="border p-3">
                                        <div class="form-group">
                                            <label class="fw-bold">Bukti Pembayaran</label>
                                            <input type="file" name="bukti_pembayaran" required class="form-control">
                                        </div>

                                        <div class="d-gap">
                                            <button class="btn btn-block btn-one" type="submit">Upload</button>

                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>
                </div>





            </div>
        </div>
    </section> --}}
@endsection
@push('scripts')
@endpush

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tambahkan event listener ke tombol 'Detail' menggunakan event delegation
        document.querySelectorAll('.detailProgress').forEach(function(button) {
            button.addEventListener('click', function() {
                var progressId = this.getAttribute('data-id');

                // Lakukan request AJAX ke route yang ditentukan
                fetch(`/custom-design/progress/${progressId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Isi data yang diterima ke dalam modal
                        document.getElementById('nama_progress').value = data.nama_progress;
                        document.getElementById('deskripsi_proses').value = data
                            .deskripsi_progress;
                        document.getElementById('waktu_progress').value = new Intl
                            .DateTimeFormat('id-ID', {
                                year: 'numeric',
                                month: 'long',
                                day: '2-digit',
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit'
                            }).format(new Date(data.created_at));
                        document.getElementById('gambar_proses').src =
                            `/progress_custom/${data.gambar_progress}`;

                        // Tampilkan modal setelah data diisi

                        modal.show();
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
