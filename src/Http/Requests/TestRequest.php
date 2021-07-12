<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseValidationRequest;

class TestRequest extends BaseValidationRequest
{
    public function rules()
    {
        return [
            'mail' => [
                'required',
                'string',
                'min:1',
            ],
            'password' => [
                'required',
                'string',
                'min:1',
            ],
        ];
    }
}
