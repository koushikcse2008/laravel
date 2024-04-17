@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Custom Artisan Command function work:</h3>

<strong># Step 1: Generate Artisan Command:</strong> <br />
php artisan make:command CreateUsers <br />
protected $signature = 'create:users {count}'; <br />
protected $description = 'Create Dummy Users for your App'; <br /> <br />

//Within handle() <br />
$numberOfUsers = $this->argument('count'); <br />
for ($i = 0; $i < $numberOfUsers; $i++) { <br />
User::factory()->create(); <br />
} <br />
return 0; <br /> <br />

<strong># Step 2: Run the command:</strong> <br />
php artisan create:users 10 <br />
php artisan create:users 7




@endsection

