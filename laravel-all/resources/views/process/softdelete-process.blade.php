@extends('layouts.common')

@section('title', 'Soft Delete Process')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Softdelete function work:</h3> <br /> 

<strong>#1 Create/Select migration file and add the below code:</strong> <br /> 
$table->softDeletes(); <br />  <br /> 

<strong>#2 Create/Select model and add below code</strong>: <br /> 
<xmp>
@verbatim
use Illuminate\Database\Eloquent\SoftDeletes; 
use HasFactory; 
use SoftDeletes; 
protected $dates = ['deleted_at'];  
@endverbatim
</xmp>
<strong>#3 Delete Data:</strong> <br /> 
Product::where(‘id’, 1)->delete(); <br />  <br /> 

<strong>#4 Get Deleted Data:</strong> <br /> 
Product::onlyTrashed()->get(); <br /> 
Product::withTrashed()->restore(); <br />  <br /> 

<strong>#5 Delete from the table:</strong> <br /> 
Product::withTrashed()->find(1)->forceDelete(); <br /> 


@endsection

