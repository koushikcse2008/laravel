@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the database work:</h3>
<p>Listed below points to implement db setup in laravel 8:</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to connect with db:</h4>
<p>1. Create a db using phpmyadmin.</p>
<p>2. Open the .env file and look for DB_DATABASE, DB_USERNAME and DB_PASSWORD</p>
<p>3. Change the credential for the above details</p>
<p>4. Run the cli command $php artisan migrate</p>


@endsection

