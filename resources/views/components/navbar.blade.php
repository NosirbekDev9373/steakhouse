<!-- Navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">{{ __('navbar.brand') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="/" class="smoothScroll">{{ __('navbar.home') }}</a>
                </li>
                <li class="{{ request()->routeIs('feature') ? 'active' : '' }}">
                    <a href="{{ route('feature') }}" class="smoothScroll">{{ __('navbar.features') }}</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="smoothScroll">{{ __('navbar.about') }}</a>
                </li>
                <li class="{{ request()->routeIs('menu') ? 'active' : '' }}">
                    <a href="{{ route('menu') }}" class="smoothScroll">{{ __('navbar.menu') }}</a>
                </li>
                <li class="{{ request()->routeIs('team') ? 'active' : '' }}">
                    <a href="{{ route('team') }}" class="smoothScroll">{{ __('navbar.team') }}</a>
                </li>
                <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                    <a href="{{ route('gallery') }}" class="smoothScroll">{{ __('navbar.gallery') }}</a>
                </li>
                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}" class="smoothScroll">{{ __('navbar.contact') }}</a>
                </li>

                <!-- Language Switcher -->
                <li class="dropdown lang-switcher-li">
                    <a href="#" class="dropdown-toggle lang-btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="lang-flag">{{ app()->getLocale() == 'uz' ? '🇺🇿' : '🇬🇧' }}</span>
                        <span class="lang-code">{{ strtoupper(app()->getLocale()) }}</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu lang-dropdown-menu">
                        <li class="{{ app()->getLocale() == 'uz' ? 'active-lang' : '' }}">
                            <a href="{{ route('lang.switch', 'uz') }}">
                                <span class="flag-icon">🇺🇿</span> {{ __('navbar.uzbek') }}
                                @if(app()->getLocale() == 'uz')
                                    <i class="fa fa-check pull-right text-danger"></i>
                                @endif
                            </a>
                        </li>
                        <li class="{{ app()->getLocale() == 'en' ? 'active-lang' : '' }}">
                            <a href="{{ route('lang.switch', 'en') }}">
                                <span class="flag-icon">🇬🇧</span> {{ __('navbar.english') }}
                                @if(app()->getLocale() == 'en')
                                    <i class="fa fa-check pull-right text-danger"></i>
                                @endif
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>

<style>
.lang-switcher-li .lang-btn {
    display: inline-flex !important;
    align-items: center;
    gap: 6px;
    font-weight: 600 !important;
    font-size: 15px !important;
    padding: 10px 14px !important;
    margin-top: 15px;
    border-radius: 20px;
    background: #f7f7f7;
    border: 1px solid #e5e5e5;
    line-height: 1 !important;
}

.lang-switcher-li .lang-btn:hover,
.lang-switcher-li.open .lang-btn {
    background: #c21500 !important;
    color: #ffffff !important;
    border-color: #c21500 !important;
}

.lang-dropdown-menu {
    min-width: 150px;
    border-radius: 8px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    border: 1px solid #f0f0f0;
    padding: 6px 0;
    margin-top: 5px;
}

.lang-dropdown-menu li a {
    font-size: 14px !important;
    line-height: 28px !important;
    padding: 6px 16px !important;
    color: #444 !important;
    display: flex !important;
    align-items: center;
    justify-content: space-between;
}

.lang-dropdown-menu li a:hover,
.lang-dropdown-menu li.active-lang a {
    background: #fdf2f0 !important;
    color: #c21500 !important;
    font-weight: 600;
}

.flag-icon {
    margin-right: 6px;
    font-size: 16px;
}

@media (max-width: 767px) {
    .lang-switcher-li .lang-btn {
        margin-top: 5px;
        margin-bottom: 10px;
        display: inline-block !important;
    }
}
</style>
