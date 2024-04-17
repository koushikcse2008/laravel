@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Multiple route work:</h3>

<strong>Easiest Method:</strong><br /><br />
public function boot()<br />
{<br />
    $this->configureRateLimiting();<br /><br />

    $this->routes(function () {<br />
        Route::prefix('api')<br />
            ->middleware('api')<br />
            ->namespace($this->namespace)<br />
            ->group(base_path('routes/api.php'));<br /><br />

        Route::middleware('web')<br />
            ->namespace($this->namespace)<br />
            ->group(base_path('routes/web.php'));<br /><br />

        Route::middleware('web')<br />
            ->namespace($this->namespace)<br />
            ->group(base_path('routes/user.php'));<br />
    });<br /><br />
}<br /><br />

<strong>Within routes\user.php file:</strong><br />
use Illuminate\Support\Facades\Route;<br /><br />

<strong>Another Way:</strong><br />
Open the app\Providers\RouteServiceProvider.php file:<br />
protected $namespace = 'App\Http\Controllers';<br />
protected $namespaceApi = 'App\Http\Controllers\Api';<br /><br />

public function boot()<br />
{<br />
    $this->configureRateLimiting();<br />
    parent::boot();<br />
}<br /><br />

public function map()<br />
{<br />
   $this->mapApiRoutes();<br />
   $this->mapWebRoutes();<br />
   $this->mapUserRoutes();<br />
}<br /><br />

protected function mapApiRoutes()<br />
{<br />
Route::prefix('api')<br />
             ->middleware('api')<br />
             ->namespace($this->namespace)<br />
             ->group(base_path('routes/api.php'));<br />
}<br /><br />

protected function mapWebRoutes()<br />
{<br />
    Route::middleware('web')<br />
           ->namespace($this->namespace)<br />
           ->group(base_path('routes/web.php'));<br />
}<br /><br />

protected function mapUserRoutes()<br />
{<br />
    Route::middleware('web')<br />
             ->namespace($this->namespace)<br />
             ->group(base_path('routes/user.php'));<br />
}


@endsection

