@extends('layouts.employer')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
<div class="bg-image overflow-hidden" style="background-image: url('assets/media/photos/photo3@2x.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-narrow content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 js-appear-enabled animated fadeIn" data-toggle="appear">Страница работадателя</h1>
                    <h2 class="h4 font-w400 text-white-75 mb-0 js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="250">Добро пожаловать {{Auth::user()->name ?? ''}}</h2>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="350">
                        <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="/employer/vacancy/create" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-plus mr-1"></i> Опубликовать вакансию
                        </a>
                    </span>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="350">
                        <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="/employer/interview/create" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-plus mr-1"></i> Добавить  интервью
                        </a>
                    </span>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="350">
                        <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="/employer/invite" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-plus mr-1"></i> Приглашение 
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content content-narrow">
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Вакансии</div>
                    <div class="font-size-h2 font-w400 text-dark">580</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Приглашения</div>
                    <div class="font-size-h2 font-w400 text-dark">600</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Интервью</div>
                    <div class="font-size-h2 font-w400 text-dark">450</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Отклики</div>
                    <div class="font-size-h2 font-w400 text-dark">400</div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="block js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn">
                <div class="block-content block-content-full">
                    <div class="py-5 text-center">
                        <div class="item item-2x item-rounded bg-warning text-white mx-auto">
                            <i class="si fa-2x si-note"></i>
                        </div>
                        <div class="font-size-h4 font-w600 pt-3 mb-0">Добавьте вакансию</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block js-appear-enabled animated flipInX" data-toggle="appear" data-class="animated flipInX">
                <div class="block-content block-content-full">
                    <div class="py-5 text-center">
                        <div class="item item-2x item-rounded bg-danger text-white mx-auto">
                            <i class="si fa-2x si-check"></i>
                        </div>
                        <div class="font-size-h4 font-w600 pt-3 mb-0">Пригласите на интервью</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block js-appear-enabled animated flash" data-toggle="appear" data-class="animated flash">
                <div class="block-content block-content-full">
                    <div class="py-5 text-center">
                        <div class="item item-2x item-rounded bg-info text-white mx-auto">
                            <i class="si fa-2x fa-2x si-rocket"></i>
                        </div>
                        <div class="font-size-h4 font-w600 pt-3 mb-0">Выбирайте лучших</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>


    
@endsection
