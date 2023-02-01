@extends('layout.v_template')
@section('content')
@if (session('success'))
  <script>
    $(function () { //ready
      toastr.success("{{session('success')}}");
    });
  </script>
@endif
@if (session('error'))
  <script>
    $(function () { //ready
      toastr.error("{{session('error')}}");
    });
  </script>
@endif
<div class="container-fluid bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="card shadow p-3 mb-5 bg-white rounded animated slideInDown">
                <div class="card-body">
                    <h5 class="card-title">Daftar Agenda</h5>
                    <div class="table table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                <th style="color: black" scope="col">No</th>
                                <th style="color: black" scope="col">Nama Agenda</th>
                                <th style="color: black" scope="col">Tanggal Agenda</th>
                                <th style="color: black" scope="col">Waktu</th>
                                <th style="color: black" scope="col">Status</th>
                                <th style="color: black"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($agenda as $data)
                                    <tr>
                                        <th style="color: black" scope="row">{{$no++}}</th>
                                        <td style="color: black">{{$data->nama_agenda}}</td>
                                        <td style="color: black">{{$data->tanggal_agenda}}</td>
                                        <td style="color: black">{{$data->waktu_agenda}}</td>
                                        <td style="color: black">{{$data->status}}</td>
                                        <td>
                                            <a href="/jadwal/detail/{{$data->id_agenda}}" class="btn btn-sm btn-info"><i class="bi bi-info-circle"></i></a>
                                            @if (Auth::check())
                                              <a href="/jadwal/edit/{{$data->id_agenda}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                              <button data-bs-target="#delete{{$data->id_agenda}}" data-bs-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (Auth::check())
                          <a href="/jadwal/add" class="btn btn-sm btn-success">Add &nbsp;<i class="bi bi-plus-circle"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($agenda as $data)
<div class="modal fade" id="delete{{$data->id_agenda}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">{{$data->nama_agenda}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-danger">
          Apakah anda yakin ingin menghapus ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
          <a href="/jadwal/delete/{{$data->id_agenda}}" type="button" class="btn btn-danger">Yes</a>
        </div>
      </div>
    </div>
</div>
@endforeach
@endsection