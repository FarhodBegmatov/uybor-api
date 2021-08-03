<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createdData()
    {
        return[
            'message' => "Successfully created!",
            'status_code' => '201'
        ];
    }

    public function updatedData()
    {
        return[
            'message' => "Successfully updated!",
            'status_code' => '200'
        ];
    }

    public function deletedData()
    {
        return[
            'message' => "Successfully deleted!",
            'status_code' => '204'
        ];
    }

}
