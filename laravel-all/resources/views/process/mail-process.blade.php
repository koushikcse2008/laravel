@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the sending mail work:</h3><br /><br />

<strong>Sending Email using View files:</strong><br /><br />

First configure the SMTP in .env file:<br />
MAIL_MAILER=smtp<br />
MAIL_HOST=sandbox.smtp.mailtrap.io<br />
MAIL_PORT=2525<br />
MAIL_USERNAME=9b83a92a6c1341<br />
MAIL_PASSWORD=7f9a93135feb29<br />
MAIL_ENCRYPTION=tls<br /><br />

<strong>Create mail file using cmd:</strong><br />
$php artisan make:mail TestLocalMail<br /><br />

Edit the file as below:<br />
public $name;<br />
public $email;<br />
public $subject;<br />
public $body; <br /><br />

/**<br />
* Create a new message instance.<br />
*<br />
* @return void<br />
*/<br />
public function __construct($name, $email, $subject, $body)<br />
{<br />
    $this->name = $name;<br />
    $this->email = $email;<br />
    $this->subject = $subject;<br />
    $this->body = $body;<br />
}<br /><br />

/**<br />
 * Build the message.<br />
 *<br />
 * @return $this<br />
 */<br />
public function build()<br />
{<br />
    //return $this->view('view.name');<br /><br />

    return $this->view('email.test-local-email')<br />
                ->from('koushikcse20081@gmail.com', 'Koushik Kumar Rudra 1')<br />
                ->subject($this->subject); <br />
}<br /><br />

<strong>Create a view file use this variable:</strong><br />
Here is the html content for the test email. <br /> $name <br /> $email <br /> $subject <br /> $body<br /><br />

<strong>Create a route and call the mail function from the controller method:</strong><br />
\Mail::to('koushikcse2008@gmail.com')->send(new \App\Mail\TestLocalMail("Koushik Kumar Rudra", "koushikcse2008@gmail.com", "This is for testing email using smtp", "This is body content"));



@endsection

