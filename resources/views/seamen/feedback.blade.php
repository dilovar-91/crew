@extends('layouts.seamen')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                   Feedback
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Seamen</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Feedback</a>
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
                <h3 class="block-title">Feedback</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                @if(isset($feedback))
                <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">№</th>
                            <th>Interview</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Inviter</th>
                            <th style="width: 15%;">Date</th>
                            <th style="width: 15%;">Completed</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                       
                        @foreach ($feedback as $str)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="font-w600">
                                <a href="/seamen/feedback/{{$str->id ?? ''}}">Feedback to {{$str->invite->interview->title ?? ''}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{ucfirst($str->invite->inviter->name ?? '')}}
                            </td>
                            <td>
                                <em class="text-muted">{{ $str->created_at }}</em>
                            </td>
                            <td>
                                @if ($str->status ==0 ||$str->status ==2 )
                                <em class="text-muted"><a href="/seamen/invite/aprove/{{$str->id}}"><i class="si si-check"></i> Completed</em>
                                @else
                                <em class="text-success"><i class="si si-check"></i> Completed</em>
                                @endif
                            </td>
                            
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                @endif
                </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

        
    </div>
    <!-- END Page Content -->
@endsection
