@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Image Upload function work:</h3>

# Steps 1: Create Controller: <br />
php artisan make:controller ImageUploadController <br /> <br />

# Steps 2: Write Route: <br />
Route::get('/image-upload', 'ImageUploadController@index')->name('image-upload.index'); <br />
Route::post('/image-upload', 'ImageUploadController@upload')->name('image-upload.post'); <br /> <br />

# Steps 3: Write Route: <br />

php artisan make:request ImageUploadRequest <br /> <br />

# Steps 4: Write Controller Codes: <br />
use App\Http\Requests\ImageUploadRequest; <br /> <br />

public function index()  <br />
{ <br />
    return view('image-upload.index'); <br />
} <br /> <br />

public function upload(ImageUploadRequest $request)  <br />
{
     $filename = time() . '.' . $request->image->extension(); <br />
     $request->image->move(public_path('images'), $filename); <br />
     // save uploaded image filename here to your database <br />
     return back()
            ->with('success','Image uploaded successfully.')
            ->with('image', $filename);  <br />
} <br /> <br />

//Another Code  <br />
public function imageUploadPost(Request $request) <br />
    {
        $request->validate([ <br />
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', <br />
        ]); <br />
    
        $imageName = time().'.'.$request->image->extension();   <br />
     
        $request->image->move(public_path('images'), $imageName); <br />
  
        /* Store $imageName name in DATABASE from HERE */ <br />
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);  <br />
    } <br />

//Another Code <br />
public function save(Request $request) <br />
    { <br />
        $validatedData = $request->validate([ <br />
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', <br />
        ]); <br />
        $name = $request->file('image')->getClientOriginalName(); <br />
        $path = $request->file('image')->store('public/images'); <br />
        $save = new Photo; <br />
        $save->name = $name; <br />
        $save->path = $path; <br />
        $save->save(); <br />
        return redirect('upload-image')->with('status', 'Image Has been uploaded'); <br />
    }





@endsection

