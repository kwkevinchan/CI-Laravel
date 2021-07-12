<?php
defined('BASEPATH') or exit('No direct script access allowed');

use App\Http\Controllers\BaseController;
use App\Http\Requests\TestRequest;

class Validation extends BaseController
{
    public function test_post()
    {
        $request = TestRequest::capture();
        $validate = $request->validate();

        if (!$validate) {
            return $this->response('The given data was invalid.', 422);
        }
        // dd($request);

        $return = [
            'pass',
        ];
        
        return $this->response($return, 200);
    }
}
