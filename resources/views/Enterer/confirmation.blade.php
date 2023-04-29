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

    <form action={{ route('match_confirmation')}}  enctype="multipart/form-data" method="POST">
        @csrf
       <br>
       <h5 style="color: #023e8aad; ">ادخل رقم الطلب</h5>
        <br>
        <input type="text" name="request_id" value="{{ Request::old('request_id') }}">
          <br><br>
          <input type="submit" value="تم" class="btn TableOrBtn" >

    </form>
<br>
    @if ($point===1)
    تم ملء الطلب في  {{$request->created_at}} ذو الرقم {{$request->id}}
    <br>
    وتم تسلميه للكشاف {{$scout->full_name}} للعمل به
    <br>   
    <br>
    <br>
    <a href={{ route('request_display',$request->id) }} class="btn TableOrBtn">عرض </a>
    <br>
    <br>
    <a href="{{ route('Basic_info_form', ['wr_id'=>$request->id]) }}" class="btn TableOrBtn" >اضافة استمارة كشف</a> 
    <br>   
    @endif
</div>
@endsection