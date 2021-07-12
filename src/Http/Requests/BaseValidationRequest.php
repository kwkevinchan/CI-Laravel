<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Translation\Translator;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Validation\ValidationException;

abstract class BaseValidationRequest extends Request
{
    public function rule(): array
    {
        return [];
    }

    public function validate(): bool
    {
        $translator = new Translator(
            (new ArrayLoader()),
            'en' // locale
        );

        $validate = (new Validator(
            $translator,
            $this->all(),
            $this->rules()
        ));

        try {
            $validate->validate();
            return true;
        } catch (ValidationException $e) {
            return false;
        }
    }
}
