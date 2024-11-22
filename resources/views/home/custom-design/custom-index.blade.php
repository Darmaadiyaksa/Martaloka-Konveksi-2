@extends('home.home-layout')
@section('title', 'Pemesanan Custom Desain')
@section('content')

    <section class="top-categories-area">
        <div class="container" style="padding: 30vh 0;">

            @if (count($customs) == 0)
                <h1 class="text-center">Tidak ada custom design</h1>
            @else
                <h3>Pesanan Custom Anda</h3>
                <form action="{{ route('home.checkout') }}" method="POST" class="w-100">
                    @csrf
                    <div class="row">


                        @foreach ($customs as $item)
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-6 p-3">

                                {{-- @switch($item->status_pembayaran)
                                    {{-- @case('Dalam Transaksi')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                    @break

                                    @case('Dibayar')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                    @break

                                    @case('Belum Dibayar')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                    @break

                                    @case('Ditolak')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                        @break

                                    @case('Dibatalkan')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                    @break

                                    @case('Selesai')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                    @break

                                    @case('Diterima')
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                    @break

                                    @default
                                    <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">
                                        @endswitch --}}
                                        <a href="{{ route('home.formPembayaranTransaksiCustom', $item->id) }}" class="text-dark">

                                    <div class="card border shadow-none my-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="{{ asset($item->designs->first()->gambar_custom_design) }}"
                                                        alt="{{ $item->bukti_bayar }}" class="img-fluid">
                                                </div>


                                                <div class="col-8 pl-3">
                                                    @switch($item->status_pembayaran)
                                                        @case('Dalam Transaksi')
                                                            <button class="btn btn-secondary">Menunggu Pembayaran</button>
                                                        @break

                                                        @case('Dibayar')
                                                            <button class="btn btn-info">Sudah Dibayar</button>
                                                        @break

                                                        @case('Belum Dibayar')
                                                            <button class="btn btn-warning">Belum Dibayar</button>
                                                        @break

                                                        @case('Ditolak')
                                                            <button class="btn btn-danger">Ditolak</button>
                                                        @break

                                                        @case('Dibatalkan')
                                                            <button class="btn btn-outline-danger">Dibatalkan</button>
                                                        @break

                                                        @case('Selesai')
                                                            <button class="btn btn-success">Selesai</button>
                                                        @break

                                                        @case('Diterima')
                                                            <button class="btn btn-primary">Diterima</button>
                                                        @break

                                                        @default
                                                            <button class="btn btn-outline-secondary">Status Tidak Valid</button>
                                                    @endswitch

                                                    <div class="flex-grow-1 align-self-center overflow-hidden">
                                                        <div>
                                                            <h5 class="text-truncate font-size-18">
                                                            </h5>

                                                            <p class="mb-0 mt-1"> <span
                                                                    class="fw-medium">{{ $item->nama_custom }}</span></p>
                                                        </div>

                                                        <div>
                                                            Total pesanan : <span class="font-weight-bold">
                                                                {{ $item->total_pesanan ?? 0 }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>





                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach




                    </div>
                </form>
            @endif


        </div>


    </section>


@endsection
