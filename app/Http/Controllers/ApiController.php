<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ApiController extends Controller
{
    //
    public function getThings(){
        $things = App\Test::all();
        return response(json_encode($things),200);
    }
}
