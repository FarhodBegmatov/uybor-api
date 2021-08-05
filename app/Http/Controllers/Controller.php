<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createdData(array $data)
    {
        return [
            'message' => "Successfully created!",
            'status_code' => '201',
            'data'=>$data
        ];
    }

    public function updatedData(array $data)
    {
        return[
            'message' => "Successfully updated!",
            'status_code' => '200',
            'data'=>$data
        ];
    }

    public function deletedData()
    {
        return[
            'message' => "Successfully deleted!",
            'status_code' => '204'
        ];
    }

    public function messageNotAllowedTo()
    {
        return [
            'message' => 'You don`t have a permission!'
        ];
    }

}
