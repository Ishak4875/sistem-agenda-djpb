@extends('layout.v_template')
@section('content')
<div class="container-fluid bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="card shadow p-3 mb-5 bg-white rounded animated slideInDown">
                <div class="card-body">
                    <h4 style="text-align: center">Edit Agenda</h4>
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

                        <h6 class="form-label" for="form6Example4">Waktu Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="time" style="color: black" name="waktu_agenda" class="form-control" />
                          <div class="text-danger">
                            @error('waktu_agenda')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Penganggung Jawab</h6>
                        <div class="form-outline mb-4">
                          <input type="text" placeholder="Masukkan Nama Penanggung Jawab" style="color: black" name="penanggung_jawab" class="form-control" />
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
                            </select>
                        </div>

                        <h6 class="form-label" for="form6Example4">Ruangan</h6>
                        <div class="form-outline mb-4">
                          <input type="text" placeholder="Masukkan Ruangan" style="color: black" name="ruang" class="form-control" />
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
                                <option value="Belum Mengundang Pak Kanwil">Belum Mengundang Pak Kanwil</option>
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