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
<div class="container-fluid hero-header bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-3 animated slideInDown">Sistem Agenda DJPb Sulawesi Tenggara</h1>
                <h6 style="color: grey" class="animated slideInDown">Sistem Informasi Agenda dapat mempermudah Anda melihat detail kegiatan yang akan dan/atau berlangsung di Kanwil DJPB Provinsi Sulawesi Tenggara.
                    Silahkan klik button dibawah untuk informasi lebih lanjut.</h6>
                    <br>
                <a href="/jadwal" class="btn btn-primary py-3 px-4 animated slideInDown">Jadwal Kegiatan</a>
                <!--
                    <a href="https://id.pngtree.com/so/kalender">kalender png dari id.pngtree.com</a>
                -->
            </div>
            <div class="col-lg-6 animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{'template'}}/img/Calendar.png"
                    alt="Calendar">
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Roadmap Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Jadwal Agenda</h1>
            <p class="text-primary fs-5 mb-5 pb-5">Persiapkan Diri Anda</p>
        </div>
        <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($agenda as $data)
                <?php $tanggal = date("d-m-Y", strtotime($data->tanggal_agenda)) ?>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>{{$tanggal}}<a href="/detail/{{$data->id_agenda}}"></a></h5>
                    <span>{{$data->nama_agenda}}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Roadmap End -->
@endsection