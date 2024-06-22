@extends('layouts.common')

@section('title', 'Register Login')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Register/Login function work:</h3>

<strong>#1 Register and Login in the same function</strong> <br />  <br />

<xmp>
@verbatim    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

$validated = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:4|confirmed'
        ],
        [
            'name.required' => "Please enter your name",
            'email.required' => "Please enter your email id",
            'password.required' => "Please enter your password",
        ]);

User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
]);

$credentials = $request->only('email', 'password');
/*$credentials = array(
'email' => $request->email,
 	'password' => $request->password
);*/

Auth::attempt($credentials);
$request->session()->regenerate();
return redirect()->route('user.dashboard')->withSuccess('You have successfully registered & logged in!');

@endverbatim
</xmp>
<strong>Errors:</strong><br />

<xmp>
@verbatim
@if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
@endif
@endverbatim
</xmp>

<br />
<strong>Below input option:</strong><br />
<xmp>
@verbatim
@error('email')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror
@endverbatim
</xmp>


@endsection

