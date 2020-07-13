<!DOCTYPE html>
<html data-wf-page="5dff97a6323c6a2416dc9c87" data-wf-site="5dff97a6323c6a6f2bdc9bde">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{  asset('css/main.css') }}">
    <meta content="Startup Template - Webflow Responsive Website Template" name="description">
    <meta content="Home (Business)" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Source Sans Pro:200,300,regular,italic,600,700,900"]  }});</script>
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>

    <link href="{{asset('images/5dff97a6323c6a818edc9c1e_Favicon.png')}}" rel="shortcut icon" type="image/x-icon">
    <link href="{{asset('images/5dff97a6323c6a091bdc9c5d_Webclip.png')}}" rel="apple-touch-icon">
</head>
<body>
<div data-ix="hide-popup" class="sign-up-popup">
    <div class="popup-block"><a href="#" data-ix="close-sign-up-popup" class="popup-close-button w-inline-block"><img src="{{asset('images/5dff97a6323c6a1312dc9c5c_Icon-close.png')}}" alt="" class="close-icon"></a>
        <div class="popup-sign-up-form w-form">
            <form id="wf-form-Sign-Up-Form-Popup" name="wf-form-Sign-Up-Form-Popup" data-name="Sign Up Form (Popup)">
                <div class="popup-title">Sign up for a free account!</div>
                <div class="w-row">
                    <div class="fields-column-left w-col w-col-6"><input type="text" id="First-Name-3" name="First-Name" data-name="First Name" maxlength="256" required="" placeholder="First Name" class="dark-field w-input"></div>
                    <div class="fields-column-right w-col w-col-6"><input type="text" id="Last-Name-3" name="Last-Name" data-name="Last Name" maxlength="256" placeholder="Last Name" class="dark-field w-input"></div>
                </div>
                <input type="email" id="Email-3" name="Email" data-name="Email" maxlength="256" required="" placeholder="Email address" class="dark-field w-input"><input type="text" id="Telephone-3" name="Telephone-3" data-name="Telephone 3" maxlength="256" required="" placeholder="Telephone number" class="dark-field w-input">
                <p class="sign-up-bottom-text">Signing up for our services means you agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>.</p><input type="submit" value="Get Started Now" data-wait="Please wait..." class="button w-button"></form>
            <div class="success-message w-form-done">
                <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="error-bg w-form-fail">
                <p>Oops! Something went wrong while submitting the form</p>
            </div>
        </div>
    </div>
</div>
<div data-collapse="medium" data-animation="default" data-duration="400" data-no-scroll="1" class="navbar w-nav">
    <div class="container-2 w-container"><a href="/" class="logo-block w-nav-brand w--current"><img src="{{asset('images/5e0fd4664b55b08aeb293a0d_logo.png')}}" alt="" class="logo">
            <div>CrewMSG</div>
        </a>
        <nav role="navigation" class="nav-menu w-nav-menu"><a href="/" class="nav-link light w-nav-link w--current">Home</a><a href="{{route('sailors')}}" class="nav-link light w-nav-link">for sailors</a><a href="{{route('companies')}}" class="nav-link light w-nav-link">for companies</a>
            @if (!Auth::check())
                <a href="{{route('login')}}" class="nav-link with-color-copy w-nav-link">LOG IN</a><a href="{{route('register')}}" class="nav-link with-color w-nav-link">SIGN UP</a>
            @else
                <a href="/{{Auth::user()->role}}" class="nav-link with-color w-nav-link">{{Auth::user()->name }}({{Auth::user()->role}})</a><a class="nav-link with-color-copy w-nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span>Log Out</span>
                                        <i class="si si-logout ml-1"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            @endif
            <div data-delay="0" class="dropdown w-dropdown">
                <div class="nav-link dropdown-toggle light-flag w-dropdown-toggle">
                @if(Config::get('app.locale') == 'en')
                <img src="{{asset('images/5e0f63b971080886c2b20121_united-kingdom.svg')}}" alt="" class="image-5">
                @elseif(Config::get('app.locale') == 'ru')
                <img src="{{asset('images/5e0f60bbaecc8350086c2bee_russia.svg')}}" alt="" class="image-5">
                @elseif(Config::get('app.locale') == 'de')
                <img src="{{asset('images/5e0f63b8452ae773116ee3ba_germany.svg')}}" alt="" class="image-5">
                @endif
                    <div class="small-dropdown-icon w-icon-dropdown-toggle"></div>
                </div>
                <nav class="dropdown-list-flag w-dropdown-list">
                <a href="/lang/de" class="link-block w-inline-block"><img src="{{asset('images/5e0f63b8452ae773116ee3ba_germany.svg')}}" alt="" class="image-5"></a>
                <a href="/lang/ru" class="link-block w-inline-block"><img src="{{asset('images/5e0f60bbaecc8350086c2bee_russia.svg')}}" alt="" class="image-5"></a>
                <a href="/lang/en" class="link-block w-inline-block"><img src="{{asset('images/5e0f63b971080886c2b20121_united-kingdom.svg')}}" alt="" class="image-5"></a>
                </nav>

                
            </div>
        </nav>
        <div class="transparant-menu-button w-nav-button">
            <div class="w-icon-nav-menu"></div>
        </div>
    </div>
</div>
@yield('content')
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{asset('js/script.js')}}?ver=1573218157" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
<script type="text/javascript">$(document).ready(function(){$('[href*="brandjs"]').attr('style', 'display:none !important');$('a[href="'+window.location.href+'"]').addClass('w--current');});</script>
</body>
