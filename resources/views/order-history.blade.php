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
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach ($orderHistories as $history)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $history->customer_name }}</td>
                            <td>{{ $history->nama_mobil }}</td>
                            <td>{{ $history->plat_mobil }}</td>
                            <td>{{ $history->durasi }}</td>
                            <td>Rp. {{ number_format($history->harga, 0, ',', '.') }}</td>
                            <td>{{ $history->no_telfon }}</td>
                            <td>{{ $history->pelayanan }}</td>
                            <td>{{ $history->alamat }}</td>
                            <td>{{ $history->status }}</td>
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
