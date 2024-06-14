@extends('layouts.main-dashboard')

@section('page-content')

{{-- Isi Content Disini --}}
<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="modal-success me-1 mb-1 d-inline-block">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success">
                        <i class="bi bi-plus-square"></i>
                        Tambah Syarat & Ketentuan
                    </button>

                    <div class="modal fade text-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h5 class="modal-title white" id="myModalLabel110">Tambah Syarat & Ketentuan</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('syaratketentuan.add') }}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jenis_syarat">Jenis Syarat & Ketentuan</label>
                                                <select id="jenis_syarat" class="form-select" name="jenis_syarat">
                                                    <option value="LepasKunci">Syarat Lepas Kunci</option>
                                                    <option value="DenganSupir">Syarat dengan Supir</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="syarat_ketentuan">Syarat & Ketentuan</label>
                                                <textarea id="syarat_ketentuan" class="form-control" name="syarat_ketentuan" rows="3" placeholder="Masukan Syarat & Ketentuan"></textarea>
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
            </div>
            <div class="card-body">
                <style>
                    /* Custom CSS to align action buttons in the table */

                    .action-buttons .btn {
                        margin: 0;
                    }

                    /* CSS to display syarat & ketentuan vertically */
                    .syarat-ketentuan {
                        max-width: 300px; /* set a maximum width for the column */
                        white-space: pre-wrap; /* ensures text wraps */
                        word-wrap: break-word; /* breaks long words */
                    }
                </style>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Syarat & Ketentuan</th>
                            <th>Syarat & Ketentuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach($syaratKetentuan as $item)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $item->jenis_syarat }}</td>
                            <td class="syarat-ketentuan">{{ $item->syarat_ketentuan }}</td>
                            <td class="action-buttons">
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Syarat & Ketentuan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('syaratketentuan.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="jenis_syarat{{ $item->id }}" class="form-label">Jenis Syarat & Ketentuan</label>
                                                        <select id="jenis_syarat{{ $item->id }}" class="form-select" name="jenis_syarat">
                                                            <option value="LepasKunci" {{ $item->jenis_syarat == 'LepasKunci' ? 'selected' : '' }}>Syarat Lepas Kunci</option>
                                                            <option value="DenganSupir" {{ $item->jenis_syarat == 'DenganSupir' ? 'selected' : '' }}>Syarat dengan Supir</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="syarat_ketentuan{{ $item->id }}" class="form-label">Syarat & Ketentuan</label>
                                                        <textarea id="syarat_ketentuan{{ $item->id }}" class="form-control" name="syarat_ketentuan" rows="3">{{ $item->syarat_ketentuan }}</textarea>
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
                                <!-- Delete Button -->
                                <form action="{{ route('syaratketentuan.delete', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @php $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
