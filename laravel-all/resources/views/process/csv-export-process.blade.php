@extends('layouts.common')

@section('title', 'CSV Export Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the CSV Export work:</h3>

<strong>#Step 1: Create a route: </strong><br />

<xmp>
@verbatim
Route::get("/post-export", 'PostFormController@showExport');
@endverbatim
</xmp>
<br />
<strong>#Step 2: Create the controller that will use export:</strong>  <br />

<xmp>
@verbatim
$products = Post::all();
$csvFileName = 'Post.csv';
$headers = [
    'Content-Type' => 'text/csv',
    'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
];

$handle = fopen('php://output', 'w');
fputcsv($handle, ['Id', 'Name', 'Desc']); // Add more headers as needed

foreach ($products as $product) {
    fputcsv($handle, [$product->id, $product->name, $product->desc]); // Add more fields as needed
}

fclose($handle);

return Response::make('', 200, $headers);
@endverbatim
</xmp>

@endsection

