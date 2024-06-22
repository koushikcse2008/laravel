@extends('layouts.common')

@section('title', 'Custom Artisan Commands')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Custom Artisan Command function work:</h3>

<strong># Step 1: Generate Artisan Command:</strong>
<xmp>
php artisan make:command CreateUsers
</xmp> <br /><br />

<strong># Step 2: Artisan Command Body:</strong><br /><br />
<xmp>
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\User;
class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Dummy Users for your App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $numberOfUsers = $this->argument('count');
        for ($i = 0; $i < $numberOfUsers; $i++) { 
            User::factory()->create();
        }  
        return 0;
    }
}
</xmp>
<br />
<strong># Step 3: Run the command:</strong> <br />
php artisan create:users 10 <br />
php artisan create:users 7<br /><br />

======================================================================================= <br /><br />

<strong># Step 1: Generate Artisan Command:</strong>
<xmp>
php artisan make:command checkUser
</xmp> <br />

<strong># Step 2: Artisan Command Body:</strong>
<xmp>
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class checkUser extends Command
{
    /**
        * The name and signature of the console command.
        *
        * @var string
        */
    protected $signature = 'check:user {email}';

    /**
        * The console command description.
        *
        * @var string
        */
    protected $description = 'This command is used to check whether an email address exists in the database or not.';

    /**
        * Create a new command instance.
        *
        * @return void
        */
    public function __construct()
    {
        parent::__construct();
    }

    /**
        * Execute the console command.
        *
        * @return int
        */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        if ($user)
        {
            $this->info("User is exist");
        }
        else
        {
            $this->info("User not exist");
        }
        return 0;
    }
}
</xmp>
<br />
<strong># Step 3: Run the command:</strong> <br />
php artisan check:user test@email.com <br />
php artisan check:user demo@email.com
@endsection



