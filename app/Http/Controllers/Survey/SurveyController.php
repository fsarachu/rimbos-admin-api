<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('survey.show');
    }

    /**
     * Submit the survey answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request)
    {
        return $request->all();
    }
}
