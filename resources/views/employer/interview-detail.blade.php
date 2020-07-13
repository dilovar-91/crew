@extends('layouts.employer')


@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
               Просмотр интервью
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Employer</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/employer/interviews">Интервью</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">{{$interview->title}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
   
    <div class="content">
    <div class="block bg-white">
    <div class="block-header block-header-default">
            <h1 class="block-title">интервью  "{{$interview->title}}"</h1>
        </div>
        
        <div class="block-content">
        <h2 class="h4 mb-3">Описание</h2>
        <p>
        {!!$interview->description !!}
        </p>
      </div>
    
      
   

    <ul class="nav nav-tabs nav-tabs-block">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Вопросы</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Тесты</a>
  </li>
  
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active container" id="home">
  <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="">
                                    <td class="text-center" style="width: 100px;">
                                       №
                                    </td>
                                    <td class="font-w600" style="width:450px;">
                                        Вопрос
                                    </td>
                                    <td style="width: 150px;">
                                        Время подготовки
                                    </td>                                    
                                    <td class=" text-muted" style="width: 80px;">
                                        Время ответа
                                    </td>
                                </tr>  
                                
                                @for($i=0; $i< count($interview->questions); $i++)                              
                                <tr class="">
                                    <td class="text-center" style="width: 100px;">
                                      {{$i+1}}
                                    </td>
                                    <td class="font-w600" style="width:450px;">
                                    {{$interview->questions[$i]->question}}
                                    </td>
                                    <td class="text-center text-muted" style="width: 150px;">
                                    {{$interview->questions[$i]->prepare_time ?? 0}}
                                    </td>                                    
                                    <td class=" text-muted" style="width: 80px;">
                                    {{$interview->questions[$i]->time}}  
                                    </td>
                                </tr>  
                                @endfor                              
                            </tbody>
                        </table>
                        </div>
  </div>
  <div class="tab-pane container" id="menu1">
  <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="">
                                    <td class="text-center" style="width: 100px;">
                                       №
                                    </td>
                                    <td class="font-w600" style="width:450px;">
                                        Вопрос
                                    </td>
                                    <td style="width: 150px;">
                                        Вариант 1
                                    </td>                                    
                                    <td class=" text-muted" style="width: 80px;">
                                        Вариант 2
                                    </td>
                                    <td class=" text-muted" style="width: 80px;">
                                        Вариант 3
                                    </td>
                                    <td class=" text-muted" style="width: 80px;">
                                        Вариант 4
                                    </td>
                                    <td class=" text-muted" style="width: 80px;">
                                        Ответ
                                    </td>
                                </tr>  
                                
                                @for($i=0; $i< count($interview->quizzes); $i++)                              
                                <tr class="">
                                    <td class="text-center" style="width: 100px;">
                                      {{$i+1}}
                                    </td>
                                    <td class="font-w600" style="width:450px;">
                                    {{$interview->quizzes[$i]->question}}
                                    </td>
                                    <td class="text-center text-muted" style="width: 150px;">
                                    {{$interview->quizzes[$i]->option1 ?? ''}}
                                    </td>                                    
                                    <td class=" text-muted" style="width: 80px;">
                                    {{$interview->quizzes[$i]->option2 ?? ''}}  
                                    </td>
                                    <td class=" text-muted" style="width: 80px;">
                                    {{$interview->quizzes[$i]->option3 ?? ''}}  
                                    </td>
                                    <td class=" text-muted" style="width: 80px;">
                                    {{$interview->quizzes[$i]->option4 ?? ''}}  
                                    </td>
                                    <td class=" text-muted" style="width: 80px;">
                                    {{$interview->quizzes[$i]->correct ?? ''}}  
                                    </td>
                                </tr>  
                                @endfor                              
                            </tbody>
                        </table>
                        </div>
  </div>
  
    </div>
  </div>
</div>
    </div>
</div>

    
@endsection
