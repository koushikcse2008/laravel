@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Middleware work:</h3>

<strong>Step 1: Create middleware using cli</strong><br />
php artisan make:middleware  GeneralMiddleware<br /><br />

<strong>Step 2: Add middleware in Kernel (App\Http\Kernel.php)  within  protected $routeMiddleware { }</strong><br />
'general' => \App\Http\Middleware\GeneralMiddleware::class,<br /><br />

<strong>Step 3: Add this middleware in the route</strong><br />
Route::get('/login', 'CustomLoginController@login')->middleware('general');<br /><br />

Route::middleware(['first', 'second'])->group(function () {<br /><br />
    Route::get('/dashboard', function () {<br />
    // Uses first & second middleware...<br />
    });<br /><br />
    
    Route::get('/user/profile', function () {<br />
    // Uses first & second middleware...<br />
    });<br /><br />
});

@endsection

