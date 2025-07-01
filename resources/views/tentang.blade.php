@extends('layouts.frontend')

@section('content')
<style>
    .about-hero {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('{{ asset('images/about-banner.jpg') }}') center/cover no-repeat;
        color: #fff;
        text-align: center;
        padding: 100px 30px;
        border-radius: 0 0 50px 50px;
    }

    .about-hero h1 {
        font-size: 3.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 2px 2px 6px rgba(0,0,0,0.3);
    }

    .about-hero p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.9;
    }

    .slogan {
        font-size: 1.3rem;
        font-style: italic;
        font-weight: 600;
        color: #f9dbb7;
        margin-top: 15px;
        animation: fadeInUp 1.5s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .about-section {
        background-color: #fffdf8;
        padding: 80px 0;
    }

    .about-section h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #5b3c2d;
        margin-bottom: 30px;
    }

    .feature-box {
        background: #fff;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
        font-size: 40px;
        margin-bottom: 20px;
        color: #d2955c;
    }

    .team-section {
        padding: 80px 0;
        background: #f8f5f0;
    }

    .team-member {
        text-align: center;
    }

    .team-member img {
        border-radius: 50%;
        width: 130px;
        height: 130px;
        object-fit: cover;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .team-member img:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .team-member h5 {
        font-weight: 600;
        color: #5b3c2d;
    }

    .team-member span {
        font-size: 0.9rem;
        color: #777;
    }

    @media (max-width: 768px) {
        .about-hero h1 {
            font-size: 2.2rem;
        }
    }

    .story-section {
        background-color: #fffaf2;
        padding: 80px 0;
    }

    .story-box h4 {
        color: #5b3c2d;
    }

    .story-box p {
        color: #4a3c33;
        line-height: 1.7;
    }

    .text-primary {
        color: #d2955c !important;
    }

    /* Cerita Kami */
    .story-section {
        background-color: #fffaf2;
        padding: 80px 0;
    }

    .story-box h4 {
        color: #5b3c2d;
    }

    .story-box p {
        color: #4a3c33;
        line-height: 1.7;
    }

    .text-primary {
        color: #d2955c !important;
    }

    /* Animasi Fade In */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 1s ease-out both;
    }

    /* Untuk gambar agar tinggi penuh dan proporsional */
    .object-fit-cover {
        object-fit: cover;
    }


</style>

{{-- Hero Section --}}
<div class="about-hero">
    <h1>Mengenal MalalaWak</h1>
    <p>Kami hadir untuk membawa Anda menjelajahi keindahan wisata lokal dengan cara yang modern, informatif, dan penuh inspirasi.</p>
    <p class="slogan">“Malala basamo, basuo alam, raso jo adat Minang”</p>
</div>

{{-- Visi Misi --}}
<section class="about-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Visi & Misi</h2>
            <p class="text-muted">Memberdayakan wisata lokal dan UMKM melalui teknologi dan informasi yang mudah diakses.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="feature-box text-center">
                    <div class="feature-icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h5>Visi</h5>
                    <p>Menjadi platform terdepan dalam pengenalan destinasi wisata lokal dan pemberdayaan UMKM daerah.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-box text-center">
                    <div class="feature-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h5>Misi</h5>
                    <p>
                        1. Menyediakan informasi destinasi wisata yang akurat.<br>
                        2. Mendukung promosi UMKM lokal.<br>
                        3. Menghubungkan wisatawan dan pelaku lokal.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Cerita Kami --}}
{{-- Cerita Kami --}}
<section class="story-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Cerita di Balik MalalaWak</h2>
            <p class="text-muted">Sebuah perjalanan dari cinta terhadap kampung halaman, menjadi gerakan untuk memperkenalkan pesona lokal ke dunia.</p>
        </div>
        <div class="row align-items-stretch g-4">
            <div class="col-md-6">
                <div class="h-100 fade-in-up">
                    <img src="{{ asset('images/story.jpg') }}" alt="Cerita Kami" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover">
                </div>
            </div>
            <div class="col-md-6">
                <div class="story-box p-4 bg-white rounded-4 shadow-sm h-100 d-flex flex-column justify-content-center">
                    <h4 class="fw-bold text-primary mb-3">Berawal dari Rasa Rindu</h4>
                    <p>
                        MalalaWak lahir dari seorang anak rantau yang rindu akan pesona alam dan keramahan lokal di kampung halamannya.
                        Kami percaya bahwa setiap desa, setiap tebing, setiap jembatan tua, dan setiap senyum pelaku UMKM menyimpan cerita.
                    </p>
                    <p>
                        Lewat platform ini, kami ingin menghubungkan dunia dengan warisan budaya dan keindahan yang sering terlupakan. Kami percaya bahwa pariwisata bukan sekadar perjalanan, tapi perjumpaan.
                    </p>
                    <p class="text-muted fst-italic mt-4">MalalaWak bukan hanya aplikasi — ia adalah jendela menuju akar kita.”</p>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
@endsection
