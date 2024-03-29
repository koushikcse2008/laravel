@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Faker Seeder function work:</h3>

#1 Create seeder file using below command: <br />
php artisan make:seeder ProductSeeder <br /> <br />

#2 Write below code within seeder file inside run():  <br />
use Illuminate\Support\Facades\DB; <br />
$faker = \Faker\Factory::create(); <br />
for($i=1; $i<=10; $i++) { <br />
            DB::table('posts')->insert([ <br />
                "title" => $faker->name(), <br />
                "details" => $faker->text(), <br />
                "post_date" => $faker->date("Y-m-d"), <br />
                "post_status" => 'active', <br />
            ]); <br />
} <br /> <br />

#3 Run the seeder file:  <br />
php artisan db:seed --class=ProductSeeder



@endsection

