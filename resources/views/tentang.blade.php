@extends('layouts.frontend')

@section('content')
<style>
    .about-hero {
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.9), rgba(59, 130, 246, 0.8), rgba(14, 165, 233, 0.7)), url('{{ asset('images/about-banner.jpg') }}') center/cover no-repeat;
        color: #fff;
        text-align: center;
        padding: 150px 30px;
        border-radius: 0 0 60px 60px;
        position: relative;
        overflow: hidden;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
        background-size: cover;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(1deg); }
    }

    .about-hero h1 {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 25px;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        position: relative;
        z-index: 2;
        background: linear-gradient(135deg, #ffffff, #e0f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .about-hero p {
        font-size: 1.4rem;
        max-width: 900px;
        margin: 0 auto;
        opacity: 0.95;
        position: relative;
        z-index: 2;
        line-height: 1.8;
    }

    .slogan {
        font-size: 1.5rem;
        font-style: italic;
        font-weight: 600;
        color: #e0f2fe;
        margin-top: 25px;
        animation: fadeInUp 2s ease-in-out;
        position: relative;
        z-index: 2;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .about-section {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 50%, #e0f2fe 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .about-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="rgba(59,130,246,0.03)" cx="200" cy="200" r="100"/><circle fill="rgba(30,64,175,0.02)" cx="800" cy="800" r="150"/></svg>');
        background-size: cover;
    }

    .about-section h2 {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1e40af, #3b82f6, #0ea5e9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }

    .feature-box {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(25px);
        border-radius: 25px;
        padding: 50px 40px;
        box-shadow: 0 20px 60px rgba(30, 64, 175, 0.15);
        transition: all 0.4s ease;
        border: 1px solid rgba(59, 130, 246, 0.1);
        position: relative;
        overflow: hidden;
    }

    .feature-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1e40af, #3b82f6, #0ea5e9);
    }

    .feature-box:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 30px 80px rgba(30, 64, 175, 0.25);
    }

    .feature-icon {
        font-size: 60px;
        margin-bottom: 30px;
        background: linear-gradient(135deg, #1e40af, #3b82f6, #0ea5e9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 4px 8px rgba(30, 64, 175, 0.2));
    }

    .story-section {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f8fafc 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .story-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(14,165,233,0.03)" points="0,1000 1000,0 1000,1000"/></svg>');
        background-size: cover;
    }

    .story-box {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(25px);
        border-radius: 25px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(30, 64, 175, 0.15);
        border: 1px solid rgba(59, 130, 246, 0.1);
        position: relative;
        overflow: hidden;
    }

    .story-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1e40af, #3b82f6, #0ea5e9);
    }

    .story-box h4 {
        color: #1e40af;
        font-weight: 800;
        font-size: 1.8rem;
        margin-bottom: 25px;
    }

    .story-box p {
        color: #374151;
        line-height: 1.9;
        font-size: 1.1rem;
    }

    .text-primary {
        color: #1e40af !important;
    }

    /* Modern animations */
    .fade-in-up {
        animation: fadeInUp 1.2s ease-out both;
    }

    .object-fit-cover {
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(30, 64, 175, 0.2);
        transition: all 0.4s ease;
    }

    .object-fit-cover:hover {
        transform: scale(1.05);
        box-shadow: 0 30px 80px rgba(30, 64, 175, 0.3);
    }

    /* Enhanced floating animation */
    .floating {
        animation: enhancedFloating 4s ease-in-out infinite;
    }

    @keyframes enhancedFloating {
        0%, 100% { 
            transform: translateY(0px) rotate(0deg); 
        }
        25% { 
            transform: translateY(-8px) rotate(1deg); 
        }
        50% { 
            transform: translateY(-15px) rotate(0deg); 
        }
        75% { 
            transform: translateY(-8px) rotate(-1deg); 
        }
    }

    /* Modern glow effect */
    .glow {
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.2);
        transition: all 0.4s ease;
    }

    .glow:hover {
        box-shadow: 0 0 50px rgba(59, 130, 246, 0.4);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .about-hero h1 {
            font-size: 2.8rem;
        }
        .about-hero p {
            font-size: 1.2rem;
        }
        .about-section h2 {
            font-size: 2.2rem;
        }
        .feature-box {
            padding: 30px 25px;
        }
        .story-box {
            padding: 30px 25px;
        }
    }

    /* Particle effect */
    .particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: particleFloat 6s infinite linear;
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }
</style>

{{-- Hero Section --}}
<div class="about-hero">
    <div class="particles">
        @for($i = 0; $i < 20; $i++)
            <div class="particle" style="
                left: {{ rand(0, 100) }}%;
                width: {{ rand(2, 6) }}px;
                height: {{ rand(2, 6) }}px;
                animation-delay: {{ rand(0, 6) }}s;
                animation-duration: {{ rand(4, 8) }}s;
            "></div>
        @endfor
    </div>
    <div class="container">
        <h1 data-aos="fade-up">Mengenal MalalaWak</h1>
        <p data-aos="fade-up" data-aos-delay="200">Kami hadir untuk membawa Anda menjelajahi keindahan wisata lokal dengan cara yang modern, informatif, dan penuh inspirasi.</p>
        <p class="slogan" data-aos="fade-up" data-aos-delay="400">"Malala basamo, basuo alam, raso jo adat Minang"</p>
    </div>
</div>

{{-- Visi Misi --}}
<section class="about-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2>Visi & Misi</h2>
            <p class="text-muted lead" style="font-size: 1.2rem;">Memberdayakan wisata lokal dan UMKM melalui teknologi dan informasi yang mudah diakses.</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-box text-center glow">
                    <div class="feature-icon floating">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h5 class="fw-bold mb-4" style="color: #1e40af; font-size: 1.5rem;">Visi</h5>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">Menjadi platform terdepan dalam pengenalan destinasi wisata lokal dan pemberdayaan UMKM daerah.</p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-box text-center glow">
                    <div class="feature-icon floating">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h5 class="fw-bold mb-4" style="color: #1e40af; font-size: 1.5rem;">Misi</h5>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
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
<section class="story-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2>Cerita di Balik MalalaWak</h2>
            <p class="text-muted lead" style="font-size: 1.2rem;">Sebuah perjalanan dari cinta terhadap kampung halaman, menjadi gerakan untuk memperkenalkan pesona lokal ke dunia.</p>
        </div>
        <div class="row align-items-stretch g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="h-100 fade-in-up">
                    <img src="{{ asset('images/story.jpg') }}" alt="Cerita Kami" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 400px;">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                <div class="story-box h-100 d-flex flex-column justify-content-center">
                    <h4 class="fw-bold text-primary mb-4">Berawal dari Rasa Rindu</h4>
                    <p class="mb-4">
                        MalalaWak lahir dari seorang anak rantau yang rindu akan pesona alam dan keramahan lokal di kampung halamannya.
                        Kami percaya bahwa setiap desa, setiap tebing, setiap jembatan tua, dan setiap senyum pelaku UMKM menyimpan cerita.
                    </p>
                    <p class="mb-4">
                        Lewat platform ini, kami ingin menghubungkan dunia dengan warisan budaya dan keindahan yang sering terlupakan. Kami percaya bahwa pariwisata bukan sekadar perjalanan, tapi perjumpaan.
                    </p>
                    <p class="text-muted fst-italic mt-4 fw-semibold" style="font-size: 1.1rem;">"MalalaWak bukan hanya aplikasi — ia adalah jendela menuju akar kita."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Enhanced intersection observer for animations
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.fade-in-up, .feature-box, .story-box');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    elements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(40px)';
        element.style.transition = 'all 0.8s ease';
        observer.observe(element);
    });
});

// Enhanced floating animation delay
document.querySelectorAll('.floating').forEach((element, index) => {
    element.style.animationDelay = `${index * 0.3}s`;
});

// Particle effect enhancement
function createParticle() {
    const particle = document.createElement('div');
    particle.className = 'particle';
    particle.style.left = Math.random() * 100 + '%';
    particle.style.width = Math.random() * 4 + 2 + 'px';
    particle.style.height = particle.style.width;
    particle.style.animationDelay = Math.random() * 6 + 's';
    particle.style.animationDuration = Math.random() * 4 + 4 + 's';
    
    document.querySelector('.particles').appendChild(particle);
    
    setTimeout(() => {
        particle.remove();
    }, 8000);
}

// Create particles periodically
setInterval(createParticle, 500);
</script>
@endsection