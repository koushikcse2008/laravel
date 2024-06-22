@extends('layouts.common')

@section('title', 'DB Seeder')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the DB seeder function work:</h3>

<strong>#1 Create faker seeder process as you san see in other links</strong> <br />  <br />

<strong>#2 Open DatabaseSeeder.php and write below code in the run() section:</strong>  <br />
<xmp>
    @verbatim
use Database\Seeders\ProductSeeder;  

//Within run() write the below code 
$this->call([ 
            ProductSeeder::class 
]);  
@endverbatim
</xmp>
<br />
<strong>#3 Run the below command and check the result:</strong>  <br />
php artisan db:seed <br />

@endsection

