<?php

namespace DivineOmega\LaravelMultipleChoice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use SoftDeletes;

    protected $table = 'lmc_responses';

    public function items()
    {
        return $this->hasMany('DivineOmega\LaravelMultipleChoice\Models\ResponseItem');
    }
}