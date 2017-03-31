<?php

namespace App\Http\Controllers\Front\Surveys;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThanksController extends Controller
{
    /**
     * Show the thanks view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.surveys.thanks');
    }
}
