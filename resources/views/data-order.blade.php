@extends('layouts.main-dashboard')

@section('page-content')

<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                {{ $title }} {{-- Menampilkan judul dari variabel $title --}}
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Nama Mobil</th>
                            <th>Plat Mobil</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                            <th>No. Telfon</th>
                            <th>Pelayanan</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->nama_mobil }}</td>
                            <td>{{ $order->plat_mobil }}</td>
                            <td>{{ $order->durasi }}</td>
                            <td>Rp. {{ number_format($order->harga, 0, ',', '.') }}</td>
                            <td>{{ $order->no_telfon }}</td>
                            <td>{{ $order->pelayanan }}</td>
                            <td>{{ $order->alamat }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                {{-- Form untuk menerima order --}}
                                <form action="{{ route('orders.accept', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check2"></i></button>
                                </form>
                                <form action="{{ route('orders.reject', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @php $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
