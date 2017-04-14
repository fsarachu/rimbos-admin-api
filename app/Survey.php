<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'title',
        'question',
        'extra_comments_title',
        'event_id',
    ];

    protected $casts = [
        'title' => 'string',
        'question' => 'string',
        'extra_comments_title' => 'string',
        'event_id' => 'string',
    ];
}
