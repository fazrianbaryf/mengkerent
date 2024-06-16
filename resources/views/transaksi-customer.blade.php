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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $transaction->customer_name }}</td>
                            <td>{{ $transaction->nama_mobil }}</td>
                            <td>{{ $transaction->plat_mobil }}</td>
                            <td>{{ $transaction->durasi }}</td>
                            <td>Rp. {{ number_format($transaction->harga, 0, ',', '.') }}</td>
                            <td>{{ $transaction->no_telfon }}</td>
                            <td>{{ $transaction->pelayanan }}</td>
                            <td>{{ $transaction->alamat }}</td>
                            <td>{{ $transaction->carUnit->status }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                <form action="{{ route('transactions.complete', $transaction->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check2"></i></button>
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
