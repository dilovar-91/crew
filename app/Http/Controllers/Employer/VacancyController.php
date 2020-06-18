<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\User;

class VacancyController extends Controller
{
    public function vacancies($user_id)
    {
        $vacancies = Vacancy::where('user_id', $user_id)->get();
        return response()->json($vacancies, 200);
        
    }
    public function candidates()
    {
        $vacancies = User::select('id','name')->with(['roles' => function($q){
            $q->where('name', 'seamen');
        }])->get();
        return response()->json($vacancies, 200);
        
    }
}
