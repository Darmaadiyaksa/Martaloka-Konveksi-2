@extends('home.home-layout')
@section('title', 'Transaksi')
@section('content')

    <style>
        #box-container {
            padding: 30vh 0;

        }

        @media only screen and (max-width: 768px) {
            #box-container {
                padding: 10vh 0;

            }
        }
    </style>

    <section class="top-categories-area">
        <div class="container" id="box-container">
            @if (count($transaksis) == 0)
                <h1 class="text-center">Tidak ada transaksi</h1>
            @else
                {{-- <div class=" btn-one bg-success text-light"> --}}
                <h1 class="mb-5 text-md-center text-lg-center">Lengkapi Transaksi anda</h1>
                {{-- </div> --}}

                <div class="row">


                    @foreach ($transaksis as $transaksi)
                        <div class="col-xxl-9 col-xl-9 col-lg-9">
                            <div class="card border shadow-none my-2">
                                <div class="card-body ">

                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">

                                            <divz class=" overflow-hidden">
                                                <div>
                                                    <h5 class="text-truncate font-size-18">NO-{{ $transaksi->id }}
                                                    </h5>

                                                </div>
                                            </divz>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">

                                            <div class="ms-2">
                                                {{-- Jika sudah dibayar --}}


                                                <div class="border p-3">
                                                    <div class="form-group">
                                                        <label for="bukti_pembayaran" class="fw-bold">Status Pembayaran :
                                                            <b>
                                                                {{ $transaksi->status_pembayaran }} </b> </label>
                                                    </div>
                                                    <div class="d-gap mt-3">
                                                        @switch($transaksi->status_pembayaran)
                                                            @case('Dalam Transaksi')
                                                                <a href="{{ route('home.formTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-primary text-uppercase rounded-0 w-100">Lengkapi
                                                                    Pembayaran</a>
                                                            @break

                                                            @case('Belum Dibayar')
                                                                <a href="{{ route('home.formTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-primary text-uppercase rounded-0 w-100">Lengkapi
                                                                    Pembayaran</a>
                                                            @break

                                                            @case('Dibayar')
                                                                <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-success text-uppercase rounded-0 w-100">Lihat
                                                                    progress</a>
                                                            @break

                                                            @case('Diterima')
                                                                <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-success text-uppercase rounded-0 w-100">Lihat
                                                                    progress</a>
                                                            @break

                                                            @case('Ditolak')
                                                                <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-danger text-uppercase rounded-0 w-100">Lihat
                                                                    Transaksi</a>
                                                            @break

                                                            @case('Dibatalkan')
                                                                <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-danger text-uppercase rounded-0 w-100">Lihat
                                                                    Transaksi</a>
                                                            @break

                                                            @case('Selesai')
                                                                <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                                    class="btn btn-success text-uppercase rounded-0 w-100">Lihat
                                                                    progress</a>
                                                            @break

                                                            @default
                                                                <button class="btn btn-outline-secondary">Status Tidak
                                                                    Valid</button>
                                                        @endswitch
                                                        {{-- <a href="{{ route('home.formUploadBuktiTransaksiPembelian', $transaksi->id) }}"
                                                            class="btn btn-success text-uppercase rounded-0 w-100">Lihat
                                                            progress</a> --}}
                                                    </div>
                                                </div>




                                            </div>

                                        </div>

                                    </div>

                                    <div>
                                        <div class="row">
                                            @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                                                <div class="col-md-4">
                                                    <div class="mt-3">
                                                        <h6>{{ $detailTransaksi->produk->nama_produk }}</h6>
                                                        <p class="text-muted mb-2">Harga</p>
                                                        <h5 class="mb-0 mt-2"><span
                                                                class="fw-bold me-2"></span>Rp.{{ number_format($detailTransaksi->produk->harga_produk, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 ">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Quantity</p>
                                                        <div class="d-inline-flex">
                                                            <input type="number" class="form-control w-25" name=""
                                                                value="{{ $detailTransaksi->qty }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mt-3">
                                                        <p class="text-muted mb-2">Total</p>
                                                        <h5>Rp.{{ number_format($detailTransaksi->produk->harga_produk * $detailTransaksi->qty, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach




                </div>
                {{-- <button class="btn btn-block btn-one mt-5" type="submit">CHECKOUT</button> --}}
            @endif


        </div>


    </section>


@endsection
