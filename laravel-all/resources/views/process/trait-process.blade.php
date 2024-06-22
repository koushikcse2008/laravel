@extends('layouts.common')

@section('title', 'Creating Traits Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Trait function work:</h3>

<strong>#Step 1: Create Traits file and ImageTrait: </strong><br />
Create a folder inside app directory named Traits and inside it create ImageTrait <br />
Let's create a new trait with verifyAndUpload() function. Paste the code below: 

<xmp>
@verbatim
app/Traits/ImageTrait.php 

namespace App\Traits; 
use Illuminate\Http\Request;  

trait ImageTrait { 

    /**
     * @param Request $request
     * @return $this|false|string
     */ 

    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) { 
        if( $request->hasFile( $fieldname ) ) { 

            if (!$request->file($fieldname)->isValid()) { 
                flash('Invalid Image!')->error()->important(); 
                return redirect()->back()->withInput(); 
            } 

            return $request->file($fieldname)->store($directory, 'public'); 
        } 
        return null; 
    } 
} 
@endverbatim
</xmp>
<br />
<strong>#Step 2: Create the controller that will use ImageTrait:</strong>  <br />

Paste the code below. app/Http/Controllers/ItemController.php 
<xmp>
@verbatim
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Item;  

class ItemController extends Controller 
{ 
     /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */  
    public function create() 
    { 
        return view('imageUpload'); 
    } 

    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */  
    public function store(Request $request) 
    { 
        $input = $request->all(); 
        $input['image'] = ''; 
        Item::create($input); 
        return back()->with('success','record created successfully.'); 
    } 
}

@endverbatim
</xmp>

<strong>#Step 3: Insert and use ImageTrait on your Controller:</strong>  <br />

Paste the uses of ImageTrait. <br />
app/Http/Controllers/ItemController.php <br /> <br />

use App\Traits\ImageTrait; <br />
•	at the top part  <br />

use ImageTrait; <br />
•	inside the controller class  <br /> <br />

$input['image'] = $this->verifyAndUpload($request, 'image', 'images'); <br />
•	using the function inside the trait <br />

Now it should like this! 

<xmp>
@verbatim
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Item; 
use App\Traits\ImageTrait;  

class ItemController extends Controller 
{ 

    use ImageTrait; 

     /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */  
    public function create() 
    { 
        return view('imageUpload'); 
    }  

    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request) 
    { 
        $input = $request->all(); 
        $input['image'] = $this->verifyAndUpload($request, 'image', 'images'); 
        Item::create($input); 
        return back()->with('success','record created successfully.'); 
    } <br />
}
@endverbatim
</xmp>

@endsection

