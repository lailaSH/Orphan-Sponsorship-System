@extends('layouts.index2')

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

    <form action={{route('Update_Director_Info')}} enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        @method('PUT')
<label for="">كلمة السر</label>        <br />
        <input type="password" name="password" >
        <br />
        <br />
        <label for="">الاسم</label>        <br />

        <input type="text" name="name"value="{{$user->name}}">
        <br />
       

        <input type="submit" value="حفظ " class="btn TableOrBtn">

    </form> 

<br>
    <a href={{route('update_Director_password') }} class="btn TableOrBtn">تعديل كلمة السر</a>


</div>
@endsection