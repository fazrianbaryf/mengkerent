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
                    Tambah Mobil Recomendations 
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
                                                <div class="form-group">
                                                    <label for="password-vertical">Pilih Mobil Recomendations</label>
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Pilih Mobil ...</option>
                                                        <option value="mvp">Avanza</option>
                                                        <option value="suv">Fortuner</option>
                                                        <option value="sedan">Civic</option>
                                                      </select>
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
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection