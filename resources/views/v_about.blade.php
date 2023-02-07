@extends('layout.v_template')
@section('content')
<div class="container-fluid hero-header bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-3 animated slideInDown">Sistem Agenda DJPb Sulawesi Tenggara</h1>
                <h6 style="color: grey" class="animated slideInDown">Sistem Informasi Agenda dapat mempermudah Anda melihat detail kegiatan yang akan dan/atau berlangsung di Kanwil DJPB Provinsi Sulawesi Tenggara.

            </div>
            <div class="col-lg-6 animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{'template'}}/img/Calendar.png"
                    alt="Calendar">
            </div>
        </div>
    </div>
</div>
@endsection