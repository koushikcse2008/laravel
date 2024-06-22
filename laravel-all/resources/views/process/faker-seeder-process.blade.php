@extends('layouts.common')

@section('title', 'Faker Seeder')

@section('content')
<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Faker Seeder function work:</h3>
<xmp>
@verbatim
<strong>#1 Create seeder file using below command:</strong> 
php artisan make:seeder ProductSeeder  

<strong>#2 Write below code within seeder file inside run():</strong>  
use Illuminate\Support\Facades\DB; 
$faker = \Faker\Factory::create(); 
for($i=1; $i<=10; $i++) { 
            DB::table('posts')->insert([ 
                "title" => $faker->name(), 
                "details" => $faker->text(), 
                "post_date" => $faker->date("Y-m-d"), 
                "post_status" => 'active', 
            ]); 
}  

<strong>#3 Run the seeder file:</strong>  
php artisan db:seed --class=ProductSeeder

@endverbatim
</xmp>

<style>
xmp { margin-top: -30px; }
</style>

@endsection

