@extends('layouts.seamen')

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
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                Interview <span class="text-primary">"{{$interview->title}}"</span> from <span class="text-success">{{ucfirst($interview->user->name ?? '')}}</span>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Seamen</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Interview Questions</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Questions</h3>
                
            </div>
            <div class="block-content block-content-full">
               
               
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">№</th>
                            <th>Title</th>
                            <th style="width: 15%;">Answer</th>
                            <th style="width: 15%;">Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php $complete=0; ?>
                       
                        @foreach ($interview->questions as $str)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="font-w600">
                                <a href="/seamen/interview/question/{{$str->id}}">{{$str->question ?? ''}}</a>
                            </td>
                            <td>
                                @if (count($str->answer) > 0 )
                                <?php $complete++ ?>
                                <em class="text-success"><i class="si si-check"></i> Answered</em>
                                
                                @else
                                <em class="text-muted"><a href="/seamen/interview/question/{{$str->id}}"><i class="si si-check"></i> Answer</em>
                                @endif
                            </td>
                            <td>
                                @if ($str->active ==1 )
                                <em ><a class="text-danger" href="/seamen/interview/comment/{{$str->id}}"><i class="si si-close"></i> Add Comment</em>
                                
                                @endif
                                
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                <?php $result = ($complete * 100) / (count($interview->questions)); ?>
                <span class="text-success">Complete:</span> <div class="progress-bar" role="progressbar" style="width: {{$result}}%;" aria-valuenow="{{$result}}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="font-size-sm font-w600">{{$result}}%</span>
                                </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

        
    </div>
    <!-- END Page Content -->

    
@endsection
