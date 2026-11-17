<x-layouts.main
    :title="__('seo.titles.gallery')"
    :description="__('seo.descriptions.gallery')"
    ogImage="images/menu/ribeye-steak.jpg">

    @php
        $items = __('gallery.items');
        if (!is_array($items)) {
            $items = [];
        }

        $filters = [
            'all' => __('gallery.filter_all'),
            'steaks' => __('gallery.filter_steaks'),
            'starters' => __('gallery.filter_starters'),
            'desserts' => __('gallery.filter_desserts'),
            'interior' => __('gallery.filter_interior'),
        ];
    @endphp

    <!-- Gallery section -->
    <section id="gallery" class="parallax-section" style="padding-top: 100px; padding-bottom: 90px;">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                    <div class="wow fadeInUp section-title text-center" data-wow-delay="0.2s">
                        <h2>{{ __('gallery.title') }}</h2>
                        <h4>{{ __('gallery.subtitle') }}</h4>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-12">
                    <div class="iso-section wow fadeInUp" data-wow-delay="0.4s">

                        <ul class="filter-wrapper clearfix">
                            @foreach($filters as $key => $label)
                                <li>
                                    <a href="#"
                                       data-filter="{{ $key === 'all' ? '*' : '.' . $key }}"
                                       class="opc-main-bg {{ $loop->first ? 'selected' : '' }}">{{ $label }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="iso-box-section wow fadeInUp" data-wow-delay="0.6s">
                            <div class="iso-box-wrapper col4-iso-box">

                                @foreach($items as $item)
                                    <div class="iso-box {{ $item['category'] ?? '' }} col-md-4 col-sm-6">
                                        <div class="gallery-thumb">
                                            <a href="{{ asset($item['image']) }}"
                                               data-lightbox-gallery="food-gallery">
                                                <img src="{{ asset($item['image']) }}" class="fluid-img"
                                                     alt="{{ $item['title'] }}">
                                                <div class="gallery-overlay">
                                                    <div class="gallery-item">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <h3>{{ $item['title'] }}</h3>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.main>
