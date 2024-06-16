@extends('layouts.main-dashboard')

@section('page-content')

{{-- Isi Content Disini --}}
<div class="main-content">
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="modal-success me-1 mb-1 d-inline-block">
                <!-- Button trigger for Success theme modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#success">
                    <i class="bi bi-plus-square"></i>
                    Tambah Unit Mobil 
                </button>
                <!--Success theme Modal -->
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
                                <form class="form form-vertical" action="{{ route('car.addCar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="car_photo">Car Photo</label>
                                                <div class="form-group">
                                                    <input name="car_photo" type="file" class="basic-filepond">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nama_mobil">Nama Mobil</label>
                                                    <input type="text" id="nama_mobil" class="form-control" name="nama_mobil" placeholder="Masukan nama mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="plat_mobil">Plat Mobil</label>
                                                    <input type="text" id="plat_mobil" class="form-control" name="plat_mobil" placeholder="Masukan Plat Mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="merk_mobil">Merk Mobil</label>
                                                    <input type="text" id="merk_mobil" class="form-control" name="merk_mobil" placeholder="Masukan merk mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tahun_mobil">Tahun</label>
                                                    <input type="number" id="tahun_mobil" class="form-control" name="tahun_mobil" placeholder="Masukan tahun kendaraan">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="seats">Seats</label>
                                                    <input type="number" id="seats" class="form-control" name="seats" placeholder="Masukan jumlah kursi">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="transmisi">Transmisi</label>
                                                    <select class="form-select" id="transmisi" name="transmisi">
                                                        <option selected>Pilih Transmisi ...</option>
                                                        <option value="matic">Matic</option>
                                                        <option value="manual">Manual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="car_category">Kategori Mobil</label>
                                                    <select class="form-select" id="car_category" name="car_category">
                                                        <option selected>Pilih Kategori Mobil ...</option>
                                                        <option value="suv">SUV</option>
                                                        <option value="mvp">MVP</option>
                                                        <option value="sedan">Sedan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="kapasitas_mesin">Kapasitas Mesin</label>
                                                    <input type="text" id="kapasitas_mesin" class="form-control" name="kapasitas_mesin" placeholder="Masukan Kapasitas Mesin">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="warna">Warna</label>
                                                    <input type="text" id="warna" class="form-control" name="warna" placeholder="Masukan warna mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="price_6jam">Harga Mobil 6 Jam</label>
                                                    <input type="number" id="price_6jam" class="form-control" name="price_6jam" placeholder="Masukan Harga Mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="price_12jam">Harga Mobil 12 Jam</label>
                                                    <input type="number" id="price_12jam" class="form-control" name="price_12jam" placeholder="Masukan Harga Mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="price_24jam">Harga Mobil 24 Jam / Per-hari</label>
                                                    <input type="number" id="price_24jam" class="form-control" name="price_24jam" placeholder="Masukan Harga Mobil">
                                                </div>
                                            </div>
                                        </div>
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
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mobil</th>
                        <th>Plat Mobil</th>
                        <th>Foto</th>
                        <th>Harga 6 Jam</th>
                        <th>Harga 12 Jam</th>
                        <th>Harga 24 Jam</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $car->nama_mobil }}</td>
                            <td>{{ $car->plat_mobil }}</td>
                            <td>
                                @if($car->car_photo)
                                    <img src="{{ asset('images/' . $car->car_photo) }}" alt="Car Photo" width="100px" height="70px">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>Rp. {{ number_format($car->price_6jam, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($car->price_12jam, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($car->price_24jam, 0, ',', '.') }}</td>    
                            <td>{{ $car->status }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCarModal{{ $car->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a href="{{ route('car-units.show', $car->id) }}" class="btn btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            
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
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                      
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
