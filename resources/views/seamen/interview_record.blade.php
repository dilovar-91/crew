@extends('layouts.seamen')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Answering to question</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Interview</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Recording</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="col-md-12">
            <div class="block ml-0 mr-0">            
                <interview-record title="{{$interview->title}}" :user_id="1" :questions="{{$interview->questions}}" :invite_id="{{$interview->invite->id}}"></interview-record>
            </div>
    </div>
    </div>
    </div>
    <!-- END Page Content -->
@endsection