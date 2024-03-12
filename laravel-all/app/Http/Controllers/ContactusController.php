<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactusController extends Controller
{
    Public function index()
    {
        $data = Contactus::paginate(1);
        return view("code.contactus", compact('data'));
    }
}
