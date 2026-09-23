@extends('layouts.main.master')
@section('title')
    Về Chúng Tôi
@endsection
@section('description')
    {{ $setting->company }}
@endsection
@section('css')
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ url('frontend/css/about_equip.css') }}?v={{ filemtime(public_path('frontend/css/about_equip.css')) }}">
<link rel="stylesheet" href="{{ url('frontend/css/about_hr.css') }}?v={{ filemtime(public_path('frontend/css/about_hr.css')) }}">
<link rel="stylesheet" href="{{ url('frontend/css/about_transport.css') }}?v={{ filemtime(public_path('frontend/css/about_transport.css')) }}">
<link rel="stylesheet" href="{{ url('frontend/css/about_partners.css') }}?v={{ filemtime(public_path('frontend/css/about_partners.css')) }}">
@endsection
@section('js')
@endsection
@section('content')
@php
    $aboutPage = $gioithieu ?? null;
    $aboutImage = null;
    if ($aboutPage && !empty($aboutPage->image)) {
        $imgRaw = $aboutPage->image;
        $imgData = json_decode($imgRaw, true);
        if (is_array($imgData) && !empty($imgData[0])) {
            $aboutImage = $imgData[0];
        } elseif (is_string($imgRaw) && $imgRaw !== '' && strpos(trim($imgRaw), '[') !== 0) {
            $aboutImage = $imgRaw;
        }
    }
    if (!$aboutImage && isset($banner) && $banner->isNotEmpty() && !empty($banner->first()->image)) {
        $aboutImage = $banner->first()->image;
    }

    $galleryItems = collect($album ?? [])->take(4);
    $factoryImage = $aboutImage;
    if ($galleryItems->isNotEmpty() && !empty($galleryItems->first()->after)) {
        $factoryImage = $galleryItems->first()->after;
    }

    $facilities = [
        ['icon' => 'area', 'label' => 'Diện tích nhà xưởng, sân bãi', 'value' => '200m²'],
        ['icon' => 'process', 'label' => 'Khu vực sơ chế', 'value' => '40m²'],
        ['icon' => 'warehouse', 'label' => 'Khu vực sản xuất', 'value' => '30m²'],
        ['icon' => 'cold', 'label' => 'Khu vực đóng gói', 'value' => '20m²'],
        ['icon' => 'pack', 'label' => 'Kho mát, kho lạnh', 'value' => '20m²'],
    ];

    $equipFeatures = [
        ['image' => '/frontend/images/icon11.png', 'lines' => ['Hiện đại', 'tiên tiến']],
        ['image' => '/frontend/images/icon12.png', 'lines' => ['Đảm bảo', 'ATTP']],
        ['image' => '/frontend/images/icon13.png', 'lines' => ['Dễ dàng', 'vệ sinh']],
        ['image' => '/frontend/images/icon14.png', 'lines' => ['Vận hành', 'ổn định']],
    ];

    $defaultEquipments = [
        ['art' => 'vacuum', 'name' => 'Máy hút chân không', 'desc' => 'Hút chân không giúp bảo quản thực phẩm lâu hơn, hạn chế vi khuẩn và giữ nguyên chất lượng sản phẩm.'],
        ['art' => 'table', 'name' => 'Bàn inox', 'desc' => 'Mặt bàn phẳng, dễ lau rửa, phù hợp sơ chế và thao tác chế biến thực phẩm mỗi ngày.'],
        ['art' => 'shelf', 'name' => 'Kệ inox', 'desc' => 'Sắp xếp nguyên liệu gọn gàng, thông thoáng, thuận tiện vệ sinh và kiểm soát kho.'],
        ['art' => 'scale', 'name' => 'Cân điện tử', 'desc' => 'Định lượng chính xác từng mẻ, hỗ trợ kiểm soát khẩu phần và chất lượng thành phẩm.'],
        ['art' => 'slicer', 'name' => 'Máy thái thịt', 'desc' => 'Thái lát đều, nhanh và sạch, đáp ứng năng suất sơ chế thịt tươi.'],
        ['art' => 'grinder', 'name' => 'Máy xay thịt', 'desc' => 'Xay nhuyễn đồng đều, phục vụ chế biến các sản phẩm từ thịt an toàn.'],
        ['art' => 'trolley', 'name' => 'Xe kéo hàng', 'desc' => 'Vận chuyển nguyên liệu và thành phẩm nhanh, gọn trong khu vực sản xuất.'],
        ['art' => 'bin', 'name' => 'Thùng nhựa thực phẩm', 'desc' => 'Đựng và bảo quản nguyên liệu đúng chuẩn, dễ vệ sinh sau mỗi ca.'],
        ['art' => 'gio', 'name' => 'Máy xay giò', 'desc' => 'Xay thịt và gia vị mịn, đều cho quy trình sản xuất giò chả.'],
        ['art' => 'steamer', 'name' => 'Nồi hấp giò', 'desc' => 'Hấp chín đều, giữ hương vị và đảm bảo vệ sinh trong suốt quá trình chế biến.'],
        ['art' => 'griddle', 'name' => 'Bếp điện rán chả', 'desc' => 'Rán chín đều, dễ kiểm soát nhiệt độ và vệ sinh bề mặt sau khi sử dụng.'],
    ];

    $equipRows = collect($equipments ?? []);
    if ($equipRows->isEmpty()) {
        $equipRows = collect($defaultEquipments)->map(function ($item, $index) {
            return (object) [
                'title' => $item['name'],
                'description' => $item['desc'],
                'image' => null,
                'art' => $item['art'],
                'sort' => $index + 1,
            ];
        });
    }

    $equipLast = $equipRows->count() > 0 ? $equipRows->last() : null;
    $equipGrid = $equipRows->count() > 1 ? $equipRows->slice(0, -1)->values() : collect();

    $equipPromises = [
        ['icon' => 'origin', 'label' => 'Nguồn gốc rõ ràng'],
        ['icon' => 'shield', 'label' => 'Đảm bảo ATTP'],
        ['icon' => 'badge', 'label' => 'Chất lượng ổn định'],
        ['icon' => 'supply', 'label' => 'Cung ứng chuyên nghiệp'],
    ];

    $hr = $hrSetting;
    if (!$hr) {
        $hr = (object) [
            'section_title' => 'Nhân lực',
            'subtitle' => 'Đội ngũ chuyên nghiệp – Tận tâm – Trách nhiệm',
            'intro_content' => "Nhân sự Kỳ Linh Food được tổ chức chuyên nghiệp, huấn luyện bài bản trong chế biến thực phẩm và tuân thủ nghiêm ngặt quy trình VSATTP.\n\nMỗi cán bộ nhân viên đều được đào tạo, kiểm tra định kỳ và luôn đặt trách nhiệm lên hàng đầu trong từng khâu thao tác.",
            'main_image' => null,
            'training_title' => 'ĐÀO TẠO & PHÁT TRIỂN',
            'health_title' => 'KHÁM SỨC KHỎE ĐỊNH KỲ',
            'health_image' => null,
            'health_text' => 'Nhân viên tham gia sản xuất đều được khám sức khỏe định kỳ, đảm bảo điều kiện làm việc an toàn và phù hợp quy định ATTP.',
            'health_badge_image' => null,
            'footer_text' => 'KỲ LINH FOOD | HỒ SƠ NĂNG LỰC',
        ];
    }
    $hrFeatureList = collect($hrFeatures ?? []);
    $hrTrainingList = collect($hrTraining ?? []);
    $hrIntroParagraphs = preg_split('/\R\R+/', trim((string) ($hr->intro_content ?? '')));
    $hrIntroParagraphs = array_values(array_filter($hrIntroParagraphs, function ($p) {
        return trim($p) !== '';
    }));

    $tp = $transportSetting ?? null;
    if (!$tp) {
        $tp = (object) [
            'section_title' => 'Phương tiện vận chuyển',
            'subtitle' => 'Vận chuyển an toàn – Giữ trọn chất lượng',
            'intro_content' => "Kỳ Linh Food sở hữu hệ thống phương tiện vận chuyển chuyên dụng, đáp ứng yêu cầu bảo quản và giao nhận thực phẩm theo tiêu chuẩn vệ sinh an toàn thực phẩm.\n\nToàn bộ phương tiện được kiểm soát nhiệt độ, vệ sinh định kỳ và vận hành theo quy trình nghiêm ngặt nhằm đảm bảo chất lượng sản phẩm đến tay khách hàng.",
            'main_image' => null,
            'gallery_images' => '["","",""]',
            'quote_text' => 'Vận chuyển chuyên nghiệp – Đảm bảo chất lượng – Trao trọn niềm tin',
            'quote_icon' => null,
            'footer_text' => 'KỲ LINH FOOD | HỒ SƠ NĂNG LỰC',
        ];
    }
    $tpFeatureList = collect($transportFeatures ?? []);
    $tpBadgeList = collect($transportBadges ?? []);
    $tpGallery = [];
    if (is_array($tp->gallery_images ?? null)) {
        $tpGallery = $tp->gallery_images;
    } else {
        $decodedGal = json_decode((string) ($tp->gallery_images ?? '[]'), true);
        $tpGallery = is_array($decodedGal) ? $decodedGal : [];
    }
    $tpGallery = array_values(array_filter($tpGallery, function ($img) {
        return !empty($img);
    }));
    $tpIntroParagraphs = preg_split('/\R\R+/', trim((string) ($tp->intro_content ?? '')));
    $tpIntroParagraphs = array_values(array_filter($tpIntroParagraphs, function ($p) {
        return trim($p) !== '';
    }));

    $partnerList = collect($partner ?? [])->take(5)->values();
    $partnerBrandLogo = !empty($setting->logo) ? $setting->logo : null;
    $partnerBrandName = $setting->company ?? ($setting->webname ?? 'Kỳ Linh Food');
@endphp
<div class="bodywrap kl-about">
    <nav class="kl-about__breadcrumb" aria-label="Breadcrumb">
        <div class="container">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="kl-about__breadcrumb-sep">&gt;</span>
            <span>Giới thiệu</span>
        </div>
    </nav>

    <section class="kl-about__hero">
        <div class="kl-about__hero-slide">
            @if ($aboutImage)
            <div class="kl-about__hero-media">
                <img src="{{ url($aboutImage) }}" alt="Giới thiệu {{ $setting->company ?? 'Kỳ Linh Food' }}" class="kl-about__hero-img">
                <div class="kl-about__hero-fade" aria-hidden="true"></div>
                <div class="kl-about__hero-leaves" aria-hidden="true">
                    @for ($leaf = 1; $leaf <= 4; $leaf++)
                    <span class="kl-about__leaf kl-about__leaf--{{ $leaf }}">
                        <img src="/frontend/images/leaf.png" alt="">
                    </span>
                    @endfor
                </div>
            </div>
            @endif
            <div class="container kl-about__hero-body">
                <div class="kl-about__hero-content">
                    <h1 class="kl-about__hero-title">Giới thiệu về Kỳ Linh Food</h1>
                    <p class="kl-about__hero-motto">Uy tín tạo nên thương hiệu – Chất lượng tạo nên niềm tin</p>
                    <div class="kl-about__hero-desc">
                        <p>Kỳ Linh Food là đơn vị chuyên cung cấp thực phẩm tươi sống và thực phẩm chế biến cho các trường học, bệnh viện, nhà hàng, bếp ăn công nghiệp, cơ quan và doanh nghiệp trên toàn quốc.</p>
                        <p>Với hệ thống quy trình kiểm soát chất lượng khép kín từ khâu nhập hàng, sơ chế, bảo quản đến vận chuyển, chúng tôi cam kết mang đến nguồn thực phẩm an toàn – chất lượng – ổn định cho đối tác.</p>
                    </div>
                    <a href="#kl-about-main" class="kl-about__hero-btn" title="Tìm hiểu thêm về chúng tôi">
                        <span class="kl-about__hero-btn-icon" aria-hidden="true">
                            <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 17.5c-3.5-.5-6-3-6.5-6.2 2.7.1 4.8 1.7 5.5 4.2Z" fill="currentColor"/>
                                <path d="M10.5 17.5c3.5-.5 6-3 6.5-6.2-2.7.1-4.8 1.7-5.5 4.2Z" fill="currentColor"/>
                                <path d="M10 17.7V4.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                            </svg>
                        </span>
                        Tìm hiểu thêm về chúng tôi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="kl-about__main" id="kl-about-main">
        <div class="container">
            <div class="kl-about__main-grid">
                <div class="kl-about__intro">
                    <h2 class="kl-about__section-title">Về chúng tôi</h2>
                    <div class="kl-about__intro-text">
                        @if ($aboutPage && !empty($aboutPage->content))
                            {!! $aboutPage->content !!}
                        @else
                            <p>Kỳ Linh Food được thành lập với sứ mệnh cung cấp nguồn thực phẩm sạch, an toàn và chất lượng cao cho các đơn vị cung cấp suất ăn tập thể. Qua nhiều năm phát triển, chúng tôi đã xây dựng hệ thống vận hành chuyên nghiệp, đáp ứng nhu cầu cung ứng ổn định cho hàng trăm khách hàng.</p>
                            <p>Chúng tôi không ngừng đầu tư cơ sở vật chất, nâng cao năng lực sản xuất và chế biến, đồng thời đào tạo đội ngũ nhân sự tận tâm – trách nhiệm, góp phần bảo vệ sức khỏe cộng đồng.</p>
                        @endif
                    </div>
                    <p class="kl-about__signature">
                        <span>Kỳ Linh Food</span>
                        <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M10 17.5c-3.5-.5-6-3-6.5-6.2 2.7.1 4.8 1.7 5.5 4.2Z" fill="currentColor"/>
                            <path d="M10 17.7V4.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                    </p>
                </div>

                <div class="kl-about__stats">
                    @forelse ($whyChoose as $item)
                    <div class="kl-about__stat">
                        <div class="kl-about__stat-icon" aria-hidden="true">
                            @if (!empty($item->image))
                            <img src="{{ url($item->image) }}" alt="{{ $item->title }}">
                            @else
                            @include('partials.about-icon', ['type' => 'building'])
                            @endif
                        </div>
                        <p class="kl-about__stat-value">{{ $item->title }}</p>
                        <p class="kl-about__stat-label">{{ $item->description }}</p>
                    </div>
                    @empty
                    <div class="kl-about__stat">
                        <div class="kl-about__stat-icon" aria-hidden="true">
                            @include('partials.about-icon', ['type' => 'building'])
                        </div>
                        <p class="kl-about__stat-value">5+</p>
                        <p class="kl-about__stat-label">Năm kinh nghiệm trong lĩnh vực cung ứng thực phẩm</p>
                    </div>
                    @endforelse
                </div>

                <div class="kl-about__factory">
                    <div class="kl-about__factory-top">
                        @if ($factoryImage)
                        <div class="kl-about__factory-photo">
                            <img src="{{ url($factoryImage) }}" alt="Quy mô nhà xưởng Kỳ Linh Food">
                            <span class="kl-about__factory-badge">
                                @include('partials.about-icon', ['type' => 'factory'])
                                Quy mô nhà xưởng
                            </span>
                        </div>
                        @endif
                        <div class="kl-about__factory-panel">
                            <ul class="kl-about__factory-list">
                                @foreach ($facilities as $facility)
                                <li>
                                    <span class="kl-about__factory-list-icon kl-about__factory-list-icon--{{ $facility['icon'] }}" aria-hidden="true">
                                        @include('partials.about-icon', ['type' => $facility['icon']])
                                    </span>
                                    <span class="kl-about__factory-list-text">
                                        <span class="kl-about__factory-list-label">{{ $facility['label'] }}</span>
                                        @if (!empty($facility['value']))
                                        <strong class="kl-about__factory-list-value">{{ $facility['value'] }}</strong>
                                        @endif
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @if ($galleryItems->isNotEmpty())
                    <div class="kl-about__factory-gallery">
                        @foreach ($galleryItems as $item)
                        @php $thumb = $item->after ?: ($item->before ?? null); @endphp
                        @if ($thumb)
                        <div class="kl-about__factory-thumb">
                            <img src="{{ url($thumb) }}" alt="{{ $item->title ?? 'Hình ảnh nhà xưởng' }}">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="kl-about__values">
        <div class="container">
            <h2 class="kl-about__values-title">Giá trị cốt lõi</h2>
            <div class="kl-about__values-grid">
                @forelse ($coreValues as $item)
                <div class="kl-about__value">
                    <div class="kl-about__value-icon" aria-hidden="true">
                        @if (!empty($item->image))
                        <img src="{{ url($item->image) }}" alt="{{ $item->title }}">
                        @else
                        @include('partials.about-icon', ['type' => 'shield'])
                        @endif
                    </div>
                    <h3 class="kl-about__value-title">{{ $item->title }}</h3>
                    <p class="kl-about__value-desc">{{ $item->description }}</p>
                </div>
                @empty
                <div class="kl-about__value">
                    <div class="kl-about__value-icon" aria-hidden="true">
                        @include('partials.about-icon', ['type' => 'shield'])
                    </div>
                    <h3 class="kl-about__value-title">An toàn</h3>
                    <p class="kl-about__value-desc">Đảm bảo vệ sinh an toàn thực phẩm theo quy định hiện hành.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="kl-equip" id="kl-about-equip" aria-labelledby="kl-equip-title">
        <div class="kl-equip__leaves" aria-hidden="true">
            <span>@include('partials.equip-art', ['type' => 'leaf'])</span>
            <span>@include('partials.equip-art', ['type' => 'leaf'])</span>
            <span>@include('partials.equip-art', ['type' => 'leaf'])</span>
        </div>
        <div class="container">
            <div class="kl-equip__intro">
                <div>
                    <h2 class="kl-equip__title" id="kl-equip-title">
                        Trang thiết bị
                        <span class="kl-equip__title-leaf">@include('partials.equip-art', ['type' => 'leaf'])</span>
                    </h2>
                    <p class="kl-equip__lead">Kỳ Linh Food được trang bị hệ thống máy móc, thiết bị hiện đại phục vụ sơ chế, chế biến và đóng gói thực phẩm an toàn.</p>
                </div>
                <ul class="kl-equip__features">
                    @foreach ($equipFeatures as $feature)
                    <li>
                        <span class="kl-equip__feature-icon" aria-hidden="true">
                            @if (!empty($feature['image']))
                            <img src="{{ url($feature['image']) }}" alt="{{ implode(' ', $feature['lines']) }}">
                            @endif
                        </span>
                        <span class="kl-equip__feature-label">
                            @foreach ($feature['lines'] as $line)
                            <span>{{ $line }}</span>
                            @endforeach
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="kl-equip__grid">
                @foreach ($equipGrid as $index => $item)
                <article class="kl-equip__card">
                    <div class="kl-equip__head">
                        <span class="kl-equip__no">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="kl-equip__name">{{ $item->title }}</h3>
                    </div>
                    <div class="kl-equip__visual">
                        @if (!empty($item->image))
                        <img src="{{ url($item->image) }}" alt="{{ $item->title }}">
                        @elseif (!empty($item->art))
                        @include('partials.equip-art', ['type' => $item->art])
                        @else
                        @include('partials.equip-art', ['type' => 'table'])
                        @endif
                    </div>
                    <p class="kl-equip__desc">{{ $item->description }}</p>
                </article>
                @endforeach
            </div>

            @if ($equipLast)
            <div class="kl-equip__bottom">
                <article class="kl-equip__card kl-equip__card--wide">
                    <div class="kl-equip__head">
                        <span class="kl-equip__no">{{ str_pad($equipGrid->count() + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="kl-equip__name">{{ $equipLast->title }}</h3>
                    </div>
                    <div class="kl-equip__body">
                        <div class="kl-equip__visual">
                            @if (!empty($equipLast->image))
                            <img src="{{ url($equipLast->image) }}" alt="{{ $equipLast->title }}">
                            @elseif (!empty($equipLast->art))
                            @include('partials.equip-art', ['type' => $equipLast->art])
                            @else
                            @include('partials.equip-art', ['type' => 'griddle'])
                            @endif
                        </div>
                        <p class="kl-equip__desc">{{ $equipLast->description }}</p>
                    </div>
                </article>

                <aside class="kl-equip__commit">
                    <div class="kl-equip__commit-badge">
                       <img src="/frontend/images/icon15.png" alt="ATTP">
                    </div>
                    <div>
                        <h3 class="kl-equip__commit-title">Cam kết của Kỳ Linh Food</h3>
                        <p class="kl-equip__commit-text">Toàn bộ trang thiết bị được lựa chọn kỹ lưỡng, có nguồn gốc rõ ràng, đáp ứng tiêu chuẩn vệ sinh an toàn thực phẩm và vận hành ổn định trong quy trình sản xuất.</p>
                    </div>
                    <div class="kl-equip__commit-art" aria-hidden="true">
                       <img src="/frontend/images/icon16.png" alt="Kitchen">
                    </div>
                </aside>
            </div>
            @endif

            <div class="kl-equip__bar">
                @foreach ($equipPromises as $promise)
                    @if (!$loop->first)
                    <span class="kl-equip__bar-dot" aria-hidden="true"></span>
                    @endif
                    <span class="kl-equip__bar-item">
                        @include('partials.equip-art', ['type' => $promise['icon']])
                        {{ $promise['label'] }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>
    <section class="kl-hr" id="kl-about-hr" aria-labelledby="kl-hr-title">
        <div class="container">
            <div class="kl-hr__panel">
                <div class="kl-hr__top">
                    <div class="kl-hr__content">
                        <h2 class="kl-hr__title" id="kl-hr-title">
                            {{ $hr->section_title }}
                            <span class="kl-hr__title-leaf" aria-hidden="true">
                                <img src="/frontend/images/leaf.png" alt="">
                            </span>
                        </h2>
                        @if (!empty($hr->subtitle))
                        <p class="kl-hr__subtitle">{{ $hr->subtitle }}</p>
                        @endif
                        @if (count($hrIntroParagraphs) > 0)
                        <div class="kl-hr__intro">
                            @foreach ($hrIntroParagraphs as $paragraph)
                            <p>{{ trim($paragraph) }}</p>
                            @endforeach
                        </div>
                        @endif
                        @if ($hrFeatureList->isNotEmpty())
                        <ul class="kl-hr__features">
                            @foreach ($hrFeatureList as $feature)
                            <li>
                                <span class="kl-hr__feature-icon" aria-hidden="true">
                                    @if (!empty($feature->image))
                                    <img src="{{ url($feature->image) }}" alt="">
                                    @endif
                                </span>
                                <div class="kl-hr__feature-body">
                                    <strong class="kl-hr__feature-title">{{ $feature->title }}</strong>
                                    @if (!empty($feature->description))
                                    <p class="kl-hr__feature-desc">{{ $feature->description }}</p>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        @if (!empty($hr->footer_text))
                        <p class="kl-hr__footer-note">{{ $hr->footer_text }}</p>
                        @endif
                    </div>
                    <div class="kl-hr__aside">
                        @if (!empty($hr->main_image))
                        <div class="kl-hr__photo">
                            <img src="{{ url($hr->main_image) }}" alt="{{ $hr->section_title }}">
                        </div>
                        <div class="kl-hr__cards">
                            <div class="kl-hr__box">
                                <div class="kl-hr__box-head">{{ $hr->training_title }}</div>
                                <div class="kl-hr__box-body">
                                    @if ($hrTrainingList->isNotEmpty())
                                    <div class="kl-hr__training-grid">
                                        @foreach ($hrTrainingList as $train)
                                        <div class="kl-hr__training-item">
                                            @if (!empty($train->image))
                                            <img src="{{ url($train->image) }}" alt="">
                                            @endif
                                            <span>{{ $train->description }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="kl-hr__box">
                                <div class="kl-hr__box-head">{{ $hr->health_title }}</div>
                                <div class="kl-hr__box-body kl-hr__health">
                                    @if (!empty($hr->health_image))
                                    <div class="kl-hr__health-photo">
                                        <img src="{{ url($hr->health_image) }}" alt="{{ $hr->health_title }}">
                                    </div>
                                    @endif
                                    @if (!empty($hr->health_text))
                                    <p class="kl-hr__health-text">{{ $hr->health_text }}</p>
                                    @endif
                                    @if (!empty($hr->health_badge_image))
                                    <span class="kl-hr__health-badge" aria-hidden="true">
                                        <img src="{{ url($hr->health_badge_image) }}" alt="">
                                    </span>
                                    @elseif (file_exists(public_path('frontend/images/icon15.png')))
                                    <span class="kl-hr__health-badge" aria-hidden="true">
                                        <img src="/frontend/images/icon15.png" alt="">
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="kl-hr__photo kl-hr__photo--placeholder" aria-hidden="true"></div>
                        @endif
                    </div>
                    
                </div>
               
                <div class="kl-hr__leaves kl-hr__leaves--bl" aria-hidden="true">
                    <img src="/frontend/images/leaf.png" alt="">
                </div>
                <div class="kl-hr__leaves kl-hr__leaves--br" aria-hidden="true">
                    <img src="/frontend/images/leaf.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="kl-transport" id="kl-about-transport" aria-labelledby="kl-transport-title">
        <div class="container">
            <div class="kl-transport__panel">
                <div class="kl-transport__grid">
                    <div class="kl-transport__content">
                        <h2 class="kl-transport__title" id="kl-transport-title">
                            {{ $tp->section_title }}
                            <span class="kl-transport__title-leaf" aria-hidden="true">
                                <img src="/frontend/images/leaf.png" alt="">
                            </span>
                        </h2>
                        @if (!empty($tp->subtitle))
                        <p class="kl-transport__subtitle">{{ $tp->subtitle }}</p>
                        @endif
                        @if (count($tpIntroParagraphs) > 0)
                        <div class="kl-transport__intro">
                            @foreach ($tpIntroParagraphs as $paragraph)
                            <p>{{ trim($paragraph) }}</p>
                            @endforeach
                        </div>
                        @endif
                        @if ($tpFeatureList->isNotEmpty())
                        <ul class="kl-transport__features">
                            @foreach ($tpFeatureList as $feature)
                            <li>
                                <span class="kl-transport__feature-icon" aria-hidden="true">
                                    @if (!empty($feature->image))
                                    <img src="{{ url($feature->image) }}" alt="">
                                    @endif
                                </span>
                                <div>
                                    <strong class="kl-transport__feature-title">{{ $feature->title }}</strong>
                                    @if (!empty($feature->description))
                                    <p class="kl-transport__feature-desc">{{ $feature->description }}</p>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        @if (!empty($tp->footer_text))
                        <p class="kl-transport__footer-note">{{ $tp->footer_text }}</p>
                        @endif
                    </div>

                    <div class="kl-transport__aside">
                        @if ($tpBadgeList->isNotEmpty())
                        <div class="kl-transport__badges">
                            @foreach ($tpBadgeList as $badge)
                            <div class="kl-transport__badge">
                                <span class="kl-transport__badge-icon" aria-hidden="true">
                                    @if (!empty($badge->image))
                                    <img src="{{ url($badge->image) }}" alt="">
                                    @endif
                                </span>
                                <span class="kl-transport__badge-label">
                                    <span>{{ $badge->title }}</span>
                                    @if (!empty($badge->description))
                                    <span>{{ $badge->description }}</span>
                                    @endif
                                </span>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        @if (!empty($tp->main_image))
                        <div class="kl-transport__main-photo">
                            <img src="{{ url($tp->main_image) }}" alt="{{ $tp->section_title }}">
                        </div>
                        @else
                        <div class="kl-transport__main-photo kl-transport__main-photo--placeholder" aria-hidden="true"></div>
                        @endif

                        @if (count($tpGallery) > 0)
                        <div class="kl-transport__gallery">
                            @foreach ($tpGallery as $galImg)
                            <div class="kl-transport__gallery-item">
                                <img src="{{ url($galImg) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        @if (!empty($tp->quote_text))
                        <div class="kl-transport__quote">
                            <span class="kl-transport__quote-mark" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.2 18c-1.7 0-3-1.4-3-3.2 0-2.3 1.7-4.6 4.9-7l1.1 1.1C7.8 11 6.7 12.5 6.5 13.8c.4-.2.9-.3 1.4-.3 1.6 0 2.8 1.1 2.8 2.6S9 18 7.2 18zm9.5 0c-1.7 0-3-1.4-3-3.2 0-2.3 1.7-4.6 4.9-7l1.1 1.1c-2.4 2.1-3.5 3.6-3.7 4.9.4-.2.9-.3 1.4-.3 1.6 0 2.8 1.1 2.8 2.6S18.3 18 16.7 18z"/></svg>
                            </span>
                            <p class="kl-transport__quote-text">{{ $tp->quote_text }}</p>
                            @if (!empty($tp->quote_icon))
                            <span class="kl-transport__quote-icon" aria-hidden="true">
                                <img src="{{ url($tp->quote_icon) }}" alt="">
                            </span>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                <div class="kl-transport__leaves" aria-hidden="true">
                    <img src="/frontend/images/leaf.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="kl-partners" id="kl-about-partners" aria-labelledby="kl-partners-title">
        <div class="kl-partners__leaves kl-partners__leaves--tl" aria-hidden="true">
            <img src="/frontend/images/leaf.png" alt="">
        </div>
        <div class="kl-partners__leaves kl-partners__leaves--tr" aria-hidden="true">
            <img src="/frontend/images/leaf.png" alt="">
        </div>
        <div class="container">
            <div class="kl-partners__panel">
                <div class="kl-partners__header">
                    <div>
                        <h2 class="kl-partners__title" id="kl-partners-title">
                            Đối tác tiêu biểu
                            <span class="kl-partners__title-leaf" aria-hidden="true">
                                <img src="/frontend/images/leaf.png" alt="">
                            </span>
                        </h2>
                        <div class="kl-partners__divider" aria-hidden="true">
                            <span class="kl-partners__divider-diamond"></span>
                        </div>
                        <p class="kl-partners__desc">KỲ LINH FOOD tự hào là đối tác tin cậy của nhiều trường học, đơn vị giáo dục, tổ chức và doanh nghiệp. Chúng tôi cam kết mang đến những sản phẩm thực phẩm an toàn, chất lượng và dịch vụ chuyên nghiệp, góp phần nâng cao chất lượng bữa ăn và chăm sóc sức khỏe cộng đồng.</p>
                    </div>
                    <div class="kl-partners__brand">
                        @if ($partnerBrandLogo)
                        <div class="kl-partners__brand-logo">
                            <img src="{{ url($partnerBrandLogo) }}" alt="{{ $partnerBrandName }}">
                        </div>
                        @endif
                        <p class="kl-partners__brand-name">{{ strtoupper($partnerBrandName) }}</p>
                        <p class="kl-partners__brand-slogan">Chất lượng tạo niềm tin</p>
                        <div class="kl-partners__stars" aria-hidden="true">
                            <span class="kl-partners__stars-line"></span>
                            @for ($s = 0; $s < 3; $s++)
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.5l2.6 7.9h8.3l-6.7 4.9 2.6 7.9L12 18.3 5.2 23.2l2.6-7.9L1.1 10.4h8.3L12 2.5z"/></svg>
                            @endfor
                            <span class="kl-partners__stars-line"></span>
                        </div>
                    </div>
                </div>

                <div class="kl-partners__grid">
                    @foreach ($partnerList as $index => $item)
                    @if (!empty($item->link))
                    <a class="kl-partners__card" href="{{ $item->link }}" target="_blank" rel="noopener noreferrer" title="{{ $item->name }}">
                        <span class="kl-partners__no">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="kl-partners__logo">
                            @if (!empty($item->image))
                            <img src="{{ url($item->image) }}" alt="{{ $item->name }}">
                            @endif
                        </div>
                        <p class="kl-partners__name">{{ $item->name }}</p>
                    </a>
                    @else
                    <div class="kl-partners__card">
                        <span class="kl-partners__no">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="kl-partners__logo">
                            @if (!empty($item->image))
                            <img src="{{ url($item->image) }}" alt="{{ $item->name }}">
                            @endif
                        </div>
                        <p class="kl-partners__name">{{ $item->name }}</p>
                    </div>
                    @endif
                    @endforeach

                    <div class="kl-partners__card kl-partners__card--more">
                        <span class="kl-partners__no">{{ str_pad($partnerList->count() + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="kl-partners__logo">
                            <span class="kl-partners__more-icon" aria-hidden="true">
                                <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="28" cy="26" r="10" stroke="currentColor" stroke-width="3"/>
                                    <circle cx="52" cy="26" r="8" stroke="currentColor" stroke-width="3"/>
                                    <path d="M10 58c0-10 8-18 18-18s18 8 18 18" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                    <path d="M42 54c2-7 8-12 16-12 7 0 12 4 14 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                    <circle cx="40" cy="34" r="7" stroke="currentColor" stroke-width="3"/>
                                </svg>
                            </span>
                        </div>
                        <p class="kl-partners__name">Và nhiều đối tác khác...</p>
                    </div>
                </div>

                <div class="kl-partners__values">
                    <div class="kl-partners__value">
                        <span class="kl-partners__value-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3 4 6.5v5c0 5.2 3.4 9.1 8 10.5 4.6-1.4 8-5.3 8-10.5v-5L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m8.5 12 2.5 2.5L16 9.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span>Sản phẩm an toàn, nguồn gốc rõ ràng</span>
                    </div>
                    <div class="kl-partners__value">
                        <span class="kl-partners__value-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3 4 6.5v5c0 5.2 3.4 9.1 8 10.5 4.6-1.4 8-5.3 8-10.5v-5L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m8.5 12 2.5 2.5L16 9.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span>Chất lượng ổn định, đáp ứng tiêu chuẩn</span>
                    </div>
                    <div class="kl-partners__value">
                        <span class="kl-partners__value-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 7h11v8H3V7Z" stroke="currentColor" stroke-width="1.7"/><path d="M14 10h4l3 3v2h-7v-5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><circle cx="7" cy="17.5" r="1.6" stroke="currentColor" stroke-width="1.7"/><circle cx="17" cy="17.5" r="1.6" stroke="currentColor" stroke-width="1.7"/></svg>
                        </span>
                        <span>Giao hàng đúng hẹn, phục vụ tận tâm</span>
                    </div>
                    <div class="kl-partners__value">
                        <span class="kl-partners__value-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 11c0-2.2 1.8-4 4-4s4 1.8 4 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M4 14c1.5 2 3.5 3 8 3s6.5-1 8-3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M7 17c.8 1.5 2.5 2.5 5 2.5s4.2-1 5-2.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                        <span>Hợp tác bền vững, phát triển lâu dài</span>
                    </div>
                </div>

                <p class="kl-partners__footer">KỲ LINH FOOD | HỒ SƠ NĂNG LỰC</p>
            </div>
        </div>
        <div class="kl-partners__leaves kl-partners__leaves--br" aria-hidden="true">
            <img src="/frontend/images/leaf.png" alt="">
        </div>
    </section>
</div>
@endsection
