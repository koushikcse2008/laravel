@extends('layouts.common')

@section('title', 'Multiple Route')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Multiple route work:</h3>

<strong>Easiest Method:</strong><br /><br />
<xmp>
@verbatim
public function boot()
{
    $this->configureRateLimiting();

    $this->routes(function () {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/user.php'));
    });
}
@endverbatim
</xmp>
    
    <br />
<strong>Within routes\user.php file:</strong><br />
use Illuminate\Support\Facades\Route;<br /><br />

<strong>Another Way:</strong><br />
<xmp>
@verbatim
Open the app\Providers\RouteServiceProvider.php file:
protected $namespace = 'App\Http\Controllers';
protected $namespaceApi = 'App\Http\Controllers\Api';

public function boot()
{
    $this->configureRateLimiting();
    parent::boot();
}

public function map()
{
   $this->mapApiRoutes();
   $this->mapWebRoutes();
   $this->mapUserRoutes();
}

protected function mapApiRoutes()
{
Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
}

protected function mapWebRoutes()
{
    Route::middleware('web')
           ->namespace($this->namespace)
           ->group(base_path('routes/web.php'));
}

protected function mapUserRoutes()
{
    Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/user.php'));
}
@endverbatim
</xmp>

@endsection

