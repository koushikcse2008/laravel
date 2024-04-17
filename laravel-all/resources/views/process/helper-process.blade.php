@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Helper function work:</h3>

<strong>#1 Install the helper package:</strong> <br />
composer require laravel/helpers <br /> <br />

<strong>#2 Folder and File Creation:</strong>  <br />
Within “app” folder, Create a folder named “Helpers” and create a file named “Helper.php”. <br /> <br />

<strong>#3 Helper.php file contains:</strong> <br />

namespace App\Helpers; <br />
use Illuminate\Support\Facades\DB; <br />
use App\Models\User; <br /> <br />

class Helper  {<br />
    public static function HelloText()  { <br />
        return "Hello World!!"; <br />
    } } <br /> <br />



<strong>#4 Open Composer and write below code with “autoload function”</strong> <br />
"files": [ "app/Helpers/Helper.php" ] <br /> <br />


<strong>#5 Run the below command:</strong> <br />
composer dump-autoload  <br /> <br />

<strong>#6 Use in the controller and blade files</strong> <br />
In the controller: <br />
use App\Helpers\Helper; <br /> <br />

$hello = Helper::HelloText(); <br />
dd($hello); <br /> <br />


In the blade files: <br />
$hello  <br /><br />

=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=* <br /><br />

<strong>Some more configuration:</strong> <br /><br />

<strong>Folder and File Creation:</strong>  <br />
Within “app” folder, Create a folder named “Helpers” and create a file named “Helper.php”. <br /> <br />

<strong>Helper File:</strong><br /><br />

namespace App\Helpers; <br />
use Auth; <br />
use Illuminate\Support\Facades\DB; <br /><br />

class Helper <br />
{ <br />
    public static function test_helper()  <br />
    { <br />
       return 'Hello'; <br />
    } <br />
} <br /><br />

<strong>In the config\app.php,</strong> <br />
'Helper' => App\Helpers\Helper::class,<br /><br />

<strong>In the controller, you have to use in the top:</strong><br />
use Helper;<br />
Helper::test_helper();<br />




@endsection

