<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Httpful\Request as HttpfulRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Authorize the survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request, $token, $event_id)
    {
        $response = HttpfulRequest::get(env('RIMBOS_USERS_API'))
            ->addHeader('Authorization', $token)
            ->send();

        if ($response->code != 200) {
            abort(403);
        }

        $user = $response->body;

        $response = HttpfulRequest::get(env('RIMBOS_EVENTS_API') . $event_id)
            ->addHeader('Authorization', $token)
            ->send();

        if ($response->code != 200) {
            abort(403);
        }

        $event = $response->body->data;

        $request->session()->put(['rimbos_user' => $user]);
        $request->session()->put(['rimbos_event' => $event]);

        return redirect()->route('survey.show');
    }

}
