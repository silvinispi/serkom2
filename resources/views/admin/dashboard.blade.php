@extends('layouts.admin')
@section('title', $title)

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    {{-- WELCOME --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="mb-1">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h5>
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD STATISTIK --}}
                    <div class="row">
                        {{-- Guru --}}
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-card-1">
                                    <div class="card-block-small">
                                        <i class="icofont icofont-teacher bg-c-green card1-icon"></i>
                                        <span class="text-c-green f-w-600">Total Guru</span>
                                        <h4>{{ $totalGuru }}</h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-green f-16 icofont icofont-users m-r-10"></i>
                                                <a class="text-decoration-none text-dark" href="{{ route('admin.guru.index') }}">Kelola Guru</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{-- Siswa --}}
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-card-1">
                                    <div class="card-block-small">
                                        <i class="icofont icofont-student-alt bg-c-yellow card1-icon"></i>
                                        <span class="text-c-yellow f-w-600">Total Siswa</span>
                                        <h4>{{ $totalSiswa }}</h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-yellow f-16 icofont icofont-users m-r-10"></i>
                                                <a class="text-decoration-none text-dark" href="{{ route('admin.siswa.index') }}">Kelola Siswa</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{-- Ekstrakurikuler --}}
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-trophy-alt bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Ekstrakurikuler</span>
                                    <h4>{{ $totalEkskul }}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-blue f-16 icofont icofont-trophy m-r-10"></i>
                                            <a class="text-decoration-none text-dark" href="{{ route('admin.ekstrakurikuler.index') }}">Kelola Ekstrakurikuler</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Berita --}}
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-newspaper bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Berita</span>
                                    <h4>{{ $totalBerita }}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-news m-r-10"></i>
                                            <a class="text-decoration-none text-dark" href="{{ route('admin.berita.index') }}">Kelola Berita</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-trophy-alt bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Galeri</span>
                                    <h4>{{ $totalGaleri }}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-pink f-16 icofont icofont-trophy m-r-10"></i>
                                            <a class="text-decoration-none text-dark" href="{{ route('admin.galeri.index') }}">Kelola Galeri</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0)
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-card-1">
                                    <div class="card-block-small">
                                        <i class="icofont icofont-newspaper bg-c-pink card1-icon"></i>
                                        <span class="text-c-pink f-w-600">User</span>
                                        <h4>{{ $totalUser }}</h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-pink f-16 icofont icofont-news m-r-10"></i>
                                                <a class="text-decoration-none text-dark" href="{{ route('admin.user.index') }}">Kelola User</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- GRAFIK + BERITA TERBARU --}}
                    {{-- @if (Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0) --}}
                        <div class="row">
                            <div class="col-md-12 col-xl-7">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Statistik Siswa per Tahun Masuk</h5>
                                    </div>
                                    <div class="card-block">
                                        @if($siswaPerTahun->count() > 0)
                                            <div id="chart-siswa" style="height: 350px;"></div>
                                        @else
                                            <p class="text-center text-muted">Belum ada data siswa.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}

                        <div class="col-md-12 col-xl-5">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5>Berita Terbaru</h5>
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                                </div>
                                <div class="card-block">
                                    @if($beritaTerbaru->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($beritaTerbaru as $b)
                                                        <tr>
                                                            <td>
                                                                <a class="text-decoration-none text-dark" href="{{ route('admin.berita.show', Crypt::encrypt($b->id_berita)) }}">
                                                                    {{ \Illuminate\Support\Str::limit($b->judul, 35) }}
                                                                </a>
                                                                <br>
                                                                <small class="text-muted">{{ $b->user->name ?? '-' }}</small>
                                                            </td>
                                                            <td class="text-nowrap">{{ \Carbon\Carbon::parse($b->tanggal)->format('d-m-Y') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="text-center text-muted">Belum ada berita.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- GALERI TERBARU --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5>Galeri Terbaru</h5>
                                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                                </div>
                                <div class="card-block">
                                    @if($galeriTerbaru->count() > 0)
                                        <div class="row">
                                            @foreach($galeriTerbaru as $g)
                                                <div class="col-md-3 col-sm-6 mb-3">
                                                    <div class="card" style="border: 1px solid #eee;">
                                                        @if($g->kategori == 'Foto' && $g->file)
                                                            <img src="{{ asset('assets/admin/images/' . $g->file) }}" style="width: 100%; height: 150px; object-fit: cover;">
                                                        @else
                                                            <div style="width: 100%; height: 150px; background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                                                <span class="badge bg-primary">Video</span>
                                                            </div>
                                                        @endif
                                                        <div class="p-2">
                                                            <h6 class="mb-1">{{ \Illuminate\Support\Str::limit($g->judul, 25) }}</h6>
                                                            <small class="text-muted">{{ \Carbon\Carbon::parse($g->tanggal)->format('d-m-Y') }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-center text-muted">Belum ada galeri.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Grafik AmCharts --}}
@if($siswaPerTahun->count() > 0)
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script>
    var chart = am4core.create("chart-siswa", am4charts.XYChart);

    chart.data = [
        @foreach($siswaPerTahun as $s)
        { "tahun": "{{ $s->tahun_masuk }}", "total": {{ $s->total }} },
        @endforeach
    ];

    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "tahun";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;

    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "total";
    series.dataFields.categoryX = "tahun";
    series.name = "Jumlah Siswa";
    series.columns.template.tooltipText = "{categoryX}: {valueY} siswa";
    series.columns.template.fill = am4core.color("#4680ff");
    series.columns.template.stroke = am4core.color("#4680ff");
</script>
@endif
@endsection
