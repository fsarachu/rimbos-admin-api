<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurvey;
use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of surveys.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::with('answers')->orderBy('created_at', 'desc')->get();
        return view('admin.surveys.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurvey $request)
    {
        $parameters = array_merge(
            $request->only('event_id', 'description', 'question', 'extra_comments_title'),
            ['has_extra_comments' => $request->input('has_extra_comments', false)]
        );

        try {

            Survey::create($parameters);

            $request->session()->flash('positive_message', 'Encuesta creada!');
            return redirect(route('admin.suveys.index'));

        } catch (Exception $e) {

            $request->session()->flash('negative_message', 'No se pudo crear la encuesta');
            return back();

        }
    }

    /**
     * Display the specified survey.
     *
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return view('admin.surveys.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
