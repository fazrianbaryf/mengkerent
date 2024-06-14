<!-- resources/views/data-customer.blade.php -->

@extends('layouts.main-dashboard')

@section('page-content')

<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Phone</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->no_telfon }}</td>
                            <td>{{ $user->pekerjaan }}</td>
                            <td>{{ $user->alamat }}</td>
                        </tr>
                        @php
                        $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
