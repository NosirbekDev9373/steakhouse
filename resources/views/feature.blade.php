<x-layouts.main
    :title="__('seo.titles.feature')"
    :description="__('seo.descriptions.feature')">

    <!-- Feature section -->
    <section id="feature" class="parallax-section" style="padding-top: 100px; padding-bottom: 90px;">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                    <div class="wow fadeInUp section-title text-center" data-wow-delay="0.2s">
                        <h2>{{ __('feature.title') }}</h2>
                        <h4>{{ __('feature.subtitle') }}</h4>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Feature 1 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-thumb custom-feature-card">
                        <div class="feature-icon">
                            <span><i class="fa fa-fire"></i></span>
                        </div>
                        <h3>{{ __('feature.item_1_title') }}</h3>
                        <p>{{ __('feature.item_1_desc') }}</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-thumb custom-feature-card">
                        <div class="feature-icon">
                            <span><i class="fa fa-cutlery"></i></span>
                        </div>
                        <h3>{{ __('feature.item_2_title') }}</h3>
                        <p>{{ __('feature.item_2_desc') }}</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-thumb custom-feature-card">
                        <div class="feature-icon">
                            <span><i class="fa fa-star"></i></span>
                        </div>
                        <h3>{{ __('feature.item_3_title') }}</h3>
                        <p>{{ __('feature.item_3_desc') }}</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-thumb custom-feature-card">
                        <div class="feature-icon">
                            <span><i class="fa fa-diamond"></i></span>
                        </div>
                        <h3>{{ __('feature.item_4_title') }}</h3>
                        <p>{{ __('feature.item_4_desc') }}</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="feature-thumb custom-feature-card">
                        <div class="feature-icon">
                            <span><i class="fa fa-users"></i></span>
                        </div>
                        <h3>{{ __('feature.item_5_title') }}</h3>
                        <p>{{ __('feature.item_5_desc') }}</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-thumb custom-feature-card">
                        <div class="feature-icon">
                            <span><i class="fa fa-glass"></i></span>
                        </div>
                        <h3>{{ __('feature.item_6_title') }}</h3>
                        <p>{{ __('feature.item_6_desc') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
    .custom-feature-card {
        background: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 8px;
        padding: 30px 20px;
        margin-bottom: 30px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        min-height: 250px;
    }
    .custom-feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border-color: #fce8e6;
    }
    .custom-feature-card .feature-icon span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: #fbf0ee;
        color: #c21500;
        border-radius: 50%;
        font-size: 24px;
        margin-bottom: 18px;
        transition: all 0.3s ease;
    }
    .custom-feature-card:hover .feature-icon span {
        background: #c21500;
        color: #ffffff;
        transform: scale(1.1);
    }
    .custom-feature-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: #2b2b2b;
        margin-bottom: 12px;
        transition: color 0.3s ease;
    }
    .custom-feature-card:hover h3 {
        color: #c21500;
    }
    .custom-feature-card p {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
    }
    </style>

</x-layouts.main>
