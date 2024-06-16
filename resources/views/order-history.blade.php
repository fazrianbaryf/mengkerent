@extends('layouts.main-dashboard')

@section('page-content')

<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                {{ $title }}
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Nama Mobil</th>
                            <th>Plat Mobil</th>
                            <th>Harga</th>
                            <th>No. Telfon</th>
                            <th>Pelayanan</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderHistories as $history)
                        <tr>
                            <td>{{ $history->customer_name }}</td>
                            <td>{{ $history->nama_mobil }}</td>
                            <td>{{ $history->plat_mobil }}</td>
                            <td>{{ $history->harga }}</td>
                            <td>{{ $history->no_telfon }}</td>
                            <td>{{ $history->pelayanan }}</td>
                            <td>{{ $history->alamat }}</td>
                            <td>{{ $history->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
