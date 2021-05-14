<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('admin/demo_upload');
    }

    public function doUpload(Request $request)
    {
        $file = $request->filesTest;

        $file->move('upload', $file->getClientOriginalName());
        // hàm sẽ trả về đường dẫn mới của file trên server nếu thành công
        // còn nếu không nó sẽ raise ra exception.
    }
}
