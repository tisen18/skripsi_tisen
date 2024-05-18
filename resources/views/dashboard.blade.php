@extends('template')
@section('content')
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Analisis Clustering Wilayah Rawan Bencana </h5>
            <p class="mb-4">Kota Malang adalah salah satu kota di Provinsi Jawa Timur, Indonesia. </p>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/backgrounds/biak.jpg')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-12 order-1">
  <div class="row">
    <a href="/databencana" class="text-gray col-4 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Data bencana</span>
          <h3 class="card-title mb-2">{{$bencanaCount}}</h3>
          <!-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i></small> -->
        </div>
      </div>
    </a>

    <a href="/kategori" class="text-gray col-4 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
            </div>
          </div>
          <span>Data Kategori</span>
          <h3 class="card-title text-nowrap mb-1">{{$kategoriCount}}</h3>
        </div>
      </div>
    </a>

    <a href="/parameter" class="text-gray col-4 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Data parameter</span>
          <h3 class="card-title mb-2">{{$parameterCount}}</h3>
          <!-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> Kateogir Bencana </small> -->
        </div>
      </div>
    </a>

    <a href="/datauser" class="text-gray col-4 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
              <div class="card-title">
                <h5 class="text-nowrap mb-2">Data User</h5>
                <span class="badge bg-label-warning rounded-pill">Year 2023</span>
              </div>
              <div class="mt-sm-auto">
                <!-- <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small> -->
                <h3 class="mb-0">{{$userCount}}</h3>
              </div>
            </div>
            <div id="profileReportChart"></div>
          </div>
        </div>
      </div>
    </a>
  </div>

</div>
<!--/ Order Statistics -->




</div>
@endsection
