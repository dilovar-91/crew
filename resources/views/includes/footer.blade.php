<footer id="footer" class="footer_area">
        <div class="container">
            <div class="footer_widget pt-70 pb-120">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_about mt-50">
                            <div class="footer_logo">
                                <a href="#"><img src="/images/logo.png" alt=""></a>
                            </div>
                            <div class="footer_content">
                                <p>Lorem ipsum dolor sitco nsetetu nonumy eirmod tempor invidunt ut labore et dolore magna uyam erat, sed diam.</p>
                            </div>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer_link_wrapper d-flex flex-wrap">
                            <div class="footer_link mt-50">
                                <h2 class="footer_title">Quick Links</h2>
                                <ul class="link">
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">About</a></li>
                                </ul>
                            </div> <!-- footer link -->
                            <div class="footer_link mt-50">
                                <h2 class="footer_title">Resources</h2>
                                <ul class="link">
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Terms</a></li>
                                </ul>
                            </div> <!-- footer link -->
                        </div> <!-- footer link wrapper -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer_subscribe mt-50">
                            <h2 class="footer_title">Newsletter</h2>
                            <div class="subscribe_form text-right">
                                <form action="#">
                                    <input type="text" placeholder="Enter email">
                                    <button class="main-btn">Subscribe</button>
                                </form>
                            </div>
                        </div> <!-- footer subscribe -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer_copyright d-sm-flex justify-content-between">
                <div class="footer_social text-center">
                    <ul class="social">
                        <li><a href="https://facebook.com/crew" target="_blank"><i class="lni lni-facebook-filled"></i></a></li>
                        <li><a href="https://twitter.com/crew" target="_blank"><i class="lni lni-twitter-filled"></i></a></li>
                        <li><a href="https://instagram.com/crew" target="_blank"><i class="lni lni-instagram-original"></i></a></li>
                        <li><a href="#" target="_blank"><i class="lni lni-linkedin-original"></i></a></li>
                    </ul>
                </div> <!-- footer social -->
                <div class="footer_copyright_content  text-center">
                <ul class="navbar-nav ml-auto d-none d-md-block d-lg-none">
                        @php $locale = session()->get('locale'); @endphp
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @switch($locale)
                                @case('en')
                                <img src="{{asset('/images/en.png')}}" width="32px"> English
                                @break
                                @case('ru')
                                <img src="{{asset('/images/ru.png')}}" width="32px"> Русский
                                @break
                                @case('de')
                                <img src="{{asset('/images/de.png')}}" width="32px"> Deutsch
                                @break
                                @default
                                <img src="{{asset('/images/en.png')}}" width="30px"> English
                            @endswitch <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/lang/en"><img class="ml-1" src="{{asset('/images/us.png')}}"> English</a>
                                <a class="dropdown-item" href="/lang/ru"><img class="ml-1"  src="{{asset('/images/ru.png')}}"> Русский</a>
                                <a class="dropdown-item" href="/lang/de"><img class="ml-1"  src="{{asset('/images/de.png')}}"> Deutsch</a>
                            </div>
                        </li>
                    </ul>
                    <p>Copyright © <?=date('Y')?> {{trans('string.rights')}}. Crew LTD. </p>
                </div> <!-- footer copyright content -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
    </footer>