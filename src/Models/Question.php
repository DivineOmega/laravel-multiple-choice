<?php

namespace DivineOmega\LaravelMultipleChoice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\View;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'lmc_questions';

    public function choices()
    {
        return $this->hasMany('DivineOmega\LaravelMultipleChoice\Models\Choice');
    }

    public function responseItem()
    {
        return $this->hasMany('DivineOmega\LaravelMultipleChoice\Models\ResponseItem');
    }

    public function render()
    {
        $view = View::make('lmc.question', ['question' => $this]);
        return $view->render();
    }
}