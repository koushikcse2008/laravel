@extends('layouts.common')

@section('title', 'Helper Functions')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Helper function work:</h3>

<xmp>
@verbatim
<strong>#1 Install the helper package:</strong> 
composer require laravel/helpers  

<strong>#2 Folder and File Creation:</strong>  
Within “app” folder, Create a folder named “Helpers” and create a file named “Helper.php”.  

<strong>#3 Helper.php file contains:</strong> 

namespace App\Helpers; 
use Illuminate\Support\Facades\DB; 
use App\Models\User;  

class Helper  {
    public static function HelloText()  { 
        return "Hello World!!"; 
    } }  



<strong>#4 Open Composer and write below code with “autoload function”</strong> 
"files": [ "app/Helpers/Helper.php" ]  


<strong>#5 Run the below command:</strong> 
composer dump-autoload   

<strong>#6 Use in the controller and blade files</strong> 
In the controller: 
use App\Helpers\Helper;  

$hello = Helper::HelloText(); 
dd($hello);  


In the blade files: 
$hello  

=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=* 

<strong>Some more configuration:</strong> 

<strong>Folder and File Creation:</strong>  
Within “app” folder, Create a folder named “Helpers” and create a file named “Helper.php”.  

<strong>Helper File:</strong>

namespace App\Helpers; 
use Auth; 
use Illuminate\Support\Facades\DB; 

class Helper 
{ 
    public static function test_helper()  
    { 
       return 'Hello'; 
    } 
} 

<strong>In the config\app.php,</strong> 
'Helper' => App\Helpers\Helper::class,

<strong>In the controller, you have to use in the top:</strong>
use Helper;
Helper::test_helper();

@endverbatim
</xmp>


@endsection

