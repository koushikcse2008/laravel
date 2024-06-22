@extends('layouts.common')

@section('title', 'Mail Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the sending mail work:</h3><br /><br />

<strong>Sending Email using View files:</strong><br /><br />
<xmp>
@verbatim
First configure the SMTP in .env file:

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=9b83a92a6c1341
MAIL_PASSWORD=7f9a93135feb29
MAIL_ENCRYPTION=tls

<strong>Create mail file using cmd:</strong>
$php artisan make:mail TestLocalMail

Edit the file as below:
public $name;
public $email;
public $subject;
public $body; 

/**
* Create a new message instance.
*
* @return void
*/
public function __construct($name, $email, $subject, $body)
{
    $this->name = $name;
    $this->email = $email;
    $this->subject = $subject;
    $this->body = $body;
}

/**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    //return $this->view('view.name');

    return $this->view('email.test-local-email')
                ->from('koushikcse20081@gmail.com', 'Koushik Kumar Rudra 1')
                ->subject($this->subject); 
}

<strong>Create a view file use this variable:</strong>
Here is the html content for the test email.  $name  $email  $subject  $body

<strong>Create a route and call the mail function from the controller method:</strong>
\Mail::to('koushikcse2008@gmail.com')->send(new \App\Mail\TestLocalMail("Koushik Kumar Rudra", "koushikcse2008@gmail.com", "This is for testing email using smtp", "This is body content"));

@endverbatim
</xmp>

@endsection

