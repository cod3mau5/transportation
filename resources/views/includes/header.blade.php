<header id="main_header">
    <video id="vid" width="100%" loop autoplay muted>
        <source src="{{ asset('assets/videos/file.mp4') }}" type="video/mp4">
    </video>
    <div class="container top_header py-3">
        <div class="row">
            <div class="col-md-6 text-center">
                <a class="navbar-brand" :href="routes.home">
                    <img src="{{ asset('assets/images/cabo_driver.webp') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md">
                </a>
            </div>
            <div class="col-md-6 text-center">
                <div class="d-flex justify-content-center w-100 h-100 py-2">
                    <select class="align-middle align-self-center py-2 px-2" v-model="language" @change="changeLanguage">
                      <option value="1">eng</option>
                        <option value="0">es</option>
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
                <a class="nav-link text-white active" aria-current="page" :href="routes.home">@{{ text.header.home }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" :href="'/?language='+language+'&about_us=true'">@{{ text.header.about_us }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" :href="routes.gallery" tabindex="-1" aria-disabled="true">@{{ text.header.gallery }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" :href="routes.contact_us" tabindex="-1" aria-disabled="true">@{{ text.header.contact_us }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" :href="routes.book_now" tabindex="-1" aria-disabled="true">@{{ text.header.book_now }}</a>
              </li>
            </ul>
           
          </div>
        </div>
      </nav>
      
      <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MB56DT3"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
      
</header>