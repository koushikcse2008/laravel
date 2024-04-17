@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Trait function work:</h3>

<strong>#Step 1: Create Traits file and ImageTrait: </strong><br />
Create a folder inside app directory named Traits and inside it create ImageTrait <br />
Let's create a new trait with verifyAndUpload() function. Paste the code below: <br /> <br />
app/Traits/ImageTrait.php <br />

namespace App\Traits; <br />
use Illuminate\Http\Request; <br /> <br />

trait ImageTrait { <br />

    /**
     * @param Request $request
     * @return $this|false|string
     */ <br />

    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) { <br />
        if( $request->hasFile( $fieldname ) ) { <br />

            if (!$request->file($fieldname)->isValid()) { <br />
                flash('Invalid Image!')->error()->important(); <br />
                return redirect()->back()->withInput(); <br />
            } <br />

            return $request->file($fieldname)->store($directory, 'public'); <br />
        } <br />
        return null; <br />
    } <br />
} <br />

<strong>#Step 2: Create the controller that will use ImageTrait:</strong>  <br />

Paste the code below. <br />
app/Http/Controllers/ItemController.php <br /> <br />


namespace App\Http\Controllers; <br />
use Illuminate\Http\Request; <br />
use App\Item; <br /> <br />

class ItemController extends Controller <br />
{ <br />
     /** <br />
     * Display a listing of the resource. <br />
     * <br />
     * @return \Illuminate\Http\Response <br />
     */ <br /> <br />
    public function create() <br />
    { <br />
        return view('imageUpload'); <br />
    } <br />

    /** <br />
     * Display a listing of the resource. <br />
     * <br />
     * @return \Illuminate\Http\Response <br />
     */ <br /> <br />
    public function store(Request $request) <br />
    { <br />
        $input = $request->all(); <br />
        $input['image'] = ''; <br />
        Item::create($input); <br />
        return back()->with('success','record created successfully.'); <br />
    } <br />
} <br />

<strong>#Step 3: Insert and use ImageTrait on your Controller:</strong>  <br />

Paste the uses of ImageTrait. <br />
app/Http/Controllers/ItemController.php <br /> <br />

use App\Traits\ImageTrait; <br />
•	at the top part  <br />

use ImageTrait; <br />
•	inside the controller class  <br /> <br />

$input['image'] = $this->verifyAndUpload($request, 'image', 'images'); <br />
•	using the function inside the trait <br />

Now it should like this! <br /> <br />


namespace App\Http\Controllers; <br />
use Illuminate\Http\Request; <br />
use App\Item; <br />
use App\Traits\ImageTrait; <br /> <br />

class ItemController extends Controller <br />
{ <br />

    use ImageTrait; <br />

     /** <br />
     * Display a listing of the resource. <br />
     * <br />
     * @return \Illuminate\Http\Response <br />
     */ <br /> <br />
    public function create() <br />
    { <br />
        return view('imageUpload'); <br />
    } <br /> <br />

    /** <br />
     * Display a listing of the resource. <br />
     * <br />
     * @return \Illuminate\Http\Response <br />
     */ <br />
    public function store(Request $request) <br />
    { <br />
        $input = $request->all(); <br />
        $input['image'] = $this->verifyAndUpload($request, 'image', 'images'); <br />
        Item::create($input); <br />
        return back()->with('success','record created successfully.'); <br />
    } <br />
}




@endsection

