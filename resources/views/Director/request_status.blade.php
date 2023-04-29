@extends('layouts.index2')

@section('content')
<div class="container">
    @if(count($errors)>0)
    <div>
    <ul>
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>        <br/>
    @endforeach
    </ul>
    </div>
    
    @endif

<a href={{ route('request_approved', ['r_id'=>$r_id])}} class="btn TableOrBtn">قبول الطلب</a>

<br>
<br>

<form action={{ route('request_rejected', ['r_id'=>$r_id])}} enctype="multipart/form-data" method="POST">
    @csrf
    <label for="">
        رفض الطلب مع ذكر السبب 

    </label>
    <br/>
    <input type="text" name="reason" value="{{Request::old('reason')}}">
    <br/>
    <button type="submit"  class="btn TableOrBtn">
        <i class="fas fa-share" style="padding: 3px"></i>ارسال 
     </button>
    
    
</form>
<br>
<br>
<form action={{ route('request_OnHold', ['r_id'=>$r_id])}} enctype="multipart/form-data" method="POST">
    @csrf
    <label for="">
        إرسال الطلب لإعادة الدراسة
  مع توضح السبب بشكل مفصل 
    </label>
  
    <br/>
    <input type="text" name="reason" value="{{Request::old('reason')}}">
    <br/>

    <button type="submit"  class="btn TableOrBtn">
        <i class="fas fa-share" style="padding: 3px"></i>ارسال 
     </button>
    
    </form>



</div>
@endsection

