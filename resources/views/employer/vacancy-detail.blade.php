@extends('layouts.employer')


@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
               Детали вакансия
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Employer</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/employer/vacancy">Вакансии</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">{{$vacancy->title}}</a>
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
            <h1 class="block-title">Вакансия "{{$vacancy->title}}"</h1>
            <span class="badge badge-success">{!!($vacancy->active !== 0 ? '<i class="fa fa-fw fa-check"></i> Активен': '<i class="fa fa-fw fa-question text-danger"></i> Не активен')!!}</span>
        </div>
        
        <div class="block-content">
        <h2 class="h4 mb-3">Описание</h2>
        <p>
        {!!$vacancy->description !!}
        </p>
      </div>
      <div class="block-footer block-header-default">
            <p class="ml-4 mb-0">{{($vacancy->created_at !== null) ? 'Создан: '.$vacancy->updated_at->format('d/m/Y') : ''}} {{($vacancy->updated_at !== null) ? 'Изменён: '.$vacancy->updated_at->format('d/m/Y') : ''}}</p>
            <p class="ml-4 mb-0">Видеоинтервью: <span class="badge badge-success">{!!($vacancy->videointerview !== 0 ? '<i class="fa fa-fw fa-check"></i>': '<i class="fa fa-fw fa-question text-danger"></i>')!!}</span></p>
            <p class="ml-4 mb-0">Тесты: <span class="badge badge-success">{!!($vacancy->test !== 0 ? '<i class="fa fa-fw fa-check"></i>': '<i class="fa fa-fw fa-question text-danger"></i>')!!}</span></p>
        </div>
    
      
   

   

<!-- Tab panes -->

</div>
    </div>
</div>

    
@endsection
