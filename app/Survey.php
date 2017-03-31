<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['event_id', 'description', 'question', 'has_extra_comments', 'extra_comments_title'];

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}
