<x-layouts.main
    :title="__('seo.titles.contact')"
    :description="__('seo.descriptions.contact')"
    ogImage="images/contact-bg.jpg">

    @php
        $infoItems = [
            ['icon' => 'fa-map-marker', 'title' => __('contact.info_address_title'), 'value' => __('contact.info_address')],
            ['icon' => 'fa-phone', 'title' => __('contact.info_phone_title'), 'value' => __('contact.info_phone')],
            ['icon' => 'fa-clock-o', 'title' => __('contact.info_hours_title'), 'value' => __('contact.info_hours')],
            ['icon' => 'fa-envelope', 'title' => __('contact.info_email_title'), 'value' => __('contact.info_email')],
        ];
    @endphp

    <!-- Contact section -->
    <section id="contact" class="parallax-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                    <div class="wow fadeInUp section-title text-center" data-wow-delay="0.2s">
                        <h2>{{ __('contact.title') }}</h2>
                        <h4>{{ __('contact.subtitle') }}</h4>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-5 col-sm-12 wow fadeInUp" data-wow-delay="0.4s"
                     style="text-align: left; color: #f0f0f0; margin-bottom: 30px;">
                    @foreach($infoItems as $info)
                        <div style="display: flex; gap: 14px; margin-bottom: 22px;">
                            <div style="flex: 0 0 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: rgba(194, 21, 0, 0.9); border-radius: 50%; color: #ffffff; font-size: 18px;">
                                <i class="fa {{ $info['icon'] }}"></i>
                            </div>
                            <div>
                                <h4 style="color: #ffffff; margin: 0 0 4px; font-size: 15px; letter-spacing: 1px; text-transform: uppercase;">
                                    {{ $info['title'] }}
                                </h4>
                                <p style="color: #d6d6d6; margin: 0; font-size: 14px; line-height: 1.6;">
                                    {{ $info['value'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-7 col-sm-12 wow fadeInUp" data-wow-delay="0.6s"
                     style="text-align: left;">
                    <h3 style="color: #ffffff; margin-top: 0; margin-bottom: 20px; font-size: 20px;">
                        {{ __('contact.form_title') }}
                    </h3>

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

                    <div class="contact-form">
                        <form id="contact-form" method="post" action="{{ route('contact.submit') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <input name="name" type="text" class="form-control"
                                           placeholder="{{ __('contact.form_name') }} *"
                                           value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input name="email" type="email" class="form-control"
                                           placeholder="{{ __('contact.form_email') }} *"
                                           value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input name="phone" type="text" class="form-control"
                                           placeholder="{{ __('contact.form_phone') }}"
                                           value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <input name="date" type="text" class="form-control"
                                           placeholder="{{ __('contact.form_date') }}"
                                           value="{{ old('date') }}">
                                </div>
                                <div class="col-md-12">
                                    <input name="guests" type="number" min="1" class="form-control"
                                           placeholder="{{ __('contact.form_guests') }}"
                                           value="{{ old('guests') }}">
                                </div>
                            </div>

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
