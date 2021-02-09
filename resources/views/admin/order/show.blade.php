@extends('layouts.app')

@section('title', 'Pesanan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pesanan</h1>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary mb-4 mr-2"><i class="fas fa-chevron-left"></i> Kembali</a>
        <a href="#" class="btn btn-danger mb-4"><i class="fas fa-trash"></i> Hapus</a>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4" style="font-size: 1.1em">
                                <strong>Nama :</strong> {{ $order->name }}<br>
                                <strong>No Hp :</strong> {{ $order->phone }}<br>
                                <strong>Alamat :</strong> <br>
                                {{ $order->address.' '.$order->subdistrict.', Kecamatan '.$order->district.', '.$order->city.', '.$order->province.' - '.$order->postal_code }}
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga (x1)</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>

                                    @foreach ($order->order_details as $detail)
                                        <tr>
                                            <td class="p-3">
                                                <a href="{{ route('shop.detail',$detail->product->slug) }}" target="_blank"><strong>{{ $detail->product->name }}</strong></a><br>
                                                &bullet; Set : {{ $detail->set }}<br>
                                                &bullet; Color : {{ $detail->color }}<br>
                                                &bullet; Size : {{ $detail->size }}<br>
                                            </td>
                                            <td>Rp. {{ number_format($detail->price / $detail->qty)  }}</td>
                                            <td class="text-center">{{ $detail->qty }}</td>
                                            <td class="text-right">Rp. {{ number_format($detail->price)  }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td><strong>Layanan Pengiriman</td>
                                        <td>{{ $order->shipping_method }}</td>
                                        <td colspan="2" class="text-right">Rp. {{ number_format($order->shipping_cost) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td colspan="3" class="text-right">Rp. {{ number_format($order->total) }}</td>
                                    </tr>



                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

