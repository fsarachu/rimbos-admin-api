<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = ['rating', 'extra_comments', 'survey_id', 'user_id'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
