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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->customer_name }}</td>
                            <td>{{ $transaction->nama_mobil }}</td>
                            <td>{{ $transaction->plat_mobil }}</td>
                            <td>{{ $transaction->harga }}</td>
                            <td>{{ $transaction->no_telfon }}</td>
                            <td>{{ $transaction->pelayanan }}</td>
                            <td>{{ $transaction->alamat }}</td>
                            <td>{{ $transaction->carUnit->status }}</td>
                            <td>
                                <form action="{{ route('transactions.complete', $transaction->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
