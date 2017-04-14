<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyAnswer;
use App\Http\Requests\UpdateSurveyAnswer;
use App\Survey;
use App\SurveyAnswer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey)
    {
        return response()->json([
            'data' => $survey->answers,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Survey $survey
     * @param  \App\Http\Requests\StoreSurveyAnswer $request
     * @return \Illuminate\Http\Response
     */
    public function store(Survey $survey, StoreSurveyAnswer $request)
    {
        $survey_answer = SurveyAnswer::create(
            array_merge(
                $request->only(
                    [
                        'rating',
                        'extra_comments',
                        'user_id',
                        'survey_id',
                    ]
                ),
                [
                    'survey_id' => $survey->id,
                ]
            )
        );

        if (!$survey_answer) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $survey_answer], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey $survey
     * @param  \App\SurveyAnswer $surveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey, SurveyAnswer $answer)
    {
        if ($answer->survey_id !== $survey->id) {
            throw new ModelNotFoundException(); //TODO: Move this to middleware(?
        }

        return response()->json(['data' => $answer], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSurveyAnswer $request
     * @param  \App\Survey $survey
     * @param  \App\SurveyAnswer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurveyAnswer $request, Survey $survey, SurveyAnswer $answer)
    {
        if ($answer->survey_id !== $survey->id) {
            throw new ModelNotFoundException(); //TODO: Move this to middleware(?
        }

        $answer->fill($request->only(
            [
                'rating',
                'extra_comments',
                'user_id',
            ]
        ));

        $answer->save();

        return response()->json(['data' => $answer], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey $survey
     * @param  \App\SurveyAnswer $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey, SurveyAnswer $answer)
    {
        if ($answer->survey_id !== $survey->id) {
            throw new ModelNotFoundException(); //TODO: Move this to middleware(?
        }

        $answer->delete();

        return response()->json([], 204);
    }
}
