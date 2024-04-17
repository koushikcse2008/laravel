@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Router work:</h3>

<h5 class="font-weight-bold text-primary border-bottom-2px">Install the helper package: </h5>
<p>composer require laravel/helpers</p>

use Illuminate\Support\Facades\Route; <br />
 
Route::get('/greeting', function () {
    return 'Hello World';
});
=================================================== <br />
Route::get($uri, $callback); <br />
Route::post($uri, $callback); <br />
Route::put($uri, $callback); <br />
Route::patch($uri, $callback); <br />
Route::delete($uri, $callback); <br />
Route::options($uri, $callback);
=================================================== <br />
<strong>Route::match(['get', 'post'], '/', function () { </strong> <br />
    // ... <br />
}); <br />
 
Route::any('/', function () { <br />
    // ... <br />
}); <br />
=================================================== <br />
use Illuminate\Http\Request; <br />
<strong>Route::get('/users', function (Request $request) { </strong> <br />
    // ...
}); <br />
=================================================== <br />
Route::redirect('/here', '/there'); <br />
Route::redirect('/here', '/there', 301); <br />
Route::permanentRedirect('/here', '/there'); <br /> <br />

Route::view('/welcome', 'welcome'); <br />
Route::view('/welcome', 'welcome', ['name' => 'Taylor']); <br /> <br />

Route::get('/user/{name?}', function (string $name = null) { <br />
    return $name; <br />
}); <br /> <br />

<strong>Route::get('/user/{name}', function (string $name) { <br />
    // ... <br />
})->where('name', '[A-Za-z]+');</strong> <br /> <br />
 
Route::get('/user/{id}', function (string $id) { <br />
    // ... <br />
})->where('id', '[0-9]+'); <br /> <br />
 
Route::get('/user/{id}/{name}', function (string $id, string $name) { <br />
    // ... <br />
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']); <br /> <br />

Route::get('/user/{id}/{name}', function (string $id, string $name) { <br />
    // ... <br />
})->whereNumber('id')->whereAlpha('name'); <br /> <br />
 
Route::get('/user/{name}', function (string $name) { <br />
    // ... <br />
})->whereAlphaNumeric('name'); <br /> <br />
 
Route::get('/user/{id}', function (string $id) { <br />
    // ... <br />
})->whereUuid('id'); <br />
 
Route::get('/user/{id}', function (string $id) { <br />
    // <br />
})->whereUlid('id'); <br /> <br />
 
Route::get('/category/{category}', function (string $category) { <br />
    // ... <br />
})->whereIn('category', ['movie', 'song', 'painting']); <br /> <br />

Route::pattern('id', '[0-9]+');  //in the boot method <br />
===================================================== <br />
// Generating URLs... <br />
<strong>$url = route('profile');</strong> <br /> <br />
 
// Generating Redirects... <br />
<strong>return redirect()->route('profile');</strong> <br /> <br />
 
return to_route('profile'); <br />
======================================================== <br />
Route::get('/user/{id}/profile', function (string $id) { <br />
    // ... <br />
})->name('profile'); <br /> <br />
 
$url = route('profile', ['id' => 1]); <br /> <br />

<strong>Route::middleware(['first', 'second'])->group(function () { <br />
    Route::get('/', function () { <br />
        // Uses first & second middleware... <br />
    }); <br /> <br />
 
    Route::get('/user/profile', function () { <br />
        // Uses first & second middleware... <br />
    }); <br />
});</strong>
======================================================== <br />
use App\Http\Controllers\OrderController; <br /> <br />
 
<strong>Route::controller(OrderController::class)->group(function () { <br />
    Route::get('/orders/{id}', 'show'); <br />
    Route::post('/orders', 'store'); <br />
});</strong>
======================================================= <br />
Route::domain('{account}.example.com')->group(function () { <br />
    Route::get('user/{id}', function (string $account, string $id) { <br />
        // ... <br />
    }); <br />
}); <br />
======================================================= <br />
Route::prefix('admin')->group(function () { <br />
    Route::get('/users', function () { <br />
        // Matches The "/admin/users" URL <br />
    }); <br />
});



@endsection

