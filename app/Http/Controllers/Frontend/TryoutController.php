<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Tryout;
use App\Models\UserAnswer;
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
            $questions = Question::where('tryout_id', $request->tryout_id)->get();

            // Siapkan array untuk menyimpan data yang akan di-insert
            $userAnswers = [];

            // Iterasi melalui semua soal
            foreach ($questions as $question) {
                $userAnswers[] = [
                    'user_exam_id' => $userExam->id,
                    'question_id' => $question?->id,
                    'answer_id' => null, // Set answer_id ke null
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            UserAnswer::insert($userAnswers);

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

         // Cek jawaban user sebelumnya
        $selected_answer = UserAnswer::where('user_exam_id', $request->exam_id)->where('question_id', $question->id)->value('answer_id');

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
                'topic' => $question?->topic?->name
            ],
            'selected_answer' => $selected_answer,
            'index' => $request->index + 1, // Untuk pagination
            'total' => $questions->count()
        ],200);
        
    }

    public function questions(Request $request){
        
        $result = [];
        $result['status'] = 0;
        $result['data'] = [];

        $exam = UserExam::where('id', $request->exam_id)->first();
        $questions = $exam?->tryout?->questions;
        $is_answers = UserAnswer::where('user_exam_id', $exam->id)->whereNotNull('answer_id')->pluck('question_id');
        $result['data'] = $questions;
        $result['is_answers'] = $is_answers;
        
        return response()->json($result, 200);
    }

    // Display time after refresh
    public function time(Request $request){
        $userExam = UserExam::findOrFail($request->exam_id);
        $remainingSeconds = max(strtotime($userExam->end_time) - time(), 0);

        return response()->json(['remaining_time' => $remainingSeconds]);
    }

    // User save answer
    public function answer(Request $request){
        UserAnswer::updateOrCreate(
            [
                'user_exam_id' => $request->exam_id,
                'question_id' => $request->question_id,
            ],
            [
                'answer_id' => $request->answer_id
            ]
        );
    
        return response()->json(['success' => true]);
    }

    public function cancel($exam_id){
        $exam = UserExam::where('id', $exam_id)
            ->where('user_id', Auth::id())
            ->where('status', 'In Progress')
            ->first();

        if (!$exam) {
            return redirect()->route('dashboard.index')->with('error', 'Ujian tidak ditemukan atau sudah selesai.');
        }

        $exam->update(['status' => 'Cancel','end_time'=> Carbon::now()]);

        return redirect()->route('dashboard.index')->with('success', 'Ujian telah dibatalkan.');
    }

    public function finish($exam_id){
        $exam = UserExam::where('id', $exam_id)
            ->where('user_id', Auth::id())
            ->where('status', 'In Progress')
            ->first();

        if (!$exam) {
            return redirect()->route('dashboard.index')->with('error', 'Ujian tidak ditemukan atau sudah selesai.');
        }

        $exam->update(['status' => 'Completed','end_time'=> Carbon::now()]);

        return redirect()->route('dashboard.index')->with('success', 'Ujian telah diselesaikan.');
    }
}
