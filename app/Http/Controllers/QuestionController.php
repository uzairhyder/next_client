<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $question = Question::where('id','>',5)->get();
        return view('admin_dashboard.reviews_question.index', compact('question'));
    }

    public function create()
    {
        $question = Question::get();
        return view('admin_dashboard.reviews_question.create', compact('question'));
    }

    public function store(Request $request)
    {
        $review_question = new Question();
        $review_question->title=$request->title;
        $review_question->answer=$request->answer;
        $review_question->answer2=$request->answer2;
        $review_question->status=$request->status;
        $review_question->save();

       return back()->with('message','done');
    }
    public function edit($id)
    {
        $review_question =  Question::findorfail($id);
        // $review_question->title=$request->title;
        // $review_question->answer=$request->answer;
        // $review_question->status=$request->status;
        // $review_question->save();
        return view('admin_dashboard.reviews_question.edit', compact('review_question'));
       return back()->with('message','done');
    }

    public function update(Request $request)
    {
       
        $review_question =  Question::findorfail($request->id);
        $review_question->title=$request->title;
        $review_question->answer=$request->answer;
        $review_question->answer2=$request->answer2;
        $review_question->status=$request->status;
        $review_question->save();
        return back()->with('message','done');
    }
    public function action($id)
    {
       
        $review_question =  Question::where('id',$id)->first();
        $status= $review_question->status==1?0:1;
       $review_question->status=$status;
        $review_question->save();
        return back()->with('message','done');
    }
}
