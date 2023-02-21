@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the migration work:</h3>
<p>Listed below points to implement db migration in laravel 8:</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to create db migration:</h4>
<p>1. Open cli command and run the below command.</p>
<p>2. php artisan make:migration create_tbl_contacts_table --create=tbl_contacts</p>
<p>3. Modify the table columns according to your needs</p>
<p>4. Run the cli command $php artisan migrate</p>
<p>5. That's all for the migration.</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to add a column to a existing table:</h4>
<p>1. Open cli command and run the below command.</p>
<p>2. php artisan make:migration add_source_to_tbl_contacts_table --table=tbl_contacts</p>
<p>3. Modify the table columns according to your needs</p>
<p>4. Run the cli command $php artisan migrate</p>
<p>5. That's all for the migration.</p>

@endsection

