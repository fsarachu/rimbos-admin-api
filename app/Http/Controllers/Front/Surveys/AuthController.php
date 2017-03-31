<?php

namespace App\Http\Controllers\Front\Surveys;

use App\Http\Controllers\Controller;
use App\Survey;
use Httpful\Request as HttpfulRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Authorize the survey.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Get query parameters (Not using clean URLs beacause mobile app "already works this way")
        $token = $request->query('token', null);
        $event_id = $request->query('eventId', null);

        // Check required parameter
        if (!$event_id) {
            abort(403);
        }

        // If a token was provided, lets sniff some user data!
        $user_data = null;

        if ($token) {
            $response = HttpfulRequest::get(env('RIMBOS_USERS_API'))
                ->addHeader('Authorization', $token)
                ->send();

            if ($response->code != 200) {
                abort(403);
            }

            $user_data = $response->body;
        }

        // Retrieve event data
        $response = HttpfulRequest::get(env('RIMBOS_EVENTS_API') . $event_id)
            ->send();

        if ($response->code != 200) {
            abort(403);
        }

        $event_data = $response->body->data;

        //Pick a survey
        $survey = Survey::where('event_id', '=', $event_id)->inRandomOrder()->first();

        // Store data in session
        $request->session()->put(
            [
                'rimbos_user' => $user_data,
                'rimbos_event' => $event_data,
                'survey_id' => $survey->id
            ]
        );

        // Redirect to survey
        return redirect()->route('survey.show');
    }

}
