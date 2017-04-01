<?php

namespace DivineOmega\LaravelMultipleChoice\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DivineOmega\LaravelMultipleChoice\Models\Question;
use DivineOmega\LaravelMultipleChoice\Models\Choice;
use DivineOmega\LaravelMultipleChoice\Models\ResponseItem;

class Response extends Model
{
    use SoftDeletes;

    protected $table = 'lmc_responses';

    public function items()
    {
        return $this->hasMany('DivineOmega\LaravelMultipleChoice\Models\ResponseItem');
    }

    public static function createFromRequest(Request $request)
    {
        $response = new self;
        $response->save();

        return $response->updateFromRequest($request);
    }

    public function updateFromRequest(Request $request)
    {
        $inputs = $request->all();

        foreach($inputs as $name => $choiceId) {

            if (strpos($name, 'lmc-question-input-')===false) {
                continue;
            }

            $questionId = str_replace('lmc-question-input-', '', $name);
            if (!is_numeric($questionId)) {
                continue;
            }

            $question = Question::FindOrFail($questionId);
            
            if (!is_numeric($choiceId)) {
                continue;
            }

            $choice = Choice::FindOrFail($choiceId);

            $responseItem = ResponseItem::where('response_id', $this->id)->where('question_id', $question->id)->first();

            if (!$responseItem) {
                $responseItem = new ResponseItem;
                $responseItem->response_id = $this->id;
                $responseItem->question_id = $question->id;
            }

            $responseItem->choice_id = $choice->id;
            $responseItem->save();
        }

        return $this;
    }
}