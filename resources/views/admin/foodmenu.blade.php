@extends('admin.navbar')

@section('admin/content')
    <!-- Add a button to trigger the modal -->
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
                    <form action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @include('sweetalert::alert')
                        <div class="mb-3">
                            <label for="title" class="form-label">Menu</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Masukkan Menu" required>
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Masukkan Harga" required>
                            @error('price')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Masukkan Deskripsi" required>
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
        <div class="card mb-4 shadow">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Menu
            </div>


            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>No. </th>
                                <th>Nama Makanan</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $no => $item)
                                <tr align="center">
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->price }} </td>
                                    <td>{{ $item->description }}</td>
                                    <td><img height="200" width="200" src="/foodimage/{{ $item->image }}"></td>
                                    <td>
                                        <a class="btn btn-danger " href="{{ url('/deletemenu', $item->id) }}">Delete</a>
                                        <a class="btn btn-warning mb-2 mt-2"
                                            href="{{ url('/updateview', $item->id) }}">Update</a>
                                        <form action=" {{ route('statusfood', $item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $item->status == 1 ? '0' : '1' }}"
                                                name="status">
                                            @if ($item->status == 1)
                                                <button type="submit" class="btn btn-info">Non Aktifkan</button>
                                            @else
                                                <button type="submit" class="btn btn-primary">Aktifkan</button>
                                            @endif
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
