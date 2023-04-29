@extends('layouts.app')

@section('content')
<div class="container">
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
name :
<br>
        <input type="text" name="name" value="{{Request::old('name')}}">
<br>
email :
<br>
        <input type="email" name="email" value="{{Request::old('email')}}">
<br>

password:
<br>
        <input type="text" name="password" value="{{Request::old('password')}}">
<br>


        <input type="submit" value="Add This">
<br>
    </form>






</div>
@endsection