<x-layouts.main
    :title="__('seo.titles.about')"
    :description="__('seo.descriptions.about')"
    ogImage="images/about-img.jpg">

    <!-- About section -->
    <section id="about" class="parallax-section" style="padding-top: 100px; padding-bottom: 90px;">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                    <div class="wow fadeInUp section-title text-center" data-wow-delay="0.2s">
                        <h2>{{ __('about.title') }}</h2>
                        <h4>{{ __('about.subtitle') }}</h4>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="wow fadeInUp col-md-4 col-sm-5" data-wow-delay="0.3s">
                    <div class="about-image-wrapper">
                        <img src="{{ asset('images/about-img.jpg') }}" class="img-responsive img-rounded" alt="Steak House Story" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <div class="about-quote-box" style="margin-top: 20px; padding: 18px; background: #fff8f6; border-left: 4px solid #c21500; border-radius: 4px;">
                            <p style="font-style: italic; color: #555; margin: 0; font-size: 14px; line-height: 1.6;">
                                <i class="fa fa-quote-left text-danger" style="margin-right: 6px;"></i>
                                {{ __('about.history_quote') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="wow fadeInUp col-md-4 col-sm-7" data-wow-delay="0.5s">
                    <!-- flexslider -->
                    <div class="flexslider" style="margin-bottom: 25px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                        <ul class="slides">
                            <li>
                                <img src="{{ asset('images/slide-img1.jpg') }}" alt="Grill Craftsmanship">
                            </li>
                            <li>
                                <img src="{{ asset('images/slide-img2.jpg') }}" alt="Finest Ingredients">
                            </li>
                            <li>
                                <img src="{{ asset('images/slide-img3.jpg') }}" alt="Artisanal Dishes">
                            </li>
                        </ul>
                    </div>

                    <h3 style="font-size: 20px; font-weight: 700; margin-top: 0; margin-bottom: 12px; color: #2b2b2b;">
                        {{ __('about.story_title') }}
                    </h3>
                    <p style="color: #666; line-height: 1.7; margin-bottom: 15px;">
                        {{ __('about.story_paragraph_1') }}
                    </p>
                    <p style="color: #666; line-height: 1.7;">
                        {{ __('about.story_paragraph_2') }}
                    </p>
                </div>

                <div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="0.7s">
                    <div class="about-values-card" style="background: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #f0f0f0; box-shadow: 0 4px 20px rgba(0,0,0,0.04);">
                        <h2 style="font-size: 22px; font-weight: 700; margin-top: 0; margin-bottom: 20px; color: #c21500;">
                            <i class="fa fa-fire"></i> {{ __('about.title') }}
                        </h2>

                        <ul style="list-style: none; padding-left: 0; margin-bottom: 30px;">
                            <li style="margin-bottom: 15px; display: flex; align-items: flex-start; gap: 10px; color: #444; line-height: 1.5;">
                                <i class="fa fa-check-circle text-danger" style="font-size: 18px; margin-top: 2px;"></i>
                                <span>{{ __('about.feature_1') }}</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: flex-start; gap: 10px; color: #444; line-height: 1.5;">
                                <i class="fa fa-check-circle text-danger" style="font-size: 18px; margin-top: 2px;"></i>
                                <span>{{ __('about.feature_2') }}</span>
                            </li>
                            <li style="margin-bottom: 15px; display: flex; align-items: flex-start; gap: 10px; color: #444; line-height: 1.5;">
                                <i class="fa fa-check-circle text-danger" style="font-size: 18px; margin-top: 2px;"></i>
                                <span>{{ __('about.feature_3') }}</span>
                            </li>
                        </ul>

                        <div class="row text-center" style="border-top: 1px solid #eee; padding-top: 20px;">
                            <div class="col-xs-6" style="border-right: 1px solid #eee;">
                                <h3 style="color: #c21500; font-weight: 700; margin: 0; font-size: 28px;">35+</h3>
                                <p style="font-size: 11px; text-transform: uppercase; color: #888; margin-top: 4px; font-weight: 600;">{{ __('about.stats_years') }}</p>
                            </div>
                            <div class="col-xs-6">
                                <h3 style="color: #c21500; font-weight: 700; margin: 0; font-size: 28px;">50k+</h3>
                                <p style="font-size: 11px; text-transform: uppercase; color: #888; margin-top: 4px; font-weight: 600;">{{ __('about.stats_steaks') }}</p>
                            </div>
                        </div>

                        <div class="text-center" style="margin-top: 25px;">
                            <a href="{{ route('menu') }}" class="btn btn-danger btn-block" style="background: #c21500; border-radius: 25px; padding: 10px 20px; font-weight: 600; letter-spacing: 1px;">
                                <i class="fa fa-cutlery"></i> {{ __('navbar.menu') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.main>
