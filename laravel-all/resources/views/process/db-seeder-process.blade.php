@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the DB seeder function work:</h3>

#1 Create faker seeder process as you san see in other links <br />  <br />

#2 Open DatabaseSeeder.php and write below code in the run() section:  <br />
use Database\Seeders\ProductSeeder; <br /> <br />

//Within run() write the below code <br />
$this->call([ <br />
            ProductSeeder::class <br />
]); <br /> <br />

#3 Run the below command and check the result:  <br />
php artisan db:seed <br />



@endsection

