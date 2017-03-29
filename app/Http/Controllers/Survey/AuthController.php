<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Authorize the survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate($token, $event_id)
    {
        $response = \Httpful\Request::get(env('RIMBOS_USERS_API'))
            ->addHeader('Authorization', $token)
            ->send();

        $user = $response->body;

        $response = \Httpful\Request::get(env('RIMBOS_EVENTS_API') . $event_id)
            ->addHeader('Authorization', $token)
            ->send();

        $event = $response->body;

        session(['rimbos_user' => $user]);
        session(['rimbos_event' => $event]);

        return session();
    }

}
