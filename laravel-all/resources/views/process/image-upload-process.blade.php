@extends('layouts.common')

@section('title', 'Image Upload Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Image Upload function work:</h3>

<xmp>
@verbatim
<strong># Steps 1: Create Controller:</strong> 
php artisan make:controller ImageUploadController  

<strong># Steps 2: Write Route:</strong> 
Route::get('/image-upload', 'ImageUploadController@index')->name('image-upload.index'); 
Route::post('/image-upload', 'ImageUploadController@upload')->name('image-upload.post');  

<strong># Steps 3: Write Route:</strong> 

php artisan make:request ImageUploadRequest  

<strong># Steps 4: Write Controller Codes:</strong> 
use App\Http\Requests\ImageUploadRequest;  

public function index()  
{ 
    return view('image-upload.index'); 
}  

public function upload(ImageUploadRequest $request)  
{
     $filename = time() . '.' . $request->image->extension(); 
     $request->image->move(public_path('images'), $filename); 
     // save uploaded image filename here to your database 
     return back()
            ->with('success','Image uploaded successfully.')
            ->with('image', $filename);  
}  

//Another Code  
public function imageUploadPost(Request $request) 
    {
        $request->validate([ 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]); 
    
        $imageName = time().'.'.$request->image->extension();   
     
        $request->image->move(public_path('images'), $imageName); 
  
        /* Store $imageName name in DATABASE from HERE */ 
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);  
    } 

//Another Code 
public function save(Request $request) 
    { 
        $validatedData = $request->validate([ 
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', 
        ]); 
        $name = $request->file('image')->getClientOriginalName(); 
        $path = $request->file('image')->store('public/images'); 
        $save = new Photo; 
        $save->name = $name; 
        $save->path = $path; 
        $save->save(); 
        return redirect('upload-image')->with('status', 'Image Has been uploaded'); 
    }

@endverbatim
</xmp>

@endsection