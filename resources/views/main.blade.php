<x-layouts.main
    :title="__('seo.titles.home')"
    :description="__('seo.descriptions.home')"
    ogImage="images/menu/ribeye-steak.jpg">

    @php
        $galleryItems = __('gallery.items');
        if (!is_array($galleryItems)) {
            $galleryItems = [];
        }

        $galleryFilters = [
            'all' => __('gallery.filter_all'),
            'steaks' => __('gallery.filter_steaks'),
            'starters' => __('gallery.filter_starters'),
            'desserts' => __('gallery.filter_desserts'),
            'interior' => __('gallery.filter_interior'),
        ];

        $chefImages = ['images/chef1.jpg', 'images/chef2.jpg', 'images/chef3.jpg'];
        $chefs = [];
        for ($i = 1; $i <= 3; $i++) {
            $chefs[] = [
                'name' => __("team.chef_{$i}_name"),
                'role' => __("team.chef_{$i}_role"),
                'image' => $chefImages[$i - 1],
            ];
        }
    @endphp

<!-- Home section -->
<section id="home" class="parallax-section">
    <div class="gradient-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <h1 class="wow fadeInUp" data-wow-delay="0.6s">{{ __('navbar.brand') }}</h1>
                <p class="wow fadeInUp" data-wow-delay="1.0s">{{ __('main.hero_description') }}</p>
                <a href="#feature" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll"
                   data-wow-delay="1.3s">{{ __('main.hero_button') }}</a>
            </div>

        </div>
    </div>
</section>


<!-- Feature section -->
<section id="feature" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.6s">
                    <h2>{{ __('feature.title') }}</h2>
                    <h4>{{ __('feature.subtitle') }}</h4>
                </div>
            </div>

            <div class="clearfix"></div>

            @php
                $featureIcons = ['fa-cutlery', 'fa-fire', 'fa-star'];
            @endphp

            @for($i = 1; $i <= 3; $i++)
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.3 + (($i - 1) * 0.3) }}s">
                    <div class="feature-thumb">
                        <div class="feature-icon">
                            <span><i class="fa {{ $featureIcons[$i - 1] }}"></i></span>
                        </div>
                        <h3>{{ __("feature.item_{$i}_title") }}</h3>
                        <p>{{ __("feature.item_{$i}_desc") }}</p>
                    </div>
                </div>
            @endfor

        </div>
    </div>
</section>


<!-- About section -->
<section id="about" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2>{{ __('about.title') }}</h2>
                    <h4>{{ __('about.subtitle') }}</h4>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="wow fadeInUp col-md-3 col-sm-5" data-wow-delay="0.3s">
                <img src="{{ asset('images/about-img.jpg') }}" class="img-responsive" alt="{{ __('about.title') }}">
                <h3>{{ __('about.history_quote') }}</h3>
            </div>

            <div class="wow fadeInUp col-md-5 col-sm-7" data-wow-delay="0.5s">

                <!-- flexslider -->
                <div class="flexslider">
                    <ul class="slides">

                        <li>
                            <img src="{{ asset('images/slide-img1.jpg') }}" alt="{{ __('about.title') }}">
                        </li>
                        <li>
                            <img src="{{ asset('images/slide-img2.jpg') }}" alt="{{ __('about.title') }}">
                        </li>
                        <li>
                            <img src="{{ asset('images/slide-img3.jpg') }}" alt="{{ __('about.title') }}">
                        </li>

                    </ul>
                </div>

                <h3>{{ __('about.story_title') }}</h3>
                <p>{{ __('about.story_paragraph_1') }}</p>
                <p>{{ __('about.story_paragraph_2') }}</p>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="0.9s">
                <h2>{{ __('about.title') }}</h2>

                <ul>
                    <li>{{ __('about.feature_1') }}</li>
                    <li>{{ __('about.feature_2') }}</li>
                    <li>{{ __('about.feature_3') }}</li>
                </ul>

                <div class="row text-center" style="border-top: 1px solid #eee; margin-top: 20px; padding-top: 20px;">
                    <div class="col-xs-6" style="border-right: 1px solid #eee;">
                        <h3 style="color: #c21500; font-weight: 700; margin: 0; font-size: 28px;">35+</h3>
                        <p style="font-size: 11px; text-transform: uppercase; color: #888; margin-top: 4px; font-weight: 600;">{{ __('about.stats_years') }}</p>
                    </div>
                    <div class="col-xs-6">
                        <h3 style="color: #c21500; font-weight: 700; margin: 0; font-size: 28px;">50k+</h3>
                        <p style="font-size: 11px; text-transform: uppercase; color: #888; margin-top: 4px; font-weight: 600;">{{ __('about.stats_steaks') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Video section -->
<section id="video" class="parallax-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=j-_7Ub-Zkow"><i
                        class="fa fa-play"></i></a>
                <h2 class="wow fadeInUp" data-wow-delay="0.5s">{{ __('main.video_title') }}</h2>
                <p class="wow fadeInUp" data-wow-delay="0.8s">{{ __('main.video_description') }}</p>
            </div>

        </div>
    </div>
</section>

<!-- Menu section -->
<x-menu-section />

<!-- Team section -->
<section id="team" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2>{{ __('team.title') }}</h2>
                    <h4>{{ __('team.subtitle') }}</h4>
                </div>
            </div>

            <div class="clearfix"></div>

            @foreach($chefs as $chef)
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.4 + ($loop->index * 0.2) }}s">
                    <div class="team-thumb">
                        <img src="{{ asset($chef['image']) }}" class="img-responsive" alt="{{ $chef['name'] }}">
                        <div class="team-des">
                            <h3>{{ $chef['name'] }}</h3>
                            <h4>{{ $chef['role'] }}</h4>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="1.0s">
                <div class="join-team">
                    <i class="fa fa-plus"></i>
                    <p>{{ __('main.join_text') }}</p>
                    <a href="{{ route('contact') }}" class="btn btn-default hvr-bounce-to-bottom">{{ __('main.join_button') }}</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.3s">
                <h2>{{ __('main.taste_title') }}</h2>
                <p>{{ __('main.taste_text') }}</p>
            </div>

            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
                <h2>{{ __('main.service_title') }}</h2>
                <p>{{ __('main.service_text') }}</p>
            </div>

        </div>
    </div>
</section>

<!-- Gallery section -->
<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                    <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                        <h2>{{ __('gallery.title') }}</h2>
                        <h4>{{ __('gallery.subtitle') }}</h4>
                    </div>
                </div>

                <!-- iso section -->
                <div class="iso-section wow fadeInUp" data-wow-delay="0.6s">

                    <ul class="filter-wrapper clearfix">
                        @foreach($galleryFilters as $key => $label)
                            <li>
                                <a href="#"
                                   data-filter="{{ $key === 'all' ? '*' : '.' . $key }}"
                                   class="opc-main-bg {{ $loop->first ? 'selected' : '' }}">{{ $label }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- iso box section -->
                    <div class="iso-box-section wow fadeInUp" data-wow-delay="0.9s">
                        <div class="iso-box-wrapper col4-iso-box">

                            @foreach($galleryItems as $item)
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

<!-- Contact section -->
<section id="contact" class="parallax-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2>{{ __('contact.title') }}</h2>
                    <h4>{{ __('contact.subtitle') }}</h4>
                </div>

                <div class="contact-form wow fadeInUp" data-wow-delay="0.7s">
                    @if(session('success'))
                        <div class="alert alert-success" style="text-align: left;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" style="text-align: left;">
                            <ul style="margin: 0; padding-left: 18px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="contact-form" method="post" action="{{ route('contact.submit') }}">
                        @csrf
                        <input name="name" type="text" class="form-control"
                               placeholder="{{ __('contact.form_name') }} *"
                               value="{{ old('name') }}" required>
                        <input name="email" type="email" class="form-control"
                               placeholder="{{ __('contact.form_email') }} *"
                               value="{{ old('email') }}" required>
                        <input name="phone" type="text" class="form-control"
                               placeholder="{{ __('contact.form_phone') }}"
                               value="{{ old('phone') }}">
                        <input name="date" type="text" class="form-control"
                               placeholder="{{ __('contact.form_date') }}"
                               value="{{ old('date') }}">
                        <input name="guests" type="number" min="1" class="form-control"
                               placeholder="{{ __('contact.form_guests') }}"
                               value="{{ old('guests') }}">
                        <textarea name="message" class="form-control"
                                  placeholder="{{ __('contact.form_message') }} *"
                                  rows="5" required>{{ old('message') }}</textarea>
                        <input type="submit" class="form-control submit"
                               value="{{ __('contact.form_submit') }}">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

</x-layouts.main>
