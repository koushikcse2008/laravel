@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Send Email  function work:</h3>

# Steps 1: <br />
php artisan make:mail NotifyMail <br />
return $this->view('view.name'); <br />
to <br />
return $this->view('emails.demoMail'); <br /> <br />

# Step 2 – Add Send Email Route: <br />
use App\Http\Controllers\SendEmailController; <br />
Route::get('send-email', [SendEmailController::class, 'index']); <br /> <br />

# Step 3 – Create Directory And Blade View: <br />
Create an demoMail.blade.php blade view file inside resources/views/emails directory. <br />
<h5>This is test mail from Tutsmake.com</h5> 
<p>Laravel 8 send email example</p> <br /> 

# Step 4 – Create Send Email Controller: <br />
php artisan make:controller SendEmailController <br /> <br />

use Mail; <br />
use App\Mail\NotifyMail; <br />

Mail::to('koushikcse2008@gmail.com')->send(new NotifyMail()); <br />
if (Mail::failures()) { <br />
    return response()->json(['status' => 'error', 'message' => 'Sorry! Please try again latter']); <br />
} else { <br />
    return response()->json(['status' => 'success', 'message' => 'Great! Successfully send in your mail']); <br />
}



@endsection

