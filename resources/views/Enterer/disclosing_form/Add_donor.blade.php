@extends('layouts.index')
@section('content')
<div class="container">

<form action={{route('donor.store')}} enctype="multipart/form-data" method="POST">
    @csrf
    <br>
    <label for="">
        الاسم 

    </label>
    <br/>
    <input type="text" name="name" value="{{Request::old('name')}}">
    <br/>
    <label for="">    العمل 
    </label>
    <br/>
    <input type="text" name="work" value="{{Request::old('work')}}">
    <br/>
    <label for="">مدة الكفالة
    </label>
    <br/>
    <input type="text" name="period" value="{{Request::old('period')}}">
    <br/>
    <label for="">
        تاريخ مباشرة الكفالة 

    </label>
    <br/>
    <input type="date" name="start_date" value="{{Request::old('start_date')}}">
    <br/>
    <label for="">    مكان الاقامة 
    </label>
    <br/>
    <input type="text" name="Residence_place" value="{{Request::old('Residence_place')}}">
    <br/>
    <label for="">    رقم الموبايل 
    </label>
    <br/>
    <input type="text" name="number_phone" value="{{Request::old('number_phone')}}">
    <br/>
    <label for="">    كلمة المرور 
    </label>
    <br/>
    <input type="password" name="password" value="{{Request::old('password')}}">
    <br/>

    <input type="submit" value=" حفظ " class="btn TableOrBtn">
    


    
</form>
</div>
@endsection