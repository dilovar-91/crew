<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Answer;
use \FFMpeg;

class ProcessVideoConvert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $answer = $this->answer;
        $file = substr($answer->answer, 0, -5);
        FFMpeg::fromDisk('local')->open('public/videos/'.$file.'.webm')
        ->export()
        ->inFormat(new FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
        ->withVisibility('public')
        ->save('public/videos/'.$answer->answer);
    }
}
