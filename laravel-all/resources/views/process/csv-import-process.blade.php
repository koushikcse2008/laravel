@extends('layouts.common')

@section('title', 'CSV Import Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the CSV Import work:</h3>

<strong>#Step 1: Create a view file: </strong><br />

<xmp>
@verbatim
<form action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".csv">
    <button type="submit">Import CSV</button>
</form> 
@endverbatim
</xmp>
<br />
<strong>#Step 2: Create the controller that will use import:</strong>  <br />

<xmp>
@verbatim
public function csvImport(Request $request)
{
    $file = $request->file('file');
    $fileContents = file($file->getPathname());
    $skip = 0;
    foreach ($fileContents as $line) {
        $data = str_getcsv($line);
        if($skip == 0) {
            $skip++;
        } else {
            Post::create([
                'name' => $data[1],
                'desc' => $data[2],
                // Add more fields as needed
            ]);
        }

    }

    return redirect()->back()->with('success', 'CSV file imported successfully.');
}
@endverbatim
</xmp>

<strong>#Step 3: Write the route as:</strong>  <br />

<xmp>
@verbatim
Route::get("/post-import", 'PostFormController@showImport');
Route::post("/post-import", 'PostFormController@csvImport')->name('csv.import');
@endverbatim
</xmp>

@endsection

