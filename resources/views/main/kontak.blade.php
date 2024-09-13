@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/kontak-style.css') }}">
@endsection

@section('title', 'Halaman Kontak')

@section('body')
    <div class="contact-container">
        <header class="about-header text-center py-5">
            <h1 class="display-4 title">Hubungi Kami</h1>
            <p class="lead">PKL Kubukami - Kontak</p>
        </header>
        <div class="contact-info">
            <div class="info-item">
                <i class="fas fa-phone-alt"></i>
                <a href="https://api.whatsapp.com/send?phone=6281572061061" class="info-link"><h3>Telepon Kami</h3></a>
                <div class="info-description">Siap melayani Anda dari Sen-Jum 9-17</div>
            </div>
            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:masterb.ofc@gmail.com" class="info-link"><h3>Email Kami</h3></a>
                <div class="info-description">Siap melayani Anda dari Sen-Jum 9-17</div>
            </div>
        </div>
        <p>Mau ngobrol atau butuh info lebih lanjut?
            Silahkan hubungi kami, kami siap membantu dengan senang hati!</p>
        <div class="social-icons">
            <a href="https://www.instagram.com/pklkubukami/?utm_source=ig_web_button_share_sheet" target="_blank" class="icon-wrapper instagram" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
                <span class="social-name">Instagram</span>
                <div class="social-description">{{ $followerCount }} Pengikut</div>
            </a>
            <a href="https://www.facebook.com/yourprofile" target="_blank" class="icon-wrapper facebook" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
                <span class="social-name">Facebook</span>
                <div class="social-description">3,8K Pengikut</div>
            </a>
            <a href="https://api.whatsapp.com/send?phone=6281572061061" target="_blank" class="icon-wrapper whatsapp" aria-label="WhatsApp">
                <i class="fab fa-whatsapp"></i>
                <span class="social-name">WhatsApp</span>
                <div class="social-description">Hanya Sen-Jum 9-17</div>
            </a>
            <a href="mailto:masterb.ofc@gmail.com" class="icon-wrapper email" aria-label="Email">
                <i class="fas fa-envelope"></i>
                <span class="social-name">Email</span>
                <div class="social-description">Hanya Sen-Jum 9-17</div>
            </a>
        </div>
    </div>
@endsection
