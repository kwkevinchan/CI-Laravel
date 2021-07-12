<?php
defined('BASEPATH') or exit('No direct script access allowed');

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class Home extends BaseController
{
    public function index_get()
    {
        $request = Request::capture();
        // dd($request);
        $return = $request->all();

        return $this->response($return, 200);
    }

    public function post_post()
    {
        $request = Request::capture();
        // dd($request);
        $return = $request->all();

        return $this->response($return, 200);
    }
}
