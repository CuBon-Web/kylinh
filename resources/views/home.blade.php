@extends('layouts.main.master')
@section('title')
    {{ $setting->company }}
@endsection
@section('description')
    {{ $setting->webname }}
@endsection
@section('image')
    @php
        $ogBanner = $banner->first();
        $ogImage = $ogBanner && $ogBanner->image ? url($ogBanner->image) : url($setting->logo ?? '');
    @endphp
    {{ $ogImage }}
@endsection
@section('css')
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
@endsection
@section('js')
<script src="/frontend/js/wow.min.js"></script>
<script>
   (function () {
      if (typeof WOW !== 'function') {
         return;
      }
      new WOW({
         boxClass: 'wow',
         animateClass: 'animate__animated',
         offset: 0,
         mobile: true,
         live: true
      }).init();
   })();
</script>
@endsection
@section('content')
<div class="bodywrap">
  <div class="box_slide_banner box_slide_banner--full kl-hero">
     <div class="home-slider swiper-container">
        <div class="swiper-wrapper">
         @forelse ($banner as $item)
         @php
            $heroTitle = trim(html_entity_decode(strip_tags($item->title ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if ($heroTitle === '') {
               $heroTitle = "KỲ LINH FOOD";
            }
            $heroDesc = trim(html_entity_decode(strip_tags($item->description ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if ($heroDesc === '') {
               $heroDesc = 'Cung cấp thực phẩm tươi ngon, an toàn cho trường học, bệnh viện, nhà hàng, bếp ăn tập thể và các cơ quan, doanh nghiệp.';
            }
            $rawLink = trim($item->link ?? '');
            $heroLink = ($rawLink === '' || strlen($rawLink) < 3 || in_array(strtolower($rawLink), ['a', '#', 'javascript:void(0)'], true))
               ? route('allProduct')
               : $rawLink;
            $heroImage = $item->image;
            $heroImageMobile = !empty($item->image_mobile) ? $item->image_mobile : $item->image;
         @endphp
         <div class="swiper-slide">
           <div class="kl-hero__slide">
             @if ($heroImage)
             <div class="kl-hero__media">
               <img
                 src="{{ url($heroImage) }}"
                 alt="{{ $heroTitle }}"
                 class="kl-hero__img d-none d-lg-block" />
               <img
                 src="{{ url($heroImageMobile ?: $heroImage) }}"
                 alt="{{ $heroTitle }}"
                 class="kl-hero__img kl-hero__img--mobile d-lg-none" />
               <div class="kl-hero__fade" aria-hidden="true"></div>
               <div class="kl-hero__leaves" aria-hidden="true">
                 @for ($leaf = 1; $leaf <= 6; $leaf++)
                 <span class="kl-hero__leaf kl-hero__leaf--{{ $leaf }}">
                   <img src="/frontend/images/leaf.png" alt="">
                 </span>
                 @endfor
               </div>
             </div>
             @endif
             <div class="container kl-hero__body">
               <div class="kl-hero__content">
                 <div class="kl-hero__heading wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.15s">
                   @if ($loop->first)
                   <h1 class="kl-hero__title">KỲ LINH FOOD</h1>
                   @else
                   <p class="kl-hero__title">KỲ LINH FOOD</p>
                   @endif
                   <span class="kl-hero__title-line" aria-hidden="true">
                     <span class="kl-hero__title-line-bar"></span>
                     <svg viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M13.2 12.2C8.2 11.6 4 8.2 2.4 3.8c5.4.2 9.6 3.4 10.8 8.4Z" fill="currentColor"/>
                       <path d="M14.8 12.2c5-.6 9.2-4 10.8-8.4-5.4.2-9.6 3.4-10.8 8.4Z" fill="currentColor"/>
                       <path d="M14 12.4V2.6" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                     </svg>
                     <span class="kl-hero__title-line-bar"></span>
                   </span>
                 </div>
                 <p class="kl-hero__slogan wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">{!! $heroTitle !!}</p>
                 <div class="kl-hero__desc wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.45s">{{ $heroDesc }}</div>
                 <div class="kl-hero__features">
                   <div class="kl-hero__feature wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                     <div class="kl-hero__icon" aria-hidden="true">
                       <img src="/frontend/images/icon1.png" alt="">
                     </div>
                     <h3 class="kl-hero__feature-title">An toàn</h3>
                     <p class="kl-hero__feature-desc">Đảm bảo ATTP theo quy định</p>
                   </div>
                   <div class="kl-hero__feature wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                     <div class="kl-hero__icon" aria-hidden="true">
                        <img src="/frontend/images/icon2.png" alt="">
                     </div>
                     <h3 class="kl-hero__feature-title">Chất lượng</h3>
                     <p class="kl-hero__feature-desc">Nguồn hàng rõ ràng, chất lượng cao</p>
                   </div>
                   <div class="kl-hero__feature wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                     <div class="kl-hero__icon" aria-hidden="true">
                       <img src="/frontend/images/icon3.png" alt="">
                     </div>
                     <h3 class="kl-hero__feature-title">Cung ứng ổn định</h3>
                     <p class="kl-hero__feature-desc">Năng lực cung ứng lớn, luôn có nguồn dự phòng</p>
                   </div>
                 </div>
                 <div class="kl-hero__actions wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="1.05s">
                   <a href="{{ $heroLink }}" class="kl-hero__btn kl-hero__btn--primary" title="Khám phá ngay">
                     Khám phá ngay
                     <span class="kl-hero__btn-arrow" aria-hidden="true">
                       <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M2.5 7h9M8 3.5L11.5 7 8 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                     </span>
                   </a>
                   <a href="{{ route('lienHe') }}" class="kl-hero__btn kl-hero__btn--outline" title="Liên hệ tư vấn">Liên hệ tư vấn</a>
                 </div>
               </div>
             </div>
           </div>
        </div>
         @empty
         <div class="swiper-slide">
           <div class="kl-hero__slide">
             <div class="container kl-hero__body">
               <div class="kl-hero__content">
                 <div class="kl-hero__heading wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.15s">
                   <h1 class="kl-hero__title">{{ $setting->company ?? 'KỲ LINH FOOD' }}</h1>
                   <span class="kl-hero__title-line" aria-hidden="true">
                     <span class="kl-hero__title-line-bar"></span>
                     <svg viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M13.2 12.2C8.2 11.6 4 8.2 2.4 3.8c5.4.2 9.6 3.4 10.8 8.4Z" fill="currentColor"/>
                       <path d="M14.8 12.2c5-.6 9.2-4 10.8-8.4-5.4.2-9.6 3.4-10.8 8.4Z" fill="currentColor"/>
                       <path d="M14 12.4V2.6" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                     </svg>
                     <span class="kl-hero__title-line-bar"></span>
                   </span>
                 </div>
                 <p class="kl-hero__slogan wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">Thực phẩm sạch – An toàn /<br>Chất lượng – Uy tín</p>
                 <div class="kl-hero__desc wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.45s">Cung cấp thực phẩm tươi ngon, an toàn cho trường học, bệnh viện, nhà hàng, bếp ăn tập thể và các cơ quan, doanh nghiệp.</div>
               </div>
             </div>
           </div>
         </div>
         @endforelse
        </div>
        @if ($banner->count() > 1)
        <div class="swiper-pagination"></div>
        @endif
     </div>
  </div>
  <script>
     (function () {
         var heroSlides = document.querySelectorAll('.kl-hero .swiper-slide').length;
         var swiper = new Swiper('.kl-hero .home-slider', {
             loop: heroSlides > 1,
             autoHeight: false,
             slidesPerView: 1,
             spaceBetween: 0,
             speed: 700,
             autoplay: heroSlides > 1 ? { delay: 4500 } : false,
             pagination: heroSlides > 1 ? {
                 el: '.kl-hero .swiper-pagination',
                 clickable: true
             } : undefined
         });
     })();
  </script>
  <div id="js-global-alert" class="alert alert-success" role="alert">
     <button type="button" class="close"><span aria-hidden="true"><span
        aria-hidden="true">&times;</span></span></button>
     <h5 class="alert-heading"></h5>
     <p class="alert-content"></p>
  </div>
</div>
@endsection
