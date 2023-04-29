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

    <form action={{route('add_new_scout')}} enctype="multipart/form-data" method="POST">
        @csrf
        <br>
        <label for="">الاسم</label>

<br>
        <input type="text" name="full_name" value="{{Request::old('full_name')}}">
<br>
<label for="">رقم الموبايل</label>
<br>
        <input type="text" name="phone_number" value="{{Request::old('phone_number')}}">
<br>
<label for="">تاريخ التسجيل</label>
<br>
        <input type="date" name="assign_date" >
<br>

<label for="">العنوان الحالي</label>
<br>
        <input type="text" name="current_address" value="{{Request::old('current_address')}}">
<br>

<input type="submit" value="اضافة" class="btn TableOrBtn">
<br>
    </form>

@endsection