<footer tabindex="-1" id="SITE_FOOTER" class="my-5">
   <div class="container">
       <div class="row">
           <div class="col-md-5 offset-md-1 px-4 pb-4">
               <p class="fs-2 s-color">@{{ text.footer.contact_info.title }}</p>
               <hr class="line">
               <ul class="s2-color fs-5">
                   <li class="mb-4" v-for="t in text.footer.contact_info.ul">
                       @{{ t.li }}
                   </li>

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
           <div class="col-md-5 px-4 pb-4 footer-form">
               <form action="{{ route('sendMail') }}" method="POST">
                @csrf
                <div class="ps-md-5">
                    <p class="fs-2 s-color">@{{ text.footer.send_mail.title }}</p>
                    <hr class="line">
                        <ul class="s2-color">
                             <li>
                                 <input class="form-control" type="email" name="email" :placeholder="text.footer.send_mail.email_placeholder">
                             </li>
                             <li>
                                 <textarea class="form-control mt-2" name="msj" id="msj" cols="30" rows="6"></textarea>
                             </li>
                             <li>
                                 <button type="submit" class="btn book-btn text-white mt-1 float-right" style="color: #fff">
                                    @{{ text.footer.send_mail.send_mail_btn }}
                                </button>
                             </li>
                        </ul>
                </div>
               </form>
           </div>
       </div>
   </div>
</footer>