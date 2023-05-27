@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Pagination function work:</h3>

#1 In the controller method write below code: <br />
Product::paginate(5); <br /> <br />

#2 In the View file write below code:  <br />
$data->links() <br /> <br />

#3 In the AppServiceProvider file write below code:  <br />
use Illuminate\Pagination\Paginator; <br />
Paginator::useBootstrap();  //within boot() <br /> <br />

#4 More Option in blade file:  <br />
If you need advance used of pagination then you can see bellow how to use. <br /> <br />

Pagination with appends parameter <br />
$data->appends(['sort' => 'votes'])->links() <br /> <br />

Pagination with appends request all parameters <br />
$data->appends(Request::all())->links()


@endsection

