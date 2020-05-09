@extends('layouts.seamen')
@section('content')
<div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                <span class="text-primary">Profile</span>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Seamen</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Profile</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
<div class="bg-image" >
    <div class="bg-black" style="background-image: url('/images/background.jpg');">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="/images/user/{{$user->pic ?? 'avatar13.jpg'}}" alt="">
            </div>
            <h1 class="h2 text-white mb-0">{{$user->surname ?? ''}} {{$user->first_name ?? ''}}</h1>
            <h2 class="h4 font-w400 text-white-75">
            {{ucfirst($user->roles[0]->name ?? '')}}
            </h2>
            <a class="btn btn-light" href="/seamen">
                <i class="fa fa-fw fa-home text-danger"></i> Back to Home
            </a>
       </div>
    </div>
</div>
<div class="content content-boxed">

    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Main info</h3>
            <div class="block-options">
            <a  class="btn btn-sm btn-primary" href="/seamen/profile/edit/main">Edit</a>
            </div>
        </div>
        
        <div class="block-content">
            <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                    Your info about the position you want.
                    </p> 
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <p>Application for position as: <span class="font-weight-bold text-danger">{{$user->position_as ?? ''}}</span> </p>
                        <p>Other position (If any): <span class="font-weight-bold text-danger">{{$user->position_other ?? ''}}</span> </p>
                        <p>Ready from: <span class="font-weight-bold text-primary">{{$user->ready_from ?? ''}}</span> </p>
                        <p>Salary $: <span class="font-weight-bold text-primary">{{$user->salary ?? 0}}</span> </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">1. Personal details</h3>
            <div class="block-options">
            <a  class="btn btn-sm btn-primary" href="/seamen/profile/edit/personal">Edit</a>
        </div>
        </div>
        
        <div class="block-content">
            <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-6  col-xl-5">
                    <p><span class="font-weight-bold text-primary"> Surname: {{$user->surname ?? ''}}</span> </p>
                        <p><span class="font-weight-bold text-primary"> First Name: {{$user->first_name ?? ''}}</span> </p>
                        <p><span class="font-weight-bold text-primary"> Others names: {{$user->other_name ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Sex: {{$user->sex ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Date of birth: {{$user->date_of_birth ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Place of birth: {{$user->place_of_birth ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Citizenship: {{$user->citizenship ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Marital Status: {{$user->marital_status ?? ''}}</span> </p>
                    </div>
                    <div class="col-lg-6 col-xl-5">
                        <p><span class="font-weight-bold"> Colour of eyes: {{$user->colour_of_eyes ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Colour of hair: {{$user->colour_of_hair ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Heigth: {{$user->height ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Weight: {{$user->weight ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Boilersuit size: {{$user->boilersuit_size ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Boots size: {{$user->boots_size ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Language: {{$user->language ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Level: {{$user->level ?? ''}}</span> </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">2. Address</h3>
            <div class="block-options">
                <a  class="btn btn-sm btn-primary" href="/seamen/profile/edit/adress">Edit</a>
            </div>
        </div>
        
        <div class="block-content">
            <form action="/seamen/profile/save/adress" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-4">
                    <p class="font-size-sm text-muted">
                            Your account’s vital info. Your username will be publicly visible.
                            
                        </p> 
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <p><span class="font-weight-bold text-primary"> Country: {{$user->country ?? ''}}</span> </p>
                        <p><span class="font-weight-bold text-primary"> City: {{$user->city ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Post code: {{$user->post_code ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Mobile: {{$user->mobile ?? ''}}</span> </p>
                        <p><span class="font-weight-bold text-primary"><i class="fa fa-fw fa-envelope mr-1"></i>  Email: {{$user->email ?? ''}}</span> </p>
                        <p><span class="font-weight-bold text-primary"><i class="fa fa-fw fa-phone mr-1"></i>  Skype: {{$user->skype ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Next of kin: {{$user->next_of_kin ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Kin adress: {{$user->kin_adress ?? ''}}</span> </p>
                        <p><span class="font-weight-bold"> Kin mobile: {{$user->kin_mobile ?? ''}}</span> </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">My services</h3>
            <div class="block-options">
            <a  class="btn btn-sm btn-primary" href="/seamen/profile/edit/service">Edit</a>
            </div>
        </div>
        <div class="block-content">
        @if(isset($services))
        <table class="table">
        <thead>
        <tr>
            <td>Position</td>
            <td>Vessel Name</td>
            <td>Vessel Type</td>
            <td>Me Type</td>
            <td>From</td>
            <td>Till</td>
            <td>Shipowner</td>
            <td>Country</td>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->position }}</td>
                <td>{{ $service->vessel_name }}</td>
                <td>{{ $service->vessel_type }}</td>
                <td>{{ $service->me_type }}</td>
                <td>{{ $service->from }}</td>
                <td>{{ $service->till }}</td>
                <td>{{ $service->shipowner }}</td>
                <td>{{ $service->country['name'] ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        @endif
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Schools</h3>
            <div class="block-options">
            <a  class="btn btn-sm btn-primary" href="/seamen/profile/edit/school">Edit</a>
            </div>
        </div>
        <div class="block-content">
        @if(isset($education))
        <table class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <td>School name</td>
                <td>From</td>
                <td>To</td>
            </tr>
            </thead>
            <tbody>
            @foreach($education as $school)
                <tr>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->from }}</td>
                    <td>{{ $school->to }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Documents</h3>
            <div class="block-options">
                <a  class="btn btn-sm btn-primary" href="/seamen/profile/edit/document">Edit</a>
            </div>
        </div>
        <div class="block-content">
        @if(isset($documents)) 
        <table class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <td>Type</td>
                <td>Document No.</td>
                <td>Date of issue</td>
                <td>Valid Untill</td>
                <td>Place of issued</td>
            </tr>
            </thead>

            <tbody>
            @foreach($documents as $doc)
                <tr>
                    <td>{{ $doc->doctype['type'] ?? '' }}</td>
                    <td>{{ $doc->number }}</td>
                    <td>{{ $doc->date_of_issue }}</td>
                    <td>{{ $doc->country['name'] ?? '' }}</td>
                    <td>{{ $doc->valid_untill }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        </div>
    </div>
</div>
@endsection
