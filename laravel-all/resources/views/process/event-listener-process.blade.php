@extends('layouts.common')

@section('title', 'Event Listener')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Event Listeners function work:</h3>


<strong>What is An Event?</strong> <br />
Events are the ways we hook into the activities of our application, it is just a way to observe an activity, for instance, login, a class can be created to monitor the activity of login, when a user logs in, the event class can execute some functions. <br /> <br />

<strong>What is A Listener?</strong>  <br /> 
A Listener is a class that listens to the events that they are mapped to and execute a task, that is they are the ones that perform a given task for an event. <br /> <br />
Let me illustrate, you might want to send a welcome email to a new user of your application, and also assign a role to the user based on the information provided in the registration, etc, you would not want to do all those in the RegisterController because that we violate the first principle of SOLID, where the Controller will perform more than one task, the RegisterController needs to only perform the activity of registration of a new user. so an event needs to be carried out in the process of registration, where assigning a role, sending an email, etc are the individual listeners under the event. <br /> <br />
For this article, I will write one listener in an event, what the listener will do is to store the login of each user of the app in a table, this is just an illustration that will show you how it works. <br /> <br />
If you have a laravel project that has auth already, you can follow immediately, or you can follow my article Basic Laravel Login and Registration using Laravel Breeze, I will be using the project on that article from my system. <br /> <br />
<strong>#Step 1: Open App/Providers/EventServiceProvider.php file within $listen:</strong>  
<xmp>
    @verbatim
use App\Events\LoginHistory; 
use App\Listeners\StoreUserLoginHistory;  

LoginHistory::class => [ 
            StoreUserLoginHistory::class, 
],  

@endverbatim
</xmp>
<strong>#Step 2: Generate an Event:</strong>  
<xmp>
    @verbatim
php artisan make:event LoginHistory <br /> <br />
@endverbatim
</xmp>
<br />
<strong>#Step 3: Write the below code in App/Events/LoginHistory.php:</strong> 
<xmp>
    @verbatim
public $user; <br />
public function __construct($user) <br />
{ <br />
     $this->user = $user; <br />
} 
@endverbatim
</xmp>
<br />
<strong>#Step 4: Generate a Listener :</strong> 
<xmp>
    @verbatim
php artisan make:listener StoreUserLoginHistory 
@endverbatim
</xmp>
<br />
<strong>#Step 5: Open  the Listener file App/Listener/StoreUserLoginHistory.php : </strong>
<xmp>
    @verbatim
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;  

public function handle(LoginHistory $event) 
    { 
        $current_timestamp = Carbon::now()->toDateTimeString(); 
        $userinfo = $event->user; 
        $saveHistory = DB::table('login_history')->insert( 
            [ 
		'name' => $userinfo->name,  
		'email' => $userinfo->email, 
		 'created_at' => $current_timestamp,  
		'updated_at' => $current_timestamp 
           ] 
        ); 
        return $saveHistory; 
    }  
    @endverbatim
</xmp>
<br />
<strong>#Step 6: Create migration for login history:</strong> 
<xmp>
    @verbatim
php artisan make:migration create_login_history_table --create=login_history  

$table->name(‘name’,  50); 
$table->email(‘name’,  50);  
@endverbatim
</xmp>
<br />
<strong>#Step 7: Run the migration file:</strong> 
<xmp>
    @verbatim
php artisan migrate  
@endverbatim
</xmp>
<br />
<strong>#Step 8: Dispatch the Event:</strong> <br />
<xmp>
    @verbatim
use App\Events\LoginHistory; 
protected function authenticated() { 
        $user = Auth::user(); 
        event(new LoginHistory($user)); 
} 

@endverbatim
</xmp>
@endsection

