@extends('admin.navbar')

@section('admin/content')


    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Orderan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead  class="thead-dark">
                            <tr align="center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th>Nama Makanan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $no => $item)
                                <tr align="center">
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->foodname }}</td>
                                    <td>{{ $item->price }}.000</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price * $item->quantity}}.000</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
