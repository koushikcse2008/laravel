@extends('layouts.common')

@section('title', 'Custom Route')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Custom multiple Route work:</h3>

<strong># Step 1: Open Route Service Provider file within app/provider:</strong> <br />
<xmp>
    @verbatim
    public function map() 
    { 
        $this->mapApiRoutes(); 
        $this->mapWebRoutes();  
        $this->mapAdminRoutes();  
        $this->mapManagerRoutes(); 
    }  

    /** 
     * Define the "web" routes for the application. 
     * These routes all receive session state, CSRF protection, etc. 
     * @return void 
     */ 
    protected function mapWebRoutes() 
    { 
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php')); 
    } 

    /** 
     * Define the "api" routes for the application. 
     * These routes are typically stateless. 
     * @return void 
     */
    protected function mapApiRoutes() 
    { 
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php')); 
    }  


    /** 
     * Define the "admin" routes for the application. 
     * These routes are typically stateless. 
     * @return void 
     */ 
    protected function mapAdminRoutes() 
    { 
        Route::prefix('admin') 
            ->namespace($this->namespace) 
            ->group(base_path('routes/admin.php')); 
    }  

    /** 
     * Define the "user" routes for the application. 
     * These routes are typically stateless. 
     * @return void 
     */ 
    protected function mapManagerRoutes() 
    { 
        Route::prefix('manager') 
            ->namespace($this->namespace) 
            ->group(base_path('routes/user.php')); 
    }  

    @endverbatim
</xmp>

    <strong>#Step 2: We can use route as below:</strong> <br />
#1 http://localhost:8000/ <br />
#2 http://localhost:8000/manager/* <br />
#3 http://localhost:8000/admin/* <br />




@endsection

