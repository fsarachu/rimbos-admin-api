<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'rating',
        'extra_comments',
        'user_id',
        'survey_id',
    ];

    protected $casts = [
        'rating' => 'integer',
        'extra_comments' => 'string',
        'user_id' => 'string',
        'survey_id' => 'integer',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

}
