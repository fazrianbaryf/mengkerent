@extends('layouts.main-dashboard')

@section('page-content')

{{-- Isi Content Disini --}}
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Content Data Promo</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="basicInput">Masukan Title Promo</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Masukan title promo">
                        </div>
                            <div>
                                <label for="basicInput">Masukan Promo Content</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Discount 50% bagi anda yang menyewa kendaraan di hari lebaran menggunakan kode promo FAZRIGANTENG</textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success me-1 mb-1">Upload Content</button>
                            <button type="reset" class="btn btn-danger me-1 mb-1">Hapus Content</button>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection