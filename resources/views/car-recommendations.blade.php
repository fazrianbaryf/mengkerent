@extends('layouts.main-dashboard')

@section('page-content')

{{-- Isi Content Disini --}}
<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="modal-success me-1 mb-1 d-inline-block">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#success">
                        <i class="bi bi-plus-square"></i>
                        Tambah Mobil Recomendations
                    </button>

                    <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel110" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h5 class="modal-title white" id="myModalLabel110">Tambah Unit Mobil
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('car_recomend.add') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="car_recomend_id">Pilih Mobil Recomendations</label>
                                            <select class="form-select" id="car_recomend_id" name="car_recomend_id" required>
                                                <option selected disabled>Pilih Mobil ...</option>
                                                @foreach($carUnits as $car)
                                                <option value="{{ $car->id }}">{{ $car->nama_mobil }} - {{ $car->plat_mobil }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Units</th>
                            <th>Nama Mobil</th>
                            <th>Merk Mobil</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Transmisi</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recommendedCars as $recomend)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $recomend->carUnit->id }}</td>
                            <td>{{ $recomend->carUnit->nama_mobil }}</td>
                            <td>{{ $recomend->carUnit->merk_mobil }}</td>
                            <td>{{ $recomend->carUnit->car_category }}</td>
                            <td>{{ $recomend->carUnit->tahun_mobil }}</td>
                            <td>{{ $recomend->carUnit->transmisi }}</td>
                            <td>
                                @if($recomend->carUnit->car_photo)
                                <img src="{{ asset('images/' . $recomend->carUnit->car_photo) }}" width="100" alt="Car Photo">
                                @else
                                No Photo Available
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('car_recomend.remove', $recomend->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
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