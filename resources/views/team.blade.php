<x-layouts.main
    :title="__('seo.titles.team')"
    :description="__('seo.descriptions.team')"
    ogImage="images/chef1.jpg">

    @php
        $chefImages = [
            'images/chef1.jpg',
            'images/chef2.jpg',
            'images/chef3.jpg',
            'images/chef1.jpg',
        ];

        $chefs = [];
        for ($i = 1; $i <= 4; $i++) {
            $chefs[] = [
                'name' => __("team.chef_{$i}_name"),
                'role' => __("team.chef_{$i}_role"),
                'bio' => __("team.chef_{$i}_bio"),
                'image' => $chefImages[$i - 1] ?? 'images/chef1.jpg',
            ];
        }
    @endphp

    <!-- Team section -->
    <section id="team" class="parallax-section" style="padding-top: 100px; padding-bottom: 90px;">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                    <div class="wow fadeInUp section-title text-center" data-wow-delay="0.2s">
                        <h2>{{ __('team.title') }}</h2>
                        <h4>{{ __('team.subtitle') }}</h4>
                    </div>
                </div>

                <div class="clearfix"></div>

                @foreach($chefs as $chef)
                    <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.3 + ($loop->index * 0.2) }}s">
                        <div class="team-thumb">
                            <img src="{{ asset($chef['image']) }}" class="img-responsive" alt="{{ $chef['name'] }}">
                            <div class="team-des">
                                <h3>{{ $chef['name'] }}</h3>
                                <h4>{{ $chef['role'] }}</h4>
                                <p style="font-size: 13px; line-height: 1.5; padding: 0 12px;">{{ $chef['bio'] }}</p>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

</x-layouts.main>
