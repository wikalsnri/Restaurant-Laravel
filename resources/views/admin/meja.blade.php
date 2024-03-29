@extends('admin.navbar')

@section('admin/content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
        Tambahkan Menu
    </button>



    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <form action="{{ route('meja.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @include('sweetalert::alert')
                        <div class="mb-3">
                            <label for="title" class="form-label">No Meja</label>
                            <input type="text" class="form-control" id="title" name="no_meja"
                                placeholder="Masukkan nomor meja" required>
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Meja
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>No.</th>
                                <th>NO MEJA</th>
                                <th>Status</th>
                                <th>Action</th>


                        </thead>
                        <tbody>
                            @foreach ($meja as $no => $data)
                                <tr align="center">
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $data->no_meja }}</td>
                                    <td>{{ $data->status == '1' ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editmodal{{ $data->id }}">
                                            Edit
                                        </button>



                                        <!-- Modal -->
                                        <div class="modal fade" id="editmodal{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="uploadModalLabel">Upload Makanan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>



                                                    <div class="modal-body">
                                                        <form action="{{ route('meja.update', $data->id) }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            @include('sweetalert::alert')
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">No Meja</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="no_meja" value="{{ $data->no_meja }}"
                                                                    placeholder="Masukkan nomor meja" required>
                                                                @error('title')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Status</label>
                                                                <select name="status" class="form-control" id="">
                                                                    <option value="1"
                                                                        {{ $data->status == 1 ? 'selected' : '' }}>
                                                                        Tersedia</option>
                                                                    <option value="0"
                                                                        {{ $data->status == 0 ? 'selected' : '' }}>Tidak
                                                                        Tersedia</option>
                                                                </select>
                                                                @error('title')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
