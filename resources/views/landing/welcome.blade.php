@extends('layout.master-landing')

@section('title', 'Java Learn - Belajar Budaya Jawa')

@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('landing-asset\img\Logo.png') }}"
                            alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary">JAVA LEARN</span></h1>
                    <p class="mb-4" style="text-align: justify;">Java Learn adalah sebuah platform pendidikan daring yang
                        didedikasikan untuk
                        memperkenalkan dan memperluas pemahaman tentang budaya Jawa kepada semua orang di seluruh dunia.
                        Kami berkomitmen untuk menjadi sumber informasi terpercaya dan inspiratif tentang segala hal
                        yang berkaitan dengan kebudayaan, sejarah, seni, dan tradisi Jawa.</p>

                    <p class="mb-4" style="text-align: justify;">Java Learn hadir untuk menjadi sumber informasi
                        terpercaya dan inspiratif tentang
                        segala hal yang berkaitan dengan
                        kebudayaan Jawa. Kami berkomitmen untuk mempromosikan keindahan dan kekayaan budaya Jawa kepada
                        generasi masa kini dan mendatang. Kami percaya bahwa dengan memahami dan menghargai warisan
                        budaya kita, kita dapat memperkuat identitas kita sendiri dan membangun jembatan harmoni
                        antarbudaya di seluruh dunia.</p>

                    <h6 class="mb-4">Budaya <span class="text-primary">Untuk Kita</span></h6>


                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Layanan Kami</h6>
                <h1 class="mb-5">Layanan Kami</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book text-primary mb-4"></i>
                            <h5>Kursus Bahasa Jawa</h5>
                            <p>Belajar bahasa Jawa secara intensif dan efektif dengan instruktur berpengalaman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-chalkboard-teacher text-primary mb-4"></i>
                            <h5>Materi Pendidikan</h5>
                            <p>Dapatkan akses ke berbagai materi pendidikan tentang budaya, sejarah, dan seni Jawa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-users text-primary mb-4"></i>
                            <h5>Komunitas Belajar</h5>
                            <p>Bergabunglah dengan komunitas belajar Jawa untuk berdiskusi dan bertukar pengalaman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-pencil-alt text-primary mb-4"></i>
                            <h5>Artikel dan Rujukan</h5>
                            <p>Baca artikel terbaru dan gunakan referensi kami untuk mendalami pengetahuan tentang budaya
                                Jawa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    @if (count($articles) > 0)
        <div class="container-xxl py-5 destination">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Culture</h6>
                    <h1 class="mb-5">Popular Culture</h1>
                </div>
                <div class="row g-3">
                    @foreach ($articles as $article)
                        <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden"
                                href="#">
                                {{-- <img class="img-fluid" src="{{ asset('landing-asset\img\budaya1.jpg') }}" alt=""> --}}

                                <img class="img-fluid" src="{{ asset('landing-asset\img\/' . $loop->iteration) . '.jpg' }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                    {{ $article->jumlah_like }}</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    {{ $article->judul }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection

{{-- {{ route('articles.show', ['id' => $article->id_artikel]) }} --}}