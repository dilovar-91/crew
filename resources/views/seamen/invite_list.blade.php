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
                   Interview Invites
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Seamen</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Interview Invites</a>
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
                <h3 class="block-title">Invite List</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                @if(isset($invites))
                <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">№</th>
                            <th>Title</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Inviter</th>
                            <th style="width: 15%;">Date</th>
                            <th style="width: 15%;">Aprove</th>
                            <th style="width: 15%;">Decline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                       
                        @foreach ($invites as $str)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="font-w600">
                                <a href="/seamen/interview/{{$str->interview->id ?? ''}}">Invite to {{$str->interview->title ?? ''}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                            {{ucfirst($str->inviter->name ?? '')}}
                            </td>
                            <td>
                                <em class="text-muted">{{ $str->created_at }}</em>
                            </td>
                            <td>
                                @if ($str->status ==0 ||$str->status ==2 )
                                <em class="text-muted"><a href="/seamen/invite/aprove/{{$str->id}}"><i class="si si-check"></i> Aprove</em>
                                @else
                                <em class="text-success"><i class="si si-check"></i> Aproved</em>
                                @endif
                            </td>
                            <td>
                                @if ($str->status ==0 ||$str->status ==1 )
                                <em ><a class="text-danger" href="/seamen/invite/decline/{{$str->id}}"><i class="si si-close"></i> Decline</em>
                                @else
                                <em class="text-danger"><i class="si si-close"></i> Declined</em>
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
