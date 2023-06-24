<footer tabindex="-1" id="SITE_FOOTER" class="my-5">
   <div class="container">
       <div class="row">
           {{-- <div class="col-md-3 offset-md-1 px-4 pb-4">
               <p class="fs-2 s-color">{{ __("pages/includes/footer.contact_info.title") }}</p>
               <hr class="line">
               <ul class="s2-color fs-5">
                @foreach (__("pages/includes/footer.contact_info.ul") as $li )
                    <li class="mb-4">
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

           </div> --}}
           <div class="col-md-4 offset-md-1 px-4 pb-4 footer-form">
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
           <div class="col-md-3">
                <h4 class="fs-2 s-color">San Jose del Cabo Hotels</h4>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li>Acre The House Hotel Transportation</li>
                        <li>Barcelo Grand Faro Transportation</li>
                        <li>Cabo Azul Transportation</li>
                        <li>Casa del Mar Transportation</li>
                        <li>Dreams Transportation</li>
                        <li>Grand Velas Transportation</li>
                        <li>JW Marriott Transportation</li>
                        <li>Hyatt Ziva Airport Transportation</li>
                        <li>One & Only Palmilla Transportation</li>
                        <li>Royal Solaris Transportation</li>
                    </ul>
                </nav>
                <h4 class="fs-2 s-color">Restaurants Transportation</h4>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li>Floras Farm Kitchen Transportation</li>
                        <li>Tamarindos Restaurant Transportation</li>
                        <li>Mango Deck Transportation</li>
                    </ul>
                </nav>
                <h4 class="fs-2 s-color">Foreign Transportation</h4>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li>Floras Farm Kitchen Transportation</li>
                        <li>Tamarindos Restaurant Transportation</li>
                        <li>Mango Deck Transportation</li>
                    </ul>
                </nav>
           </div>
           <div class="col-md-3">
                <h4 class="fs-2 s-color">Cabo San Lucas Hotels</h4>
                <hr class="line">
                <nav class="footer-nav">
                    <ul class="s2-color">
                        <li>Nobu Transportation</li>
                        <li>Diamante Transportation</li>
                        <li>Grand Solmar Transportation</li>
                        <li>Rancho San Lucas Transportation</li>
                        <li>ME Cabo Transportation</li>
                        <li>Montage Transportation</li>
                        <li>Pueblo Bonito Blanco Transportation</li>
                        <li>Pueblo Bonito Pacifica Transportation</li>
                        <li>Pueblo Bonito Rose Transportation</li>
                        <li>Pueblo Bonito Sunset Transportation</li>
                        <li>RIU Palace Cabo San Lucas Transportation</li>
                        <li>RIU Santa Fe Transportation</li>
                        <li>Sheraton Transportation</li>
                        <li>Solmar Hotel Transportation</li>
                        <li>The Cape Transportation</li>
                        <li>Villa del Arco Transportation</li>
                        <li>Villa del Palmar Transportation</li>
                        <li>Villa La Estancia Transportation</li>
                        <li>Breathless Transportation</li>
                        <li>Cachet Beach Cabo Villas Transportation</li>
                        <li>Fairfield Inn Transportation</li>
                    </ul>
                </nav>
           </div>
       </div>
   </div>
</footer>
