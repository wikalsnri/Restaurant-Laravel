{{-- @extends('admin.navbar')

@section('admin/content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addChefModal">
                    Add Chef
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addChefModal" tabindex="-1" role="dialog" aria-labelledby="addChefModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addChefModalLabel">Add Chef</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="speciality">Speciality:</label>
                                        <input type="text" class="form-control" name="speciality"
                                            placeholder="Enter Speciality">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Chef</h2>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Chef Name</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $chef)
                    <tr align="center">
                        <td>{{ $chef->name }}</td>
                        <td>{{ $chef->speciality }}</td>
                        <td><img height="100" width="100" src="/chefimage/{{ $chef->image }}" class="img-fluid"
                                alt="Chef Image"></td>
                        <td><a href="{{ url('/updatechef', $chef->id) }}">Update</a></td>
                        <td><a href="{{ url('/deletechef', $chef->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
