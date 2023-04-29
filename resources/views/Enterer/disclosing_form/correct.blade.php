@extends('layouts.index')

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

    <form action={{ route('on_hold_match')}}  enctype="multipart/form-data" method="POST">
        @csrf
       <br>
<h5 style="color: #023e8aad; "> ادخل رقم الطلب</h5>        <br>
        <input type="text" name="request_id" value="{{ Request::old('request_id') }}">
          <br>          <br>

          <input type="submit" value=" تم " class="btn" style="background-color: #023e8aad; color:white; ">

    </form>
<br>
<br>
    @if ($point===1)
    تم ملء الطلب في  {{$request->created_at}} ذو الرقم {{$request->id}}
    <br>
    <br>
   وتم تسلميه للكشاف {{$scout1->full_name}} للعمل عليه في {{$request->Scout_Delivery_Date}}
    <br>
    <br> 
    @if ($scout1->full_name===$scout2->full_name)
    ثم تمت اعادتها ل  {{$scout2->full_name}}  للتصحيح في {{$request->Scout_Delivery_Date_OnHold}}
    @else
    ثم تمت اعادتها ل {{$scout2->full_name}} للتصحيح في {{$request->Scout_Delivery_Date_OnHold}}
    @endif
    <br>
    <br>
    <a href={{ route('request_display',$request->id) }}  class="btn btn-primary ">عرض معلومات الطلب  </a>
    <br><br>
    <a href="{{ route('forms',$request->id) }}"  class="btn btn-primary "> تصحيح معلومات استمارة الكشف من أجل هذا الطلب </a> 
    <br>   
    @endif


</div>
@endsection