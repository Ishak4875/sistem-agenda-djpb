@extends('layout.v_template')
@section('content')
<div class="container-fluid bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="table table-responsive">
                <table class="table table-light table-borderless animated slideInDown">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Agenda</th>
                        <th scope="col">Tanggal Agenda</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($agenda as $data)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$data->nama_agenda}}</td>
                                <td>{{$data->tanggal_agenda}}</td>
                                <td>{{$data->waktu_agenda}}</td>
                                <td>{{$data->status}}</td>
                                <td>
                                    <a href="/jadwal/detail/{{$data->id_agenda}}" class="btn btn-sm btn-primary">Detail</a>
                                    <a href="/jadwal/edit/{{$data->id_agenda}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="/jadwal/edit/{{$data->id_agenda}}" class="btn btn-sm btn-danger">Delete</a>
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