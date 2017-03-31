<?php

namespace App\Http\Controllers\Front\Surveys;

use App\Http\Controllers\Controller;
use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.survey');
    }

    /**
     * Show the survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return view('front.surveys.show', compact('survey'));
    }

    /**
     * Submit the survey answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request)
    {
        $data = [
            'rating' => $request->input('rating'),
            'extra_comments' => $request->input('extra_comments'),
            'user' => $request->session()->pull('rimbos_user'),
            'event' => $request->session()->pull('rimbos_event')
        ];

        return $data;
    }
}
