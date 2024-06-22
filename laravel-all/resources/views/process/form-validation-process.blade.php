@extends('layouts.common')

@section('title', 'Form Validation')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Form Field Validation function work:</h3>

<xmp>
@verbatim

<strong> Steps 1: Create Route:</strong> 
Route::get('user/create', [ HomeController::class, 'create' ]); 
Route::post('user/create', [ HomeController::class, 'store' ]);  

<strong># Steps 2: Create Controller:</strong> 
php artisan make:controller HomeController 
public function store(Request $request) 
{ 
        $validatedData = $request->validate([ 
                'name' => 'required', 
                'password' => 'required|min:5', 
                'email' => 'required|email|unique:users' 
            ], [ 
                'name.required' => 'Name is required', 
                'password.required' => 'Password is required' 
            ]);  
        $validatedData['password'] = bcrypt($validatedData['password']); 
        $user = User::create($validatedData); 
        return back()->with('success', 'User created successfully.');  

       //another example 
      $this->validate($request, [ 
          'name' => 'required', 
          'email' => 'required|email', 
          'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', 
          'subject'=>'required', 
          'message' => 'required' 
       ]);  

       //Another Example 
      $validator = Validator::make($request->all(), [ 
        'title' => 'required', 
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
      ]);  

      //  Store data in database 
      Form::create($request->all()); 
      return back()->with('success', 'Your form has been submitted.'); 
}  

<strong># Steps 3: Create field error message:</strong> 
if ($errors->has('name')) 
<span class="text-danger"> $errors->first('name')</span> 
endif

@endverbatim
</xmp>


@endsection

