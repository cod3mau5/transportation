<footer tabindex="-1" id="SITE_FOOTER" class="my-5">
   <div class="container">
       <div class="row">

           <div class="col-md-3">
                <h3 class="fs-2 s-color">San Jose del Cabo Hotels</h3>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li><a href="/hotel/Acre-The-House-Hotel">Acre The House Hotel Transportation</a></li>
                        <li><a href="/hotel/Barcelo-Grand-Faro-Los-Cabos">Barcelo Grand Faro Transportation</a></li>
                        <li><a href="/hotel/Cabo-Azul-Resort">Cabo Azul Transportation</a></li>
                        <li><a href="/hotel/Casa-del-Mar">Casa del Mar Transportation</a></li>
                        <li><a href="/hotel/Dreams">Dreams Transportation</a></li>
                        <li><a href="/hotel/Grand-Velas">Grand Velas Transportation</a></li>
                        <li><a href="/hotel/JW-Marriott">JW Marriott Transportation</a></li>
                        <li><a href="/hotel/Hyatt-Ziva">Hyatt Ziva Airport Transportation</a></li>
                        <li><a href="/hotel/One-&-Only-Palmilla">One & Only Palmilla Transportation</a></li>
                        <li><a href="/hotel/Royal-Solaris">Royal Solaris Transportation</a></li>
                    </ul>
                </nav>
                <h3 class="fs-2 s-color mt-3">Restaurants Transportation</h3>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li><a href="/restaurant/">Floras Farm Kitchen Transportation</a></li>
                        <li><a href="/restaurant/">Tamarindos Restaurant Transportation</a></li>
                        <li><a href="/restaurant/">Mango Deck Transportation</a></li>
                    </ul>
                </nav>
                <h3 class="fs-2 s-color mt-3">Foreign Transportation</h3>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li><a href="/foreign/">Cabo Pulmo Transportation</a></li>
                        <li><a href="/foreign/">Los Barriles Transportation</a></li>
                        <li><a href="/foreign/">Todos Santos Transportation</a></li>
                    </ul>
                </nav>
           </div>
           <div class="col-md-3">
                <h3 class="fs-2 s-color">Cabo San Lucas Hotels</h3>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li><a href="/hotel/Nobu">Nobu Transportation</a></li>
                        <li><a href="/hotel/Diamante">Diamante Transportation</a></li>
                        <li><a href="/hotel/Grand-Solmar">Grand Solmar Transportation</a></li>
                        <li><a href="/hotel/Rancho-San-Lucas">Rancho San Lucas Transportation</a></li>
                        <li><a href="/hotel/ME-Cabo-by-Melia">ME Cabo Transportation</a></li>
                        <li><a href="/hotel/Montage">Montage Transportation</a></li>
                        <li><a href="/hotel/Pueblo-Bonito-Blanco">Pueblo Bonito Blanco Transportation</a></li>
                        <li><a href="/hotel/Pueblo-Bonito-Pacifica">Pueblo Bonito Pacifica Transportation</a></li>
                        <li><a href="/hotel/Pueblo-Bonito-Rose">Pueblo Bonito Rose Transportation</a></li>
                        <li><a href="/hotel/Pueblo-Bonito-Sunset">Pueblo Bonito Sunset Transportation</a></li>
                        <li><a href="/hotel/RIU-Palace">RIU Palace Cabo San Lucas Transportation</a></li>
                        <li><a href="/hotel/RIU-Santa-Fe">RIU Santa Fe Transportation</a></li>
                        <li><a href="/hotel/Sheraton-Hacienda-del-Mar">Sheraton Hacienda del Mar Transportation</a></li>
                        <li><a href="/hotel/Solmar">Solmar Transportation</a></li>
                        <li><a href="/hotel/The-Cape">The Cape Transportation</a></li>
                        <li><a href="/hotel/Villa-del-Arco">Villa del Arco Transportation</a></li>
                        <li><a href="/hotel/Villa-del-Palmar">Villa del Palmar Transportation</a></li>
                        <li><a href="/hotel/Villa-La-Estancia">Villa La Estancia Transportation</a></li>
                        <li><a href="/hotel/Breathless-Cabo-San-Lucas">Breathless Transportation</a></li>
                        <li><a href="/hotel/Cabo-Villas-Beach-Resort">Cabo Villas Beach Resort Transportation</a></li>
                        <li><a href="/hotel/Fairfield-Inn">Fairfield Inn Transportation</a></li>
                    </ul>
                </nav>
           </div>

           <div class="col-md-4 offset-md-1 px-4 pb-4 mt-4 footer-form">

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('sendMail') }}" method="POST">
                            @csrf
                            <div class="ps-md-5">
                                <p class="fs-2 s-color">{{ __("pages/includes/footer.send_mail.title") }}</p>
                                <hr class="line">
                                    <ul class="s2-color">
                                        <li>
                                            <input class="form-control" type="email" name="email" placeholder="{{ __("pages/includes/footer.send_mail.email_placeholder") }}">
                                        </li>
                                        <li>
                                            <textarea class="form-control mt-2" name="msj" id="msj" cols="30" rows="6"></textarea>
                                        </li>
                                        <li>
                                            <button type="submit" class="btn book-btn text-white mt-1 float-right" style="color: #fff">
                                                {{ __("pages/includes/footer.send_mail.send_mail_btn") }}
                                            </button>
                                        </li>
                                    </ul>
                            </div>
                    </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 px-4 pb-4">
                        <p class="fs-2 s-color">{{ __("pages/includes/footer.contact_info.title") }}</p>
                        <hr class="line">
                        <ul class="s2-color fs-6">
                        @foreach (__("pages/includes/footer.contact_info.ul") as $li )
                            <li class="mb-2">
                                {{ $li["li"] }}
                            </li>
                        @endforeach
                        </ul>
                        <ul class="social-icons">
                            <li class="px-2 fs-3">
                                <a target="_BLANK" href="https://www.facebook.com/cabo.drivers.1">
                                    <i class="@if(Route::current()->getName() == 'book-now' ) mdi mdi-facebook @else fa fa-facebook @endif"
                                        aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="px-2 fs-3">
                                <a target="_BLANK" href="https://www.instagram.com/cabodriversservices/">
                                    <i class="@if(Route::current()->getName() == 'book-now' ) mdi mdi-instagram @else fa fa-instagram @endif"
                                        aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
       </div>
   </div>
</footer>
