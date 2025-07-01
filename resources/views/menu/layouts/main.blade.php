@extends('menu.index')
@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">AHP Website</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Website untuk mendukung keputusanmu. Lakukan penilaianmu sekarang.</h2>
                <a class="btn btn-primary" href="#form-ahp">Isi Form</a>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">Analytic Hierarchy Process</h2>
                <p class="text-white-50">
                    Analytic Hierarchy Process (AHP) adalah metode pengambilan keputusan yang membantu Anda memilih pilihan terbaik dari berbagai alternatif berdasarkan sejumlah kriteria. Dengan membandingkan
                    antar kriteria dan alternatif secara berpasangan, AHP menyederhanakan keputusan yang kompleks menjadi langkah-langkah logis dan terukur.
                </p>
            </div>
        </div>
        <img class="img-fluid" src="front/assets/img/ipad.png" alt="..." />
    </div>
</section>
<!-- Projects-->
<section class="projects-section bg-light" id="projects">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="front/assets/img/bg-masthead.jpg" alt="..." /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Dinamis</h4>
                    <p class="text-black-50 mb-0">Dengan website ini anda bisa membuat sistem pendukung keputusan anda sendiri dan menyebarkannya ke orang lain.</p>
                </div>
            </div>
        </div>
        <!-- Project One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="front/assets/img/demo-image-01.jpg" alt="..." /></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Atur Alternatif</h4>
                            <p class="mb-0 text-white-50">Anda bisa dengan bebas menambahkan alternatif keputusan yang bisa dipilih.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Two Row-->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="front/assets/img/demo-image-02.jpg" alt="..." /></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Kelola Halaman Utama</h4>
                            <p class="mb-0 text-white-50">Serta mengelola isi konten yang akan disebarkan ke publik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup-->
<section class="signup-section" id="form-ahp">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-10 mx-auto text-center">
                <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-2">Analisis perhitunganmu sekarang!</h2>
                <form class="form-signup" id="contactForm">
                    <!-- Contact-->
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="contact-section">
                        <div class="container px-4 px-lg-5">
                            @foreach ($alternatif as $index => $alt)
                                <div class="row gx-4 gx-lg-5 mb-3">
                                    <div class="card py-4 h-100">
                                        <div class="card-body text-center">
                                            <p class="text-primary mb-2">{{ $index + 1 }}</p>
                                            <h4 class="text-uppercase m-0">{{ $alt->nama }}</h4>
                                            <hr class="my-4 mx-auto" />
                                            <div class="text-start">
                                                @php
                                                    $grouped = $subKriteria->groupBy('kriteria.id');
                                                @endphp

                                                @foreach ($grouped as $kriteriaId => $items)
                                                    <h4 class="text-primary">{{ $items->first()->kriteria->nama }}</h4>
                                                    <div class="form-group mb-3">
                                                        <select name="nilai[{{ $alt->id }}][{{ $kriteriaId }}]" class="form-control">
                                                            @foreach ($items as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection