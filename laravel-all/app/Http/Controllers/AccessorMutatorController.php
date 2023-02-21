<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessorMutator;

class AccessorMutatorController extends Controller
{
    public function index() {

        $addData = new AccessorMutator;
        $addData->uname = "john doe";
        $addData->email = "john1@gmail.com";
        $addData->subject = "Test Contact";
        $addData->message = "Test Message";
        //$addData->save();
        
        //$data = AccessorMutator::all();
        //return $data;

        return view('accessor-mutator');
    }
}
