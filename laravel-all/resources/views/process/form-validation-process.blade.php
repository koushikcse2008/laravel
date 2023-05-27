@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Form Field Validation function work:</h3>

# Steps 1: Create Route: <br />
Route::get('user/create', [ HomeController::class, 'create' ]); <br />
Route::post('user/create', [ HomeController::class, 'store' ]); <br /> <br />

# Steps 2: Create Controller: <br />
php artisan make:controller HomeController <br />
public function store(Request $request) <br />
{ <br />
        $validatedData = $request->validate([ <br />
                'name' => 'required', <br />
                'password' => 'required|min:5', <br />
                'email' => 'required|email|unique:users' <br />
            ], [ <br />
                'name.required' => 'Name is required', <br />
                'password.required' => 'Password is required' <br />
            ]); <br /> <br />
        $validatedData['password'] = bcrypt($validatedData['password']); <br />
        $user = User::create($validatedData); <br />
        return back()->with('success', 'User created successfully.'); <br /> <br />

       //another example <br />
      $this->validate($request, [ <br />
          'name' => 'required', <br />
          'email' => 'required|email', <br />
          'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', <br />
          'subject'=>'required', <br />
          'message' => 'required' <br />
       ]); <br /> <br />

       //Another Example <br />
      $validator = Validator::make($request->all(), [ <br />
        'title' => 'required', <br />
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', <br />
      ]); <br /> <br />

      //  Store data in database <br />
      Form::create($request->all()); <br />
      return back()->with('success', 'Your form has been submitted.'); <br />
} <br /> <br />

# Steps 3: Create field error message: <br />
if ($errors->has('name')) <br />
<span class="text-danger"> $errors->first('name')</span> <br />
endif




@endsection

