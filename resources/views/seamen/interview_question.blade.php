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
                            <a class="link-fx" href="">Answering</a>
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
            <div class="block">
            <div class="block-header">
                        <h3 class="block-title">Question: <span class="text-primary">{{$question->question}}</span></h3>
                         </div>
                <div class="block-content">
                    <div class="col-md-6 justify-content-center offset-md-3">
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                    <div class="flex-00-auto">
                        <i class="fa fa-fw fa-info-circle"></i>
                    </div>
                    <div class="flex-fill ml-3">
                        <p class="mb-0">You can answer this question for {{($question->time / 60)}} minutes. Record video in a light position and click send button.</p>
                    </div>
       
                </div>
            </div>

            <div class="col-md-4 justify-content-center offset-md-3">
                <videojs-record :user_id="1" :question_id="{{$question->id}}" :time="{{$question->time}}"></videojs-record>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END Page Content -->
@endsection