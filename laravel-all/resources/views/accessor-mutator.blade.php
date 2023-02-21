@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the accessor / mutators work:</h3>
<p>Listed below points to implement accessor / mutators in laravel 8:</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to implement accessor:</h4>
<p>1. Open model and write below code.</p>
<p>2. public function getEmailAttribute($value)</p>
<p>3. { return ucwords($value); }</p>
<p>4. That's all for the accessor.</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to implement a mutator:</h4>
<p>1. Open model and write below code.</p>
<p>2. public function setEmailAttribute($value)</p>
<p>3. { $this->attributes["email"] = ucwords($value); }</p>
<p>4. That's all for the mutator.</p>

@endsection

