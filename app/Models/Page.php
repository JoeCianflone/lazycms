<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'content' => 'json',
        'meta_content' => 'json',
    ];
}
