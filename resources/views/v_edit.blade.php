@extends('layout.v_template')
@section('content')
<div class="container-fluid bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center">Edit Agenda</h4>
                    <form>
                        <h6 class="form-label" for="form6Example3">Nama Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="text" style="color: black" placeholder="Masukkan Nama Agenda" value="{{$detail->nama_agenda}}" name="nama_agenda" class="form-control" />
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Tanggal Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="date" style="color: black" value="{{$detail->tanggal_agenda}}" name="tanggal_agenda" class="form-control" />
                        </div>

                        <h6 class="form-label" for="form6Example4">Waktu Agenda</h6>
                        <div class="form-outline mb-4">
                          <input type="time" style="color: black" value="{{$detail->waktu_agenda}}" name="waktu_agenda" class="form-control" />
                        </div>
                      
                        <h6 class="form-label" for="form6Example4">Penganggung Jawab</h6>
                        <div class="form-outline mb-4">
                          <input type="text" value="{{$detail->penanggung_jawab}}" placeholder="Masukkan Nama Penanggung Jawab" style="color: black" name="penanggung_jawab" class="form-control" />
                        </div>

                        <h6 class="form-label" for="form6Example4">Via</h6>
                        <div class="form-outline mb-4">
                            <select name="via" style="color: black" class="form-select" aria-label="Default select example">
                                <option <?php if(($detail->via) == 'Online') echo 'selected'?> value="Online">Online</option>
                                <option <?php if(($detail->via) == 'Offline') echo 'selected'?> value="Offline">Offline</option>
                            </select>
                        </div>

                        <h6 class="form-label" for="form6Example4">Ruangan</h6>
                        <div class="form-outline mb-4">
                          <input type="text" value="{{$detail->ruang}}" placeholder="Masukkan Ruangan" style="color: black" name="ruangan" class="form-control" />
                        </div>

                        <h6 class="form-label" for="form6Example4">Mengundang Pak Kanwil</h6>
                        <div class="form-outline mb-4">
                            <select name="status" style="color: black" class="form-select" aria-label="Default select example">
                                <option <?php if(($detail->mengundang_pak_kanwil) == 'Mengundang Pak Kanwil') echo 'selected'?> value="Mengundang Pak Kanwil">Mengundang Pak Kanwil</option>
                                <option <?php if(($detail->mengundang_pak_kanwil) == 'Belum Mengundang Pak Kanwil') echo 'selected'?> value="Belum Mengundang Pak Kanwil">Belum Mengundang Pak Kanwil</option>
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