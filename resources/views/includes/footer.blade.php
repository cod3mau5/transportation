<footer tabindex="-1" id="SITE_FOOTER" class="my-5">
   <div class="container">
       <div class="row">
           <div class="col-md-5 offset-md-1 px-4 pb-4">
               <p class="fs-2 s-color">Contactanos</p>
               <hr class="line">
               <ul class="s2-color fs-5">
                   <li class="mb-4">
                    Ask me what you want ... I'm here for any question you have.
                   </li>
                   <li class="mb-1">San José del Cabo, Baja California Sur, México.</li>
                   <li class="mb-1">Oficina 624-110-41-85</li>
                   <li class="mb-1">Móvil 624-161-15-48 / 624-157-80-43</li>
                   <li class="mb-4">info@cabodriver.com </li>
               </ul>

                <ul class="social-icons">
                    <li class="px-2 fs-3"><i class="fa fa-tripadvisor" aria-hidden="true"></i></li>
                    <li class="px-2 fs-3"><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li class="px-2 fs-3"><i class="fa fa-instagram" aria-hidden="true"></i></li>
                </ul>

           </div>
           <div class="col-md-5 px-4 pb-4 footer-form">
               <form action="{{ route('sendMail') }}">
                <div class="ps-md-5">
                    <p class="fs-2 s-color">Envianos un email</p>
                    <hr class="line">
                        <ul class="s2-color">
                             <li>
                                 <input class="form-control" type="email" name="email" placeholder="ingresa tu email aqui">
                             </li>
                             <li>
                                 <textarea class="form-control mt-2" name="msj" id="msj" cols="30" rows="6"></textarea>
                             </li>
                             <li>
                                 <button type="submit" class="btn book-btn text-white mt-1 float-right" style="color: #fff">Enviar</button>
                             </li>
                        </ul>
                </div>
               </form>
           </div>
       </div>
   </div>
</footer>