<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseValidationRequest;

class StorageRequest extends BaseValidationRequest
{
    public function rules()
    {
        return [
            'image' => [
                'required',
                'image',
            ],
        ];
    }
}
