@php
    $menuItems = __('menu.items');
    if (!is_array($menuItems)) {
        $menuItems = [];
    }
    $categories = __('menu.categories');
    if (!is_array($categories)) {
        $categories = [];
    }
    $categoryIcons = [
        'steaks' => 'fa-fire',
        'starters' => 'fa-leaf',
        'soups' => 'fa-tint',
        'sides' => 'fa-cutlery',
        'desserts' => 'fa-birthday-cake',
        'drinks' => 'fa-glass',
    ];

    // Pagination configuration
    $perPage = 6;
    $selectedCategory = request()->query('category', 'all');
    $currentPage = max(1, (int) request()->query('page', 1));

    // Filter items for initial server-side render
    $matchingItems = array_values(array_filter($menuItems, function ($item) use ($selectedCategory) {
        if ($selectedCategory === 'all') {
            return true;
        }
        return ($item['category'] ?? '') === $selectedCategory;
    }));

    $totalMatching = count($matchingItems);
    $totalPages = max(1, (int) ceil($totalMatching / $perPage));
    if ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }

    $fromItem = $totalMatching > 0 ? (($currentPage - 1) * $perPage) + 1 : 0;
    $toItem = min($currentPage * $perPage, $totalMatching);

    // Initial page item IDs for server-side visibility
    $initialPageItemIds = array_column(
        array_slice($matchingItems, ($currentPage - 1) * $perPage, $perPage),
        'id'
    );
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
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 30px;">
                <div class="menu-filter-wrapper">
                    <button type="button" 
                            class="btn menu-filter-btn {{ $selectedCategory === 'all' ? 'active' : '' }}" 
                            data-filter="all">
                        <i class="fa fa-cutlery"></i> {{ __('menu.filter_all') }}
                    </button>
                    @foreach($categories as $key => $name)
                        <button type="button" 
                                class="btn menu-filter-btn {{ $selectedCategory === $key ? 'active' : '' }}" 
                                data-filter="{{ $key }}">
                            @if(isset($categoryIcons[$key]))
                                <i class="fa {{ $categoryIcons[$key] }}"></i>
                            @endif
                            {{ $name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Menu Items Grid -->
            <div class="col-md-12">
                <div class="row" id="menu-items-grid">
                    @foreach($menuItems as $index => $item)
                        @php
                            $isInitiallyVisible = in_array($item['id'] ?? null, $initialPageItemIds, true);
                        @endphp
                        <div class="col-md-6 col-sm-12 menu-card-item wow fadeInUp" 
                             data-id="{{ $item['id'] ?? $index }}"
                             data-category="{{ $item['category'] ?? '' }}" 
                             data-wow-delay="{{ 0.2 + (($index % 4) * 0.15) }}s"
                             style="{{ $isInitiallyVisible ? '' : 'display: none;' }}">
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

            <!-- Menu Pagination Section -->
            <div class="col-md-12 text-center menu-pagination-wrapper wow fadeInUp" data-wow-delay="0.3s">
                <div class="menu-pagination-summary">
                    <span id="menu-pagination-info">
                        {{ __('menu.pagination_showing', ['from' => $fromItem, 'to' => $toItem, 'total' => $totalMatching]) }}
                    </span>
                </div>

                <div class="menu-pagination-controls" id="menu-pagination-controls">
                    <ul class="menu-pagination-list">
                        <!-- Previous Page -->
                        <li class="menu-page-nav menu-page-prev {{ $currentPage <= 1 ? 'disabled' : '' }}">
                            <a href="{{ request()->fullUrlWithQuery(['category' => $selectedCategory, 'page' => max(1, $currentPage - 1)]) }}#menu" 
                               data-page="{{ max(1, $currentPage - 1) }}"
                               aria-label="{{ __('menu.pagination_prev') }}">
                                <i class="fa fa-angle-left"></i> {{ __('menu.pagination_prev') }}
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        @for($p = 1; $p <= $totalPages; $p++)
                            <li class="menu-page-item {{ $p === $currentPage ? 'active' : '' }}">
                                <a href="{{ request()->fullUrlWithQuery(['category' => $selectedCategory, 'page' => $p]) }}#menu" 
                                   data-page="{{ $p }}">
                                    {{ $p }}
                                </a>
                            </li>
                        @endfor

                        <!-- Next Page -->
                        <li class="menu-page-nav menu-page-next {{ $currentPage >= $totalPages ? 'disabled' : '' }}">
                            <a href="{{ request()->fullUrlWithQuery(['category' => $selectedCategory, 'page' => min($totalPages, $currentPage + 1)]) }}#menu" 
                               data-page="{{ min($totalPages, $currentPage + 1) }}"
                               aria-label="{{ __('menu.pagination_next') }}">
                                {{ __('menu.pagination_next') }} <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
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
    min-height: 152px;
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

/* Pagination Styling */
.menu-pagination-wrapper {
    margin-top: 15px;
    margin-bottom: 30px;
}

.menu-pagination-summary {
    margin-bottom: 15px;
    color: #777;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.menu-pagination-list {
    display: inline-flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 6px;
    padding: 0;
    margin: 0;
    list-style: none;
}

.menu-pagination-list li a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    color: #333333;
    border: 1px solid #ddd;
    border-radius: 20px;
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
    cursor: pointer;
}

.menu-pagination-list li.menu-page-item a {
    min-width: 40px;
    padding: 8px 12px;
}

.menu-pagination-list li a:hover {
    background: #fbf0ee;
    color: #c21500;
    border-color: #f4b3aa;
}

.menu-pagination-list li.active a {
    background: #c21500 !important;
    color: #ffffff !important;
    border-color: #c21500 !important;
    box-shadow: 0 4px 10px rgba(194, 21, 0, 0.3);
    transform: translateY(-1px);
}

.menu-pagination-list li.disabled a {
    color: #bbb !important;
    background: #f7f7f7 !important;
    border-color: #eee !important;
    cursor: not-allowed;
    box-shadow: none;
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
    .custom-menu-media {
        min-height: auto;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof jQuery === 'undefined') {
        return;
    }

    jQuery(function ($) {
        var perPage = 6;
        var currentCategory = '{{ $selectedCategory }}' || 'all';
        var currentPage = parseInt('{{ $currentPage }}', 10) || 1;

        var showingTemplate = @json(__('menu.pagination_showing'));
        var prevText = @json(__('menu.pagination_prev'));
        var nextText = @json(__('menu.pagination_next'));

        function formatShowingText(from, to, total) {
            return showingTemplate
                .replace(':from', from)
                .replace(':to', to)
                .replace(':total', total);
        }

        function updateMenu(category, page, pushHistory) {
            currentCategory = category;
            currentPage = page;

            // Find matching items
            var $allItems = $('.menu-card-item');
            var $matchingItems = (category === 'all')
                ? $allItems
                : $allItems.filter('[data-category="' + category + '"]');

            var totalMatching = $matchingItems.length;
            var totalPages = Math.max(1, Math.ceil(totalMatching / perPage));

            if (currentPage > totalPages) {
                currentPage = 1;
            }

            var startIndex = (currentPage - 1) * perPage;
            var endIndex = startIndex + perPage;

            // Hide non-matching items and show sliced matching items
            $allItems.not($matchingItems).hide();
            $matchingItems.each(function (idx) {
                if (idx >= startIndex && idx < endIndex) {
                    $(this).stop(true, true).fadeIn(300);
                } else {
                    $(this).hide();
                }
            });

            // Update info text
            var from = totalMatching > 0 ? (startIndex + 1) : 0;
            var to = Math.min(endIndex, totalMatching);
            $('#menu-pagination-info').text(formatShowingText(from, to, totalMatching));

            // Rebuild pagination controls
            var $paginationList = $('.menu-pagination-list');
            $paginationList.empty();

            if (totalPages > 1) {
                $('.menu-pagination-wrapper').show();

                // Prev button
                var prevDisabledClass = (currentPage <= 1) ? 'disabled' : '';
                var $prevLi = $('<li>', { class: 'menu-page-nav menu-page-prev ' + prevDisabledClass });
                var $prevA = $('<a>', {
                    href: '?category=' + encodeURIComponent(currentCategory) + '&page=' + Math.max(1, currentPage - 1) + '#menu',
                    'data-page': Math.max(1, currentPage - 1),
                    html: '<i class="fa fa-angle-left"></i> ' + prevText
                });
                $prevLi.append($prevA);
                $paginationList.append($prevLi);

                // Number buttons
                for (var p = 1; p <= totalPages; p++) {
                    var activeClass = (p === currentPage) ? 'active' : '';
                    var $pageLi = $('<li>', { class: 'menu-page-item ' + activeClass });
                    var $pageA = $('<a>', {
                        href: '?category=' + encodeURIComponent(currentCategory) + '&page=' + p + '#menu',
                        'data-page': p,
                        text: p
                    });
                    $pageLi.append($pageA);
                    $paginationList.append($pageLi);
                }

                // Next button
                var nextDisabledClass = (currentPage >= totalPages) ? 'disabled' : '';
                var $nextLi = $('<li>', { class: 'menu-page-nav menu-page-next ' + nextDisabledClass });
                var $nextA = $('<a>', {
                    href: '?category=' + encodeURIComponent(currentCategory) + '&page=' + Math.min(totalPages, currentPage + 1) + '#menu',
                    'data-page': Math.min(totalPages, currentPage + 1),
                    html: nextText + ' <i class="fa fa-angle-right"></i>'
                });
                $nextLi.append($nextA);
                $paginationList.append($nextLi);
            } else {
                // If only 1 page, hide pagination buttons but keep summary
                $paginationList.empty();
            }

            // Update category buttons active state
            $('.menu-filter-btn').removeClass('active');
            $('.menu-filter-btn[data-filter="' + currentCategory + '"]').addClass('active');

            // Update URL without page refresh
            if (pushHistory && window.history && window.history.pushState) {
                var newUrl = window.location.pathname + '?category=' + encodeURIComponent(currentCategory) + '&page=' + currentPage + '#menu';
                window.history.pushState({ category: currentCategory, page: currentPage }, '', newUrl);
            }
        }

        // Category button click
        $(document).on('click', '.menu-filter-btn', function (e) {
            e.preventDefault();
            var filter = $(this).data('filter');
            updateMenu(filter, 1, true);
        });

        // Pagination link click
        $(document).on('click', '.menu-pagination-list a', function (e) {
            e.preventDefault();
            var $parentLi = $(this).parent();
            if ($parentLi.hasClass('disabled') || $parentLi.hasClass('active')) {
                return;
            }

            var targetPage = parseInt($(this).data('page'), 10);
            if (!isNaN(targetPage)) {
                updateMenu(currentCategory, targetPage, true);

                // Smooth scroll to top of menu
                var $menu = $('#menu');
                if ($menu.length) {
                    $('html, body').animate({
                        scrollTop: $menu.offset().top - 80
                    }, 400);
                }
            }
        });

        // Handle browser Back / Forward buttons
        window.addEventListener('popstate', function (e) {
            if (e.state) {
                updateMenu(e.state.category || 'all', e.state.page || 1, false);
            }
        });
    });
});
</script>
