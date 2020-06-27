<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\User;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    
    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        return view('employer.add-interview')->with(array('user_id'=>$user_id)); 
        
    }
    public function save(Request $request)
    {
        $interview = new Interview;
        $interview->title = $request->title;
        $interview->invite_id = $request->user_id;
        $interview->vacancy_id = $request->user_id;
               
        $interview->save(); 
        $interview_id = $interview->id;
        
        if(count($request->questions) > 0){
            foreach ($request->questions as $question){
            $questions[] = array(
                'interview_id'=>$interview_id,
                'question'=>$question['text'],
                'time'=>$question['time']                
            );
            }             
        }
        if(count($request->quizzes) > 0){
            
            foreach ($request->quizzes as $quiz){
                
            $ans = array($quiz['option1'], $quiz['option2'], $quiz['option3'], $quiz['option4']);
                $quizzes[] = [
                'interview_id'=>$interview_id,
                'question'=>$quiz['text'],
                'option1'=>$quiz['option1'],                
                'option2'=>$quiz['option2'],                
                'option3'=>$quiz['option3'],                
                'option4'=>$quiz['option4'],
                'correct'=>$quiz['answer']
            ];
            }              
        }

        //dd($request->quizzes);

        Question::insert($questions);
        Quiz::insert($quizzes);
        return response()->json($quizzes, 201);
        
    }
}
