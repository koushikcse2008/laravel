@extends('layouts.common')

@section('content')

<h3 class="font-weight-bold text-danger text-decoration-underline border-bottom">Instruction for the Softdelete function work:</h3> <br /> 

#1 Create/Select migration file and add the below code: <br /> 
$table->softDeletes(); <br />  <br /> 

#2 Create/Select model and add below code: <br /> 
use Illuminate\Database\Eloquent\SoftDeletes; <br /> 
use HasFactory; <br /> 
use SoftDeletes; <br /> 
protected $dates = ['deleted_at']; <br />  <br /> 

#3 Delete Data: <br /> 
Product::where(‘id’, 1)->delete(); <br />  <br /> 

#4 Get Deleted Data: <br /> 
Product::onlyTrashed()->get(); <br /> 
Product::withTrashed()->restore(); <br />  <br /> 

#5 Delete from the table: <br /> 
Product::withTrashed()->find(1)->forceDelete(); <br /> 


@endsection

