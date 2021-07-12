<?php
defined('BASEPATH') or exit('No direct script access allowed');

use App\Http\Controllers\BaseController;
use App\Http\Requests\StorageRequest;
use League\Flysystem\Local\LocalFilesystemAdapter as Adapter;
use League\Flysystem\Filesystem;

class Storage extends BaseController
{
    public function test_post()
    {
        $request = StorageRequest::capture();
        $validate = $request->validate();
        if (!$validate) {
            return $this->response('The given data was invalid.', 422);
        }

        $adapter = new Adapter(
            // Determine root directory
            FCPATH . 'public/'
        );
        $filesystem = new Filesystem($adapter);

        $filesystem->write('test.jpg', $request->image);

        $return = [
            'pass',
        ];
        
        return $this->response($return, 200);
    }
}
