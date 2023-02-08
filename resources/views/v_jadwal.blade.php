@extends('layout.v_template')
@section('background','class="bg-light"')
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
<div class="container-fluid py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="card shadow p-3 mb-5 bg-white rounded animated slideInDown">
                <div class="card-body">
                    <h5 class="card-title">Daftar Agenda</h5>
                    <div class="table table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                <th style="color: black" scope="col">No</th>
                                <th style="color: black" scope="col">Tanggal Agenda</th>
                                <th style="color: black" scope="col">Nama Agenda</th>
                                <th style="color: black" scope="col">Waktu</th>
                                <th style="color: black" scope="col">Ruangan</th>
                                <th style="color: black"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($agenda as $data)
                                    <tr>
                                        <?php $tanggal = date("d-m-Y", strtotime($data->tanggal_agenda)) ?>
                                        <?php $waktu = date("H:i", strtotime($data->waktu_agenda)) ?>
                                        <th style="color: black" scope="row">{{$no++}}</th>
                                        <td style="color: black">{{$tanggal}}</td>
                                        <td style="color: black">{{$data->nama_agenda}}</td>
                                        <td style="color: black">{{$waktu}}</td>
                                        <td style="color: black">{{$data->ruang}}</td>
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
                        <div class="d-flex justify-content-center">
                          {!! $agenda->links() !!}
                        </div>
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
          <button type="button" data-eventId="{{$data->event_id}}" data-agendaId="{{$data->id_agenda}}" class="btn btn-danger btndelete">Yes</button>
        </div>
      </div>
    </div>
</div>
@endforeach

<script type="text/javascript">
  $(document).ready(function(e){
    $(".btndelete").click(function(e){
      e.preventDefault();
      var id_agenda = $(this).closest('.btndelete').attr('data-agendaId');
      var event_id = $(this).closest('.btndelete').attr('data-eventId');
      var url = '{{URL("/jadwal/delete/")}}'+'/'+id_agenda+'/'+event_id;

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url:url,
        type:'GET',
        catch:false,
        data:{
          id_agenda:id_agenda,
          event_id:event_id
        },
        success:function(data){
          window.location.href = "/?status=success";
          toastr.success("Data Berhasil Di Delete!!!")
        },
        error:function(error){
          if(error.statusText !== undefined){
            toastr.error(error.statusText);
          }
        }
      })
    });
  });
</script>
@endsection