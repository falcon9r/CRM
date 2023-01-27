<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function MessageAdd(){
        return response()->json([
            'message' => trans('response.add')
        ]);
    }

    protected function MessageUpdate(){
        return response()->json([
            'message' => trans('response.update')
        ]);
    }

    protected function MessageDelete(){
        return response()->json([
            'message' => trans('response.delete')
        ]);
    }
}
