<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tryout;
use App\Models\UserExam;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class TryoutController extends Controller
{
    public function index(){
        $tryouts = Tryout::orderBy('id','DESC')->get();

        return view('frontend.tryout.index',compact('tryouts'));
    }

    public function prepare($id){
        $user = Auth::user();
        $tryout = Tryout::find($id);

        return view('frontend.tryout.prepare',compact('tryout'));
    }

    public function exam(Request $request){
        $result = [];
        $result['status'] = 0;
        $result['data'] = [];

        $user = Auth::user();
        $userExam = UserExam::Create([
            'user_id' => $user?->id,
            'tryout_id' => $request->tryout_id,
            'status' => 'In Progress',
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addMinutes(100),
        ]);

        if($userExam){
            $result['status'] = 1;
            $result['data'] = $userExam->toArray();
        }
        return response()->json($result, 200);
    }

    public function working($id){
        $user = Auth::user();

        $exam = UserExam::where('id',$id)->where('status','In Progress')->first();
        if(!$exam){
            return back()->with('error','no exam found');
        }

        $tryout = Tryout::find($exam->tryout_id);

        return view('frontend.tryout.working',compact('exam','tryout'));
    }

    public function question(Request $request){
        $result = [];
        $result['status'] = 0;
        $result['data'] = [];

        $exam = UserExam::where('id', $request->exam_id)->first();
        $questions = $exam?->tryout?->questions;

        if (!$questions || !isset($questions[$request->index])) {
            return response()->json(['error' => 'No question found'], 404);
        }
        $question = $questions[$request->index];
        $answers = $question->answers;

        return response()->json([
            'question' => [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => $answers->map(function ($answer) {
                    return [
                        'id' => $answer->id,
                        'answer' => $answer->answer
                    ];
                }),
            ],
            'index' => $request->index + 1, // Untuk pagination
            'total' => $questions->count()
        ],200);
        
    }
}
