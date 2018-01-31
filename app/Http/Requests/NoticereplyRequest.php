<?php

namespace App\Http\Requests;

class NoticereplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }
}
