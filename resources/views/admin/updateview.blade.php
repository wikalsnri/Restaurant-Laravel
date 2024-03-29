@extends('admin.navbar')

@section('admin/content')
    <div class="container mt-4">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Update Menu</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ url('/update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('sweetalert::alert')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $data->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $data->price }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $data->description }}" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Old Image</label>
                                <img height="200" width="200" src="/foodimage/{{ $data->image }}" class="img-fluid"
                                    alt="Old Image">
                            </div>

                            <div class="form-group">
                                <label for="image">New Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Your HTML content -->

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
