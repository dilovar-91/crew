<div class="header_navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="/images/logo.png" height="70px" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home"><i class="lni lni-home"></i> {{ __('menu.home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about"><i class="lni lni-ship"></i> {{ __('menu.for_sailors') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#services"><i class="lni lni-briefcase"></i> {{ __('menu.for_companies') }}</a>
                                    </li>
                                    @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                   

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            
                            <span class="btn btn-outline-primary"><i class="lni lni-user"></i> {{Auth::user()->name ?? 'User'}}</span>
                               
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                                <a href="/{{Auth::user()->role}}" class="dropdown-item d-flex align-items-center justify-content-between"><span>Profile</span> <span><span class="badge badge-pill badge-success">1</span> <i class="si si-user ml-1"></i></span></a>    
                            
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span>Log Out</span>
                                        <i class="si si-logout ml-1"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                
                            </div>
                        </li>  
                        
                    @else
                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('login') }}"><i class="lni lni-user"></i> {{ trans('string.sign_in')}}</a>
                        </li>   
                        
                    @endauth
                </div>
            @endif
                                   
                                    <!--<li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#blog">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>-->
                                </ul>

                                <ul class="navbar-nav ml-auto d-none d-lg-block">
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

                               

                    
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header navbar -->