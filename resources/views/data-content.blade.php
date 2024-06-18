@extends('layouts.main-dashboard')

@section('page-content')

{{-- Isi Content Disini --}}
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Content Data Promo</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <h4 class="alert-heading">Peringatan!</h4>
                            <p>Jika menambahkan content baru, content lama akan terhapus secara otomatis!</p>
                        </div>
                        {{-- Form to Add New Promo --}}
                        <form action="{{ route('promo.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Masukan Title Content</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Title Content" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Masukan Promo Content</label>
                                <textarea class="form-control" name="content" id="content" placeholder="Masukan Isi Content" rows="3" required></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success me-1 mb-1">New Content</button>
                        </form>
                        <br>

                        {{-- Display Existing Promos --}}
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($promo->isEmpty())
                                        <tr>
                                            <td colspan="3" class="text-center">Content tidak ada, silahkan klik "New Content"</td>
                                        </tr>
                                    @else
                                        @foreach($promo as $promos)
                                            <tr>
                                                <td>{{ $promos->title }}</td>
                                                <td>{{ $promos->content }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
