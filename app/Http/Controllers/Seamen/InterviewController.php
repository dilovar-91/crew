<?php

namespace App\Http\Controllers\Seamen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\User;
use App\Models\Invite;
use App\Models\Answer;
use App\Models\Question;

class InterviewController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        
    }
    public function detail($id)
    {
        $interview = Interview::with(['questions', 'user'])->first();
        return view('seamen.interview_detail')->with(array('interview'=>$interview));
    }
    public function question($id)
    {
        $question = Question::with(['interview', 'invite'])->first();
        return view('seamen.interview_question')->with(array('question'=>$question));
    }

    public function videoSend(Request $request){
        $data = $this->validate($request, [
            'blob'        => 'required',
        ]);
       $filename = uniqid();
        Storage::disk('public')
            ->put('videos/'.$filename.'.webm', file_get_contents($request->blob));
        FFMpeg::fromDisk('local')->open('public/videos/'.$filename.'.webm')
        ->export()
        ->inFormat(new FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
        ->withVisibility('public')
        ->save('public/videos/'.$filename.'.mp4');
        $answer = new Answer;
        $answer->question_id = $request->question_id;
        $answer->user_id = $request->user_id;
        $answer->comment = $request->comment ?? '';
        $answer->save();
        return response()->json(['status'=>'success']);
    }




}
