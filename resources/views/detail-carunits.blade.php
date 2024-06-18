@extends('layouts.main-dashboard')

@section('page-content')

<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Detail Mobil</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <div>
                            @if($car->car_photo)
                                <img src="{{ asset('images/' . $car->car_photo) }}" alt="Car Photo" class="img-fluid rounded" width="500px">
                            @else
                                <p>No Image</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Nama Mobil</strong></label>
                        <p class="form-control-plaintext">{{ $car->nama_mobil }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Merk Mobil</strong></label>
                        <p class="form-control-plaintext">{{ $car->merk_mobil }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Plat Mobil</strong></label>
                        <p class="form-control-plaintext">{{ $car->plat_mobil }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Warna</strong></label>
                        <p class="form-control-plaintext">{{ $car->warna }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Kategori Mobil</strong></label>
                        <p class="form-control-plaintext">{{ $car->car_category }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Kapasitas Mesin</strong></label>
                        <p class="form-control-plaintext">{{ $car->kapasitas_mesin }} CC</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Transmisi</strong></label>
                        <p class="form-control-plaintext">{{ $car->transmisi }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Harga 6 Jam</strong></label>
                        <p class="form-control-plaintext">Rp. {{ number_format($car->price_6jam, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Tahun Mobil</strong></label>
                        <p class="form-control-plaintext">{{ $car->tahun_mobil }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Harga 12 Jam</strong></label>
                        <p class="form-control-plaintext">Rp. {{ number_format($car->price_12jam, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Seats</strong></label>
                        <p class="form-control-plaintext">{{ $car->seats }}</p>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><strong>Harga 24 Jam</strong></label>
                        <p class="form-control-plaintext">Rp. {{ number_format($car->price_24jam, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label"><strong>Status</strong></label>
                        <p class="form-control-plaintext">{{ $car->status }}</p>
                    </div>
                    <div class="col-12 text-right mt-4">
                        <button type="button" class="btn btn-success me-1 mb-1" data-bs-toggle="modal" data-bs-target="#editCarModal{{ $car->id }}">Edit</button>
                        <a href="/car-units" class="btn btn-secondary me-1 mb-1">Back to List</a>
                    </div>
                </div>
                                            <!-- Modal Edit Car -->
                                            <div class="modal fade" id="editCarModal{{ $car->id }}" tabindex="-1" aria-labelledby="editCarModal{{ $car->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editCarModal{{ $car->id }}Label">Edit Car</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT') <!-- Mengganti metode POST dengan PUT -->
                
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <label for="car_photo">Car Photo</label>
                                                                            <div class="form-group">
                                                                                @if($car->car_photo)
                                                                                    <img src="{{ asset('images/' . $car->car_photo) }}" alt="Car Photo" width="100">
                                                                                    <p>Current Photo: {{ $car->car_photo }}</p>
                                                                                @else
                                                                                    <p>No Photo</p>
                                                                                @endif
                                                                                <input name="car_photo" type="file" class="basic-filepond">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="nama_mobil">Nama Mobil</label>
                                                                                <input type="text" id="nama_mobil" class="form-control" name="nama_mobil" value="{{ $car->nama_mobil }}" placeholder="Masukan nama mobil">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="plat_mobil">Plat Mobil</label>
                                                                                <input type="text" id="plat_mobil" class="form-control" name="plat_mobil" value="{{ $car->plat_mobil }}" placeholder="Masukan Plat Mobil">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="merk_mobil">Merk Mobil</label>
                                                                                <input type="text" id="merk_mobil" class="form-control" name="merk_mobil" value="{{ $car->merk_mobil }}" placeholder="Masukan merk mobil">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="tahun_mobil">Tahun</label>
                                                                                <input type="number" id="tahun_mobil" class="form-control" name="tahun_mobil" value="{{ $car->tahun_mobil }}" placeholder="Masukan tahun kendaraan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="seats">seats</label>
                                                                                <input type="number" id="seats" class="form-control" name="seats" value="{{ $car->seats }}" placeholder="Masukan jumlah kursi">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="transmisi">Transmisi</label>
                                                                                <select class="form-select" id="transmisi" name="transmisi">
                                                                                    <option selected>{{ $car->transmisi }}</option>
                                                                                    <option value="matic">Matic</option>
                                                                                    <option value="manual">Manual</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="car_category">Kategori Mobil</label>
                                                                                <select class="form-select" id="car_category" name="car_category">
                                                                                    <option selected>{{ $car->car_category }}</option>
                                                                                    <option value="suv">SUV</option>
                                                                                    <option value="mvp">MVP</option>
                                                                                    <option value="sedan">Sedan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="kapasitas_mesin">Kapasitas Mesin</label>
                                                                                <input type="text" id="kapasitas_mesin" class="form-control" name="kapasitas_mesin" value="{{ $car->kapasitas_mesin }}" placeholder="Masukan Kapasitas Mesin">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="warna">Warna</label>
                                                                                <input type="text" id="warna" class="form-control" name="warna" value="{{ $car->warna }}" placeholder="Masukan Warna Mobil">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="price_6jam">Harga Mobil 6 Jam</label>
                                                                                <input type="number" id="price_6jam" class="form-control" name="price_6jam" value="{{ $car->price_6jam }}" placeholder="Masukan Harga Mobil">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="price_12jam">Harga Mobil 12 Jam</label>
                                                                                <input type="number" id="price_12jam" class="form-control" name="price_12jam" value="{{ $car->price_12jam }}" placeholder="Masukan Harga Mobil">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="price_24jam">Harga Mobil 24 Jam / Per-hari</label>
                                                                                <input type="number" id="price_24jam" class="form-control" name="price_24jam" value="{{ $car->price_24jam }}" placeholder="Masukan Harga Mobil">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            </div>
        </div>
    </section>



