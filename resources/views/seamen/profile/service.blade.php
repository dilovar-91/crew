@extends('layouts.seamen')

@section('content')
<div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                <span class="text-primary">Edit Services</span>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Seamen</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/seamen/profile">Profile</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Edit Services</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    
    <main id="main-container pt-0">
        <div class="content content-boxed">
            <profile-service :user_id="{{ Auth::user()->id }}"></profile-service>
        </div>
    </main>




@endsection
