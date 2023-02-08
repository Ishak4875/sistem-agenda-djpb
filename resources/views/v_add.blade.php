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
                    <h4 style="text-align: center">Tambah Agenda</h4>
                    <form action="/jadwal/insert" method="POST">
                        @csrf
                        <h6 class="form-label" for="form6Example3">Nama Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="text" style="color: black" placeholder="Masukkan Nama Agenda" name="nama_agenda" class="form-control" />
                          <div class="text-danger">
                            @error('nama_agenda')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Tanggal Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="date" style="color: black" name="tanggal_agenda" class="form-control" />
                          <div class="text-danger">
                            @error('tanggal_agenda')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example4">Waktu Mulai</h6>
                        <div class="form-outline mb-4">
                          <input type="time" style="color: black" name="waktu_mulai" class="form-control" />
                          <div class="text-danger">
                            @error('waktu_mulai')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example4">Waktu Akhir</h6>
                        <div class="form-outline mb-4">
                          <input type="time" style="color: black" name="waktu_akhir" class="form-control" />
                          <div class="text-danger">
                            @error('waktu_akhir')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Penganggung Jawab</h6>
                        <div class="form-outline mb-4">
                          <select name="penanggung_jawab" style="color: black" class="form-select" aria-label="Default select example">
                            <option value="PPA 1">PPA 1</option>
                            <option value="PPA 2">PPA 2</option>
                            <option value="PAPK">PAPK</option>
                            <option value="SKKI">SKKI</option>
                            <option value="Umum">Umum</option>
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
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>

                        <h6 class="form-label" for="form6Example4">Ruangan</h6>
                        <div class="form-outline mb-4">
                          <select name="ruang" style="color: black" class="form-select" aria-label="Default select example">
                            <option value="Ruang Rapat Lantai 2">Ruang Rapat Lantai 2</option>
                            <option value="Aula">Aula</option>
                            <option value="TLC">TLC</option>
                            <option value="Tidak Membutuhkan Ruangan">Tidak Membutuhkan Ruangan</option>
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
                                <option value="Mengundang Pak Kanwil">Mengundang Pak Kanwil</option>
                                <option value="Tidak Mengundang Pak Kanwil">Tidak Mengundang Pak Kanwil</option>
                            </select>
                        </div>

                        <h6 class="form-label" for="form6Example4">Status</h6>
                        <div class="form-outline mb-4">
                            <select name="status" style="color: black" class="form-select" aria-label="Default select example">
                                <option value="Belum Berlangsung">Belum Berlangsung</option>
                                <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                                <option value="Sudah Berlangsung">Sudah Berlangsung</option>
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