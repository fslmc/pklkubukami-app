@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/kontak-style.css') }}">
@endsection

@section('title', 'Halaman Kontak')

@section('body')
    <div class="contact-container">
        <h1>Hubungi Kami</h1>
        <div class="contact-info">
            <div class="info-item">
                <i class="fas fa-phone-alt"></i>
                <a href="tel:+1234567890" class="info-link"><h3>Telepon Kami</h3></a>
                <div class="info-description">Siap melayani Anda dari Sen-Jum 9-17</div>
            </div>
            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:info@example.com" class="info-link"><h3>Email Kami</h3></a>
                <div class="info-description">Siap melayani Anda dari Sen-Jum 9-17</div>
            </div>
        </div>
        <p>Mau ngobrol atau butuh info lebih lanjut?
            Silahkan hubungi kami, kami siap membantu dengan senang hati!</p>
        <div class="social-icons">
            <a href="https://www.instagram.com/yourprofile" target="_blank" class="icon-wrapper instagram" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
                <span class="social-name">Instagram</span>
                <div class="social-description">4,6K Pengikut</div>
            </a>
            <a href="https://www.facebook.com/yourprofile" target="_blank" class="icon-wrapper facebook" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
                <span class="social-name">Facebook</span>
                <div class="social-description">3,8K Pengikut</div>
            </a>
            <a href="https://wa.me/yourphonenumber" target="_blank" class="icon-wrapper whatsapp" aria-label="WhatsApp">
                <i class="fab fa-whatsapp"></i>
                <span class="social-name">WhatsApp</span>
                <div class="social-description">Hanya Sen-Jum 9-17</div>
            </a>
            <a href="mailto:youremail@example.com" class="icon-wrapper email" aria-label="Email">
                <i class="fas fa-envelope"></i>
                <span class="social-name">Email</span>
                <div class="social-description">Hanya Sen-Jum 9-17</div>
            </a>
        </div>
    </div>
@endsection
