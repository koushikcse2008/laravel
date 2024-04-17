@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Register/Login function work:</h3>

<strong>#1 Register and Login in the same function</strong> <br />  <br />

use Illuminate\Support\Facades\Auth;<br />
use Illuminate\Support\Facades\Hash;<br /><br />

<strong>//Validation</strong><br />
$validated = $request->validate([<br />
            'name' => 'required|string|max:250',<br />
            'email' => 'required|email|max:250|unique:users',<br />
            'password' => 'required|min:4|confirmed'<br />
        ],<br />
        [<br />
            'name.required' => "Please enter your name",<br />
            'email.required' => "Please enter your email id",<br />
            'password.required' => "Please enter your password",<br />
        ]);<br /><br />

<strong>//User Create</strong><br />
User::create([<br />
            'name' => $request->name,<br />
            'email' => $request->email,<br />
            'password' => Hash::make($request->password)<br />
]);<br /><br />

<strong>//Login credential checking</strong><br />
$credentials = $request->only('email', 'password');<br />
/*$credentials = array(<br />
'email' => $request->email,<br />
 	'password' => $request->password<br />
);*/<br /><br />

<strong>//Login credential checking method</strong><br />
Auth::attempt($credentials);<br />
$request->session()->regenerate();<br />
return redirect()->route('user.dashboard')->withSuccess('You have successfully registered & logged in!');<br /><br />

<strong>Errors:</strong><br />


@verbatim
@if ($errors->any())<br />
    @foreach ($errors->all() as $error)<br />
    {{ $error }}<br />
    @endforeach<br />
@endif<br /><br />
@endverbatim



<strong>Below input option:</strong><br />
@verbatim
@error('email')<br />
        {{ $message }}<br />
@enderror
@endverbatim


@endsection

