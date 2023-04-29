@extends('layouts.index3')

@section('content')
    @if(count($errors)>0){
    <div>
    <ul>
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>        <br/>
    @endforeach
    </ul>
    </div>
    }
    @endif
    <form action={{route('add_new_employee',$type)}} enctype="multipart/form-data" method="POST">
        @csrf
        <br>
        <label for="">الاسم</label>
<br>
        <input type="text" name="name" value="{{Request::old('name')}}">
<br>
<label for="">البريد الالكتروني</label>

<br>
        <input type="email" name="email" value="{{Request::old('email')}}">
<br>
<label for="">تاريخ التسجيل</label>

<br>
        <input type="date" name="assign_date" value="{{Request::old('assign_date')}}">
<br>
<label for="">كلمة السر</label>

<br>
        <input type="text" name="password" value="{{Request::old('password')}}">
<br>


        <input type="submit" value="اضافة" class="btn TableOrBtn">
<br>
    </form>






@endsection