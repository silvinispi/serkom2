@extends('layouts.landing')
@section('title', 'Profil Saya')
@section('content')

    <section class="container py-5" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row g-4 ">

                    <div class="col-md-4 text-center">
                        <img class="img-fluid rounded-4 shadow-sm mx-auto d-block"
                            src="{{ asset('assets/admin/images/nsp.jpeg') }}" style="max-width: 280px;">
                    </div>

                    <div class="col-md-8">
                        <h2 class="fw-bold text-success mb-3">Profil Saya</h2>
                        <div class="mb-4"
                            style="width: 200px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                        </div>

                        <table class="table table-borderless mb-0">
                            <tr>
                                <th style="width: 150px;">
                                    <i class="fa-solid fa-user text-success me-2"></i> Nama
                                </th>
                                <td>:Silvi Nispi</td>
                            </tr>
                            <tr>
                                <th>
                                    <i class="fa-solid fa-id-card text-success me-2"></i> NISN
                                </th>
                                <td>: 0095564385</td>
                            </tr>
                            <tr>
                                <th>
                                    <i class="fa-solid fa-location-dot text-success me-2"></i> Alamat
                                </th>
                                <td>: Kp. Munjul Desa.Girimukti Kec.Bojonggambir Kab.Tasikmalaya Prov.Jawa Barat Indonesia
                                </td>
                            </tr>
                            <tr>
                                <th>
                                   <i class="fa-solid fa-phone text-success me-2"></i> Kontak
                                </th>
                                <td>: 082119379679</td>
                            </tr>
                            <tr>
                                <th>
                                   <i class="fa-solid fa-user-graduate text-success me-2"></i> Jurusan
                                </th>
                                <td>: Rekayasa Perangkat Lunak</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
