@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the master layout work:</h3>
<p>Listed below points to implement master layout in laravel 8:</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to create master layout:</h4>
<p>1. Create a folder named "layouts" within "resources/views".</p>
<p>2. Create a file name say common.blade.php, head.blade.php, header.blade.php, footer.blade.php</p>
<p>3. To include a file, use @ include('layouts.head'), @ include('layouts.header'), @ include('layouts.footer') </p>
<p>4. Inlude @ yield('content') in the common.blade.php</p>

<h4 class="font-weight-bold text-primary border-bottom-2px">Steps to use in the view files:</h4>
<p>1. Extends the master layout first in the view file like @ extends('layouts.common')</p>
<p>2. Then write all the content within the @ section('content')  and @ endsection.</p>
<p>3. That's all for the master template integration.</p>

@endsection

