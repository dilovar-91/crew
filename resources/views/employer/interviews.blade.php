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
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
               Список интервью
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Employer</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Список интервью</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <div class="content">
    <div class="block">
        
       
        <div  class="block-header block-header-default">
        <h3  class="block-title">Список</h3>
        <div  class="block-options">
            <a  href="/employer/interview/create" class="btn-block-option mr-2"><i data-v-5c41ed51="" class="fa fa-plus mr-1"></i> Добавить интнервью</a>
            <button  type="button" data-toggle="block-option" data-action="fullscreen_toggle" class="btn-block-option"><i class="si si-size-fullscreen"></i></button>
        </div>
    </div>
    <div class="block-content">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">№</th>
                            <th class="">Интервью</th>
                            <th class="text-center">Добавлён</th>
                            <th>Статус</th>
                            <th class="text-right">Кол-во вопросов</th>
                            <th class="text-right">Кол-во тестов</th>
                            <th class="text-center">Действие</th>
                        </tr>
                    </thead>   
                    <tbody>
                    
                        @for($i = 0; $i < count($interviews); $i++)
                        <tr>
                            <td class="text-center font-size-sm">
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">
                                    <strong>{{$i+1}}</strong>
                                </a>
                            </td>
                            <td class="d-md-table-cell font-size-sm">
                                <a href="/employer/interview/detail/{{$interviews[$i]->id}}">{{$interviews[$i]->title}}</a>
                            </td>
                            <td class="d-sm-table-cell text-center font-size-sm">{{$interviews[$i]->created_at->format('d/m/Y')}}</td>
                            <td>
                                <span class="badge badge-success">{{($interviews[$i]->status !== 0 ? 'active': 'disabled')}}</span>
                            </td>
                            <td class="text-center d-sm-table-cell font-size-sm">
                                <strong>{{count($interviews[$i]->questions)}}</strong>
                            </td>
                            <td class="text-center d-sm-table-cell font-size-sm">
                                <strong>{{count($interviews[$i]->quizzes)}}</strong>
                            </td>
                            <td class="text-center font-size-sm">
                                <a class="btn btn-sm btn-alt-secondary js-tooltip-enabled" href="/employer/interview/detail/{{$interviews[$i]->id}}" data-toggle="tooltip" title="" data-original-title="View">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary js-tooltip-enabled" href="/employer/interview/edit/{{$interviews[$i]->id}}" data-toggle="tooltip" title="" data-original-title="View">
                                    <i class="fa fa-fw fa-pen"></i>
                                </a>                              

                               <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$interviews[$i]->id}})" 
data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <nav aria-label="Photos Search Navigation" class="d-flex flex-row-reverse">
                {{$interviews->links()}}
            </nav>
        </div>
    </div>
    </div>

    <div id="DeleteModal" class="modal fade " role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="get">
         <div class="modal-content">
             <div class="modal-header bg-primary">
                 
                 <h4 class="modal-title text-white">DELETE CONFIRMATION</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                
                 
                 <p class="text-center">Are You Sure Want To Delete ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>

 
    
@endsection
