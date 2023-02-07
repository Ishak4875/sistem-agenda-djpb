@extends('layout.v_template')
@section('content')
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
                    <h4 style="text-align: center">Edit Agenda</h4>
                    <form action="/jadwal/update/{{$detail->id_agenda}}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                          <input type="hidden" style="color: black" placeholder="Masukkan Nama Agenda" value="{{$detail->event_id}}" name="event_id" class="form-control" />
                        </div>

                        <h6 class="form-label" for="form6Example3">Nama Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="text" style="color: black" placeholder="Masukkan Nama Agenda" value="{{$detail->nama_agenda}}" name="nama_agenda" class="form-control" />
                          <div class="text-danger">
                            @error('nama_agenda')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Tanggal Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="date" style="color: black" value="{{$detail->tanggal_agenda}}" name="tanggal_agenda" class="form-control" />
                          <div class="text-danger">
                            @error('tanggal_agenda')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example4">Waktu Agenda</h6>
                        <div class="form-outline mb-4">
                          <?php $waktu = date("H:i", strtotime($detail->waktu_agenda)) ?>
                          <input type="time" style="color: black" value="{{$waktu}}" name="waktu_agenda" class="form-control" />
                          <div class="text-danger">
                            @error('waktu_agenda')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Penganggung Jawab</h6>
                        <div class="form-outline mb-4">
                          <select name="penanggung_jawab" style="color: black" class="form-select" aria-label="Default select example">
                            <option <?php if(($detail->penanggung_jawab) == 'PPA 1') echo 'selected'?> value="PPA 1">PPA 1</option>
                            <option <?php if(($detail->penanggung_jawab) == 'PPA 2') echo 'selected'?> value="PPA 2">PPA 2</option>
                            <option <?php if(($detail->penanggung_jawab) == 'PAPK') echo 'selected'?> value="PAPK">PAPK</option>
                            <option <?php if(($detail->penanggung_jawab) == 'SKKI') echo 'selected'?> value="SKKI">SKKI</option>
                            <option <?php if(($detail->penanggung_jawab) == 'Umum') echo 'selected'?> value="Umum">Umum</option>
                          </select>
                          <div class="text-danger">
                            @error('penanggung_jawab')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example4">Via</h6>
                        <div class="form-outline mb-4">
                            <select name="via" style="color: black" class="form-select" aria-label="Default select example">
                                <option <?php if(($detail->via) == 'Online') echo 'selected'?> value="Online">Online</option>
                                <option <?php if(($detail->via) == 'Offline') echo 'selected'?> value="Offline">Offline</option>
                                <option <?php if(($detail->via) == 'Hybrid') echo 'selected'?> value="Hybrid">Hybrid</option>
                            </select>
                        </div>

                        <h6 class="form-label" for="form6Example4">Ruangan</h6>
                        <div class="form-outline mb-4">
                          <select name="ruang" style="color: black" class="form-select" aria-label="Default select example">
                            <option <?php if(($detail->ruang) == 'Ruang Rapat Lantai 2') echo 'selected'?> value="Ruang Rapat Lantai 2">Ruang Rapat Lantai 2</option>
                            <option <?php if(($detail->ruang) == 'Aula') echo 'selected'?> value="Aula">Aula</option>
                            <option <?php if(($detail->ruang) == 'TLC') echo 'selected'?> value="TLC">TLC</option>
                          </select>
                          <div class="text-danger">
                            @error('ruang')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example4">Mengundang Pak Kanwil</h6>
                        <div class="form-outline mb-4">
                            <select name="mengundang_pak_kanwil" style="color: black" class="form-select" aria-label="Default select example">
                                <option <?php if(($detail->mengundang_pak_kanwil) == 'Mengundang Pak Kanwil') echo 'selected'?> value="Mengundang Pak Kanwil">Mengundang Pak Kanwil</option>
                                <option <?php if(($detail->mengundang_pak_kanwil) == 'Tidak Mengundang Pak Kanwil') echo 'selected'?> value="Tidak Mengundang Pak Kanwil">Tidak Mengundang Pak Kanwil</option>
                            </select>
                        </div>

                        <h6 class="form-label" for="form6Example4">Status</h6>
                        <div class="form-outline mb-4">
                            <select name="status" style="color: black" class="form-select" aria-label="Default select example">
                                <option <?php if(($detail->status) == 'Belum Berlangsung') echo 'selected'?> value="Belum Berlangsung">Belum Berlangsung</option>
                                <option <?php if(($detail->status) == 'Sedang Berlangsung') echo 'selected'?> value="Sedang Berlangsung">Sedang Berlangsung</option>
                                <option <?php if(($detail->status) == 'Sudah Berlangsung') echo 'selected'?> value="Sudah Berlangsung">Sudah Berlangsung</option>
                            </select>
                        </div>
                      
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection