<!-- Footer -->
<footer class="text-center bg-black text-white footer">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4 social-icons">
            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f fa-2x"></i></a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram fa-2x"></i></a>

            <!-- Tik-Tok -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-tiktok fa-2x"></i></a>

            <!-- Linkedin -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in fa-2x"></i></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>{{__('mail.sign_up_newsletter')}}</strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="form5Example24" class="form-control text-white" />
                            <label class="form-label" for="form5Example24">{{__('mail.address')}}</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button data-mdb-ripple-init type="submit" class="btn btn-footer-custom text-black">
                            {{__('mail.subscribe')}}
                        </button>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 me-5 mb-4">
                        <!-- Content -->
                        <img src="{{ asset('storage/img/LogoNoBg3.png') }}" class="me-5" alt="Logo Olimpia Club House" width="350px">
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 me-5">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            {{Str::upper(__('general.our_courses'))}}
                        </h6>
                        <p>
                            <a href="#!">Angular</a>
                        </p>
                        <p>
                            <a href="#!">React</a>
                        </p>
                        <p>
                            <a href="#!">Vue</a>
                        </p>
                        <p>
                            <a href="#!">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            {{Str::upper(__('general.physiotherapy'))}}
                        </h6>
                        <p>
                            <a href="#!">Pricing</a>
                        </p>
                        <p>
                            <a href="#!">Settings</a>
                        </p>
                        <p>
                            <a href="#!">Orders</a>
                        </p>
                        <p>
                            <a href="#!">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">{{Str::upper(__('general.contacts_info'))}}</h6>
                        <p>
                            <i class="fas fa-home me-3 mt"></i><a href="https://www.google.com/maps/dir//Olimpia+Club+S.r.l.+Palestra+a+Molfetta,+Via+Gaetano+Salvemini,+86,+70056+Molfetta+BA/@41.198354,16.5982243,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x1347f9430f62acaf:0xf8a5116ca10e30de!2m2!1d16.6024819!2d41.197145?hl=it-IT&entry=ttu&g_ep=EgoyMDI2MDIxOC4wIKXMDSoASAFQAw%3D%3D" target="_blank">Via Gaetano Salvemini, 86, 70056 Molfetta BA</a>
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p>
                            <i class="fas fa-clock me-3"></i><a href="#!">{{__('general.opening_hours')}}</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2020 Copyright:
        <a class="text-reset fw-bold" href="{{route('homepage')}}">OlimpiaClub.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->