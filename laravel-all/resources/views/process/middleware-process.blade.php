@extends('layouts.common')

@section('title', 'Middleware Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Middleware work:</h3>

<strong>Step 1: Create middleware using cli</strong><br />
php artisan make:middleware  GeneralMiddleware<br /><br />

<strong>Step 2: Add middleware in Kernel (App\Http\Kernel.php)  within  protected $routeMiddleware { }</strong><br />
'general' => \App\Http\Middleware\GeneralMiddleware::class,<br /><br />

<strong>Step 3: Add this middleware in the route</strong><br />
<xmp>
@verbatim
Route::get('/login', 'CustomLoginController@login')->middleware('general');

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/dashboard', function () {
    // Uses first & second middleware...
    });
    
    Route::get('/user/profile', function () {
    // Uses first & second middleware...
    });
});
@endverbatim
</xmp>

@endsection

