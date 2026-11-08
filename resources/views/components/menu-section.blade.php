@php
    $menuItems = __('menu.items');
    if (!is_array($menuItems)) {
        $menuItems = [];
    }
    $categories = __('menu.categories');
    if (!is_array($categories)) {
        $categories = [];
    }
@endphp

<section id="menu" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                    <h2>{{ __('menu.title') }}</h2>
                    <h4>{{ __('menu.subtitle') }}</h4>
                </div>
            </div>

            <!-- Category Filters -->
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 40px;">
                <div class="menu-filter-wrapper">
                    <button type="button" class="btn menu-filter-btn active" data-filter="all">
                        <i class="fa fa-cutlery"></i> {{ __('menu.filter_all') }}
                    </button>
                    @foreach($categories as $key => $name)
                        <button type="button" class="btn menu-filter-btn" data-filter="{{ $key }}">
                            {{ $name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Menu Items Grid -->
            <div class="col-md-12">
                <div class="row" id="menu-items-grid">
                    @foreach($menuItems as $index => $item)
                        <div class="col-md-6 col-sm-12 menu-card-item wow fadeInUp" 
                             data-category="{{ $item['category'] ?? '' }}" 
                             data-wow-delay="{{ 0.2 + (($index % 4) * 0.15) }}s">
                            <div class="media custom-menu-media">
                                <div class="media-object pull-left menu-img-wrap">
                                    <img src="{{ asset($item['image'] ?? 'images/gallery-img1.jpg') }}" 
                                         class="img-responsive img-rounded" 
                                         alt="{{ $item['name'] }}">
                                    <span class="menu-price">{{ $item['price'] }}</span>
                                </div>
                                <div class="media-body">
                                    <div class="menu-meta">
                                        <span class="menu-cat-label">{{ $item['category_name'] ?? '' }}</span>
                                        @if(!empty($item['badge']))
                                            <span class="menu-highlight-badge">
                                                <i class="fa fa-star"></i> {{ $item['badge'] }}
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="media-heading menu-item-title">{{ $item['name'] }}</h3>
                                    <p class="menu-item-desc">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.menu-filter-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 15px;
}

.menu-filter-btn {
    background: #ffffff;
    color: #444;
    border: 1px solid #ddd;
    border-radius: 30px;
    padding: 9px 22px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.04);
}

.menu-filter-btn:hover,
.menu-filter-btn:focus,
.menu-filter-btn.active {
    background: #c21500 !important;
    color: #ffffff !important;
    border-color: #c21500 !important;
    box-shadow: 0 4px 12px rgba(194, 21, 0, 0.3);
    transform: translateY(-2px);
    outline: none;
}

.custom-menu-media {
    background: #ffffff;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 25px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    border: 1px solid #f0f0f0;
    transition: all 0.3s ease;
}

.custom-menu-media:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    transform: translateY(-3px);
    border-color: #fce8e6;
}

.menu-img-wrap {
    position: relative;
    overflow: hidden;
    border-radius: 6px;
    margin-right: 18px;
}

.menu-img-wrap img {
    width: 140px;
    height: 120px;
    object-fit: cover;
    border-radius: 6px;
    transition: transform 0.4s ease;
}

.custom-menu-media:hover .menu-img-wrap img {
    transform: scale(1.05);
}

.custom-menu-media .menu-price {
    position: absolute;
    bottom: 8px;
    right: 8px;
    background: rgba(194, 21, 0, 0.95);
    color: #ffffff;
    font-weight: 700;
    font-size: 15px;
    padding: 3px 10px;
    border-radius: 14px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.menu-meta {
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.menu-cat-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #888;
}

.menu-highlight-badge {
    background: #fff4e5;
    color: #b76e00;
    font-size: 11px;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.menu-item-title {
    margin-top: 0;
    margin-bottom: 8px;
    font-size: 18px;
    font-weight: 600;
    color: #2b2b2b;
    transition: color 0.3s ease;
}

.custom-menu-media:hover .menu-item-title {
    color: #c21500;
}

.menu-item-desc {
    color: #6c757d;
    font-size: 13px;
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 767px) {
    .menu-img-wrap {
        width: 100%;
        margin-right: 0;
        margin-bottom: 12px;
    }
    .menu-img-wrap img {
        width: 100%;
        height: 180px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof jQuery !== 'undefined') {
        jQuery(function ($) {
            $('.menu-filter-btn').on('click', function () {
                $('.menu-filter-btn').removeClass('active');
                $(this).addClass('active');

                var filter = $(this).data('filter');
                if (filter === 'all') {
                    $('.menu-card-item').stop(true, true).fadeIn(300);
                } else {
                    $('.menu-card-item').stop(true, true).hide();
                    $('.menu-card-item[data-category="' + filter + '"]').fadeIn(300);
                }
            });
        });
    }
});
</script>
