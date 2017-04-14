<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurvey;
use App\Http\Requests\UpdateSurvey;
use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Survey::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSurvey $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurvey $request)
    {
        $survey = Survey::create($request->only(
            [
                'title',
                'question',
                'extra_comments_title',
                'event_id',
            ]
        ));

        if (!$survey) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $survey], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return response()->json(['data' => $survey], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSurvey $request
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurvey $request, Survey $survey)
    {
        $survey->fill($request->only(
            [
                'title',
                'question',
                'extra_comments_title',
                'event_id',
            ]
        ));

        $survey->save();

        return response()->json(['data' => $survey], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();

        return response()->json([], 204);
    }
}
