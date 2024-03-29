@extends('admin.navbar')

@section('admin/content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Reservasi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Tamu</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>No Meja</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservation as $no => $data)
                                <tr align="center">
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->guest }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->time }}</td>
                                    <td>{{ $data->meja->no_meja }}</td>
                                    <td>{{ $data->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
