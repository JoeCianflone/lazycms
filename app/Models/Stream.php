<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $dates = [
        'item_created_at',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'is_pinned' => 'boolean'
    ];

}
