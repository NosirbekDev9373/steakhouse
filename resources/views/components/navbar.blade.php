<!-- Navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Steak House</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/" class="smoothScroll">Bosh sahifa</a></li>
                <li><a href="{{ route('feature') }}" class="smoothScroll">Xususiyatlari</a></li>
                <li><a href="{{ route('about') }}" class="smoothScroll">Biz haqimizda</a></li>
                <li><a href="{{ route('menu') }}" class="smoothScroll">Menu</a></li>
                <li><a href="{{ route('team') }}" class="smoothScroll">Jamoa</a></li>
                <li><a href="{{ route('gallery') }}" class="smoothScroll">Galereya</a></li>
                <li><a href="{{ route('contact') }}" class="smoothScroll">Aloqa</a></li>
            </ul>
        </div>

    </div>
</div>
