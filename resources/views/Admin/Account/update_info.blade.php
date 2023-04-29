@extends('layouts.index3')

@section('content')
<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

    <form action={{route('Update_Admin_Info')}} enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <label for="">ادخل كلمة السر</label>
        <br />
        <input type="password" name="password" >
        <br />
        <br />
        <label for="">الاسم</label>
        <br />
        <input type="text" name="name"value="{{$user->name}}">
        <br />
<label for="">البريد الكتروني</label>
        <br />
        <input type="email" name="email"value="{{$user->email}}">
        <br />
        <br />
       

        <input type="submit" value="حفظ " class="btn TableOrBtn">

    </form> 

<br>
    <a href={{route('update_Admin_password') }} class="btn TableOrBtn">تعديل كلمة السر</a>

<br>
</div>
@endsection