<?php

namespace App\Http\Controllers\Front\Surveys;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurveyAnswer;
use App\Survey;
use App\SurveyAnswer;
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $survey = Survey::find($request->session()->get('survey_id'));

        return view('front.surveys.show', compact('survey'));
    }

    /**
     * Submit the survey answer.
     *
     * @param StoreSurveyAnswer $request
     * @return \Illuminate\Http\Response
     */
    public function submit(StoreSurveyAnswer $request)
    {
        // Store answer
        try {
            SurveyAnswer::create(
                [
                    'survey_id' => $request->session()->get('survey_id'),
                    'rating' => $request->input('rating'),
                    'extra_comments' => $request->input('extra_comments'),
                    'user_id' => $request->session()->has('rimbos_user') ? $request->session()->get('rimbos_user')->_id : null
                ]
            );

            // Destroy survey session
            $request->session()->forget(['rimbos_user', 'rimbos_event', 'survey_id']);

            // Thank you!
            return redirect(route('survey.thanks'));

        } catch (Exception $e) {
            return back();
        }
    }
}
