@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Event Listeners function work:</h3>

What is An Event? <br />
Events are the ways we hook into the activities of our application, it is just a way to observe an activity, for instance, login, a class can be created to monitor the activity of login, when a user logs in, the event class can execute some functions. <br /> <br />

What is A Listener?  <br /> <br />

A Listener is a class that listens to the events that they are mapped to and execute a task, that is they are the ones that perform a given task for an event. <br /> <br />

Let me illustrate, you might want to send a welcome email to a new user of your application, and also assign a role to the user based on the information provided in the registration, etc, you would not want to do all those in the RegisterController because that we violate the first principle of SOLID, where the Controller will perform more than one task, the RegisterController needs to only perform the activity of registration of a new user. so an event needs to be carried out in the process of registration, where assigning a role, sending an email, etc are the individual listeners under the event. <br /> <br />

For this article, I will write one listener in an event, what the listener will do is to store the login of each user of the app in a table, this is just an illustration that will show you how it works. <br /> <br />
If you have a laravel project that has auth already, you can follow immediately, or you can follow my article Basic Laravel Login and Registration using Laravel Breeze, I will be using the project on that article from my system. <br /> <br />

#Step 1: Open App/Providers/EventServiceProvider.php file within $listen:  <br />
use App\Events\LoginHistory; <br />
use App\Listeners\StoreUserLoginHistory; <br /> <br />

LoginHistory::class => [ <br />
            StoreUserLoginHistory::class, <br />
], <br /> <br />

#Step 2: Generate an Event:  <br />
php artisan make:event LoginHistory <br /> <br />

#Step 3: Write the below code in App/Events/LoginHistory.php: <br />
public $user; <br />
public function __construct($user) <br />
{ <br />
     $this->user = $user; <br />
} <br /> <br />

#Step 4: Generate a Listener : <br />
php artisan make:listener StoreUserLoginHistory <br />
#Step 5: Open  the Listener file App/Listener/StoreUserLoginHistory.php : <br />
use Illuminate\Support\Facades\DB; <br />
use Carbon\Carbon; <br /> <br />

public function handle(LoginHistory $event) <br />
    { <br />
        $current_timestamp = Carbon::now()->toDateTimeString(); <br />
        $userinfo = $event->user; <br />
        $saveHistory = DB::table('login_history')->insert( <br />
            [ <br />
		'name' => $userinfo->name,  <br />
		'email' => $userinfo->email, <br />
		 'created_at' => $current_timestamp, <br /> 
		'updated_at' => $current_timestamp <br />
           ] <br />
        ); <br />
        return $saveHistory; <br />
    } <br /> <br />

#Step 6: Create migration for login history: <br />
php artisan make:migration create_login_history_table --create=login_history <br /> <br />

$table->name(‘name’,  50); <br />
$table->email(‘name’,  50); <br /> <br />

#Step 7: Run the migration file: <br />
php artisan migrate <br /> <br />

#Step 8: Dispatch the Event: <br />
use App\Events\LoginHistory; <br />
protected function authenticated() { <br />
        $user = Auth::user(); <br />
        event(new LoginHistory($user)); <br />
} 


@endsection

