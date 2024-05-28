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
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="first-name-vertical">Car Photo</label>
                                                <div class="form-group">
                                                    <input type="file" class="basic-filepond">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Mobil</label>
                                                    <input type="text" id="first-name-vertical" class="form-control"
                                                        name="fname" placeholder="Masukan nama mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">ID Units</label>
                                                    <input type="text" id="first-name-vertical" class="form-control"
                                                        name="fname" placeholder="Masukan nama mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Merk Mobil</label>
                                                    <input type="email" id="email-id-vertical" class="form-control"
                                                        name="email-id" placeholder="Masukan merk mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Jenis Mobil</label>
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Pilih Jenis Mobil ...</option>
                                                        <option value="mvp">MVP</option>
                                                        <option value="suv">SUV</option>
                                                        <option value="sedan">Sedan</option>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Tahun</label>
                                                    <input type="number" id="password-vertical" class="form-control"
                                                        name="contact" placeholder="Masukan tahun kendaraan">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Transmisi</label>
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Pilih Transmisi ...</option>
                                                        <option value="matic">Matic</option>
                                                        <option value="manual">Manual</option>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Harga Mobil 6 Jam</label>
                                                    <input type="number" id="password-vertical" class="form-control"
                                                        name="contact" placeholder="Masukan Harga Mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Harga Mobil 12 Jam</label>
                                                    <input type="number" id="password-vertical" class="form-control"
                                                        name="contact" placeholder="Masukan Harga Mobil">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password-vertical">Harga Mobil 24 Jam / Per-hari</label>
                                                    <input type="number" id="password-vertical" class="form-control"
                                                        name="contact" placeholder="Masukan Harga Mobil">
                                                </div>
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
                        <th>ID Units</th>
                        <th>Nama Mobil</th>
                        <th>Merk Mobil</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>Transmisi</th>
                        <th>Foto</th>
                        <th>Harga per hari</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection