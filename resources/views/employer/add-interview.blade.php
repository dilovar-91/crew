@extends('layouts.employer')


@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
               Добавление интервью
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Employer</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Добавление интервью</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
    
    <div class="content">
    <add-interview :user_id="{{$user_id}}" />
    </div>
</div>

    
@endsection
