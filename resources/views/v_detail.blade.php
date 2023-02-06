@extends('layout.v_template')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="/gambar/icon_detail.png" width="450px" height="450px" alt="Detail">
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6">Detail Agenda</h1>
                    <p class="text-primary fs-5 mb-4">{{$detail->nama_agenda}}</p>
                    <div class="d-flex align-items-center mb-2">
                        <?php $tanggal = date("d-m-Y", strtotime($detail->tanggal_agenda)) ?>
                        <i class="bi bi-calendar-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$tanggal}}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <?php $waktu = date("H:i", strtotime($detail->waktu_agenda)) ?>
                        <i class="bi bi-alarm bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$waktu}}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-wifi bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$detail->via}}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-door-open bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$detail->ruang}}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-envelope bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$detail->mengundang_pak_kanwil}}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person-badge bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$detail->penanggung_jawab}}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-check-circle bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>{{$detail->status}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection