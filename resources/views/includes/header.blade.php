<header id="main_header">
    <video id="vid" width="100%" loop autoplay muted>
        <source src="{{ asset('assets/videos/file.mp4') }}" type="video/mp4">
    </video>
    <div class="container top_header py-3">
        <div class="row">
            <div class="col-md-6 text-center">
                <a class="navbar-brand" href="{{route('homepage')}}">
                    <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md">
                </a>
            </div>
            <div class="col-md-6 text-center">
                <div class="d-flex justify-content-center w-100 h-100 py-2">
                    <select class="align-middle align-self-center py-2 px-2"  @change="changeLanguage" v-model="lang">
                        <option value="es"@if ( app()->getLocale() == 'es') selected @endif>español</option>
                        <option value="en" @if ( app()->getLocale() == 'en') selected @endif>english</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="container-fluid justify-content-end">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto text-center mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white active" aria-current="page" href="{{route('homepage')}}">{{ __("pages/includes/header.menu.home") }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/#about-us">{{ __("pages/includes/header.menu.about_us") }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('gallery')}}" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.gallery") }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('contact-us')}}" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.contact_us") }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('book-now')}}" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.book_now") }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/blog" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.things_to_do") }}</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
</header>
