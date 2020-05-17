@extends('layouts.seamen')


@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                Quiz for <span class="text-primary">"{{$interview->title}}" {{$interview->invite['user_id']}}</span> 
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Seamen</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Interview Quiz</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
   
    <div class="content">
        
        <quiz-component :interview_id="{{$interview->id}}"></quiz-component>
        
    </div>
    

    
@endsection
