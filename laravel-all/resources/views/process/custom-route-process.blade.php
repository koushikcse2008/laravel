@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Image Upload function work:</h3>

# Step 1: Open Route Service Provider file within app/provider: <br />
    public function map() <br />
    { <br />
        $this->mapApiRoutes(); <br />
        $this->mapWebRoutes(); <br /> 
        $this->mapAdminRoutes();  <br />
        $this->mapManagerRoutes(); <br />
    } <br /> <br />

    /** <br />
     * Define the "web" routes for the application. <br />
     * These routes all receive session state, CSRF protection, etc. <br />
     * @return void <br />
     */ <br />
    protected function mapWebRoutes() <br />
    { <br />
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php')); <br />
    } <br />

    /** <br />
     * Define the "api" routes for the application. <br />
     * These routes are typically stateless. <br />
     * @return void <br />
     */
    protected function mapApiRoutes() <br />
    { <br />
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php')); <br />
    } <br /> <br />


    /** <br />
     * Define the "admin" routes for the application. <br />
     * These routes are typically stateless. <br />
     * @return void <br />
     */ <br />
    protected function mapAdminRoutes() <br />
    { <br />
        Route::prefix('admin') <br />
            ->namespace($this->namespace) <br />
            ->group(base_path('routes/admin.php')); <br />
    } <br /> <br />

    /** <br />
     * Define the "user" routes for the application. <br />
     * These routes are typically stateless. <br />
     * @return void <br />
     */ <br />
    protected function mapManagerRoutes() <br />
    { <br />
        Route::prefix('manager') <br />
            ->namespace($this->namespace) <br />
            ->group(base_path('routes/user.php')); <br />
    } <br /> <br />

#Step 2: We can use route as below: <br />
#1 http://localhost:8000/ <br />
#2 http://localhost:8000/manager/* <br />
#3 http://localhost:8000/admin/* <br />




@endsection

