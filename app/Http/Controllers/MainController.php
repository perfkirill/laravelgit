<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{

    public function show_quiz()
    {

        $questions = Question::where("learned",'0')->inRandomOrder()->get();

        return view("quiz",compact(['questions']));

    }


    public function create_quiz()
    {

        return view("quiz_add");

    }

    public function store_quiz(Request $request)
    {

        $question = new Question();

        $question->question = $request->question;
        $question->checkboxs = $request->checkboxs ? $request->checkboxs : 0;
        $question->learned = 0;

        $question->save();

        if ($question->id) {

            for ($i = 1; $i <= 6; $i++) {

                if ($request->{'answer' . $i}) {

                    $answer = new Answer();

                    $answer->answer = $request->{'answer' . $i};
                    $answer->question_id = $question->id;
                    $answer->correct_answer = $request->{'correct_answer' . $i} ? $request->{'correct_answer' . $i} : 0;

                    $answer->save();
                }
            }


        }

        return Redirect::back()->with('success', 'Вопрос добавлен');;


    }


    public function checkAnswer(Request $request){

        if($request->question_id){

            $question_id = $request->question_id;

            $answers = Answer::where("question_id",$question_id)->where("correct_answer",1)->get();

        }
        $correct_answers = array();
        foreach ($answers as $answer){
            $correct_answers[] =  $answer->id;
            $correct_answers_names[] = $answer->answer;
        }
      //сравниваем 2 массива
        $diff_arrays = array_diff( $correct_answers,$request->answers);
        $diff_arrays2 = array_diff( $request->answers,$correct_answers);


        if($diff_arrays || $diff_arrays2){
            return json_encode(array("status" => "error", "message" => "Ответ не верен", "correct_answer" => $correct_answers_names));
        }
        else{
            return json_encode(array("status" => "success", "message" => "Ответ верен"));
        }


    }


    public function questionLearned(Request $request){

        if($request->question_id){

            $question = Question::find($request->question_id);
            $question->learned = 1;
            $question->save();

            return json_encode(array("status" => "success", "message" => "Ответ верен", "qid" => $request->question_id));

        }

    }

}
