<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class HelperController extends Controller
{
    public function index(){
        $helper = Helper::getMessage();
        return $helper;
    }
}
