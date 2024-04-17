@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Pagination function work:</h3>

<strong>#1 In the controller method write below code:</strong> <br />
Product::paginate(5); <br /> <br />

<strong>#2 In the View file write below code:</strong>  <br />
$data->links() <br /> <br />

<strong>#3 In the AppServiceProvider file write below code:</strong>  <br />
use Illuminate\Pagination\Paginator; <br />
Paginator::useBootstrap();  //within boot() <br /> <br />

<strong>#4 More Option in blade file:</strong>  <br />
If you need advance used of pagination then you can see bellow how to use. <br /> <br />

Pagination with appends parameter <br />
$data->appends(['sort' => 'votes'])->links() <br /> <br />

Pagination with appends request all parameters <br />
$data->appends(Request::all())->links()


@endsection

