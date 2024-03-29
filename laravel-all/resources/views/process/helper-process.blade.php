@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Helper function work:</h3>

#1 Install the helper package: <br />
composer require laravel/helpers <br /> <br />

#2 Folder and File Creation:  <br />
Within “app” folder, Create a folder named “Helpers” and create a file named “Helper.php”. <br /> <br />

#3 Helper.php file contains: <br />

namespace App\Helpers; <br />
use Illuminate\Support\Facades\DB; <br />
use App\Models\User; <br /> <br />

class Helper  {<br />
    public static function HelloText()  { <br />
        return "Hello World!!"; <br />
    } } <br /> <br />



#4 Open Composer and write below code with “autoload function” <br />
"files": [ "app/Helpers/Helper.php" ] <br /> <br />


#5 Run the below command: <br />
composer dump-autoload  <br /> <br />

#6 Use in the controller and blade files <br />
In the controller: <br />
use App\Helpers\Helper; <br /> <br />

$hello = Helper::HelloText(); <br />
dd($hello); <br /> <br />


In the blade files: <br />
$hello  



@endsection

