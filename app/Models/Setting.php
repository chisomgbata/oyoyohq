<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type', 'values'
    ];

    protected function casts(): array
    {
        return [
            'values' => 'array'
        ];
    }

}
