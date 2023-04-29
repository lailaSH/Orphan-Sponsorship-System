@extends('layouts.index')

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

    <form action={{route('update_Enterer_password')}} enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        @method('PUT')

<label for="">كلمة السر السابقة</label>        <br />
        <input type="text" name="old_password" >
        <br />
        <br />
<label for="">كلمة السر الجديدة</label>        
        <br />
        <input type="password" name="new_password">
        <br />
        <br />
<label for="">تأكيد كلمة السر</label>        <br />
        <input type="password" name="confirm_password">
        <br />
        <br />


        <button type="submit"  class="btn TableOrBtn">
            <i class="fas fa-cloud-download-alt
            " style="padding:4px"></i>حفظ
         </button>
    </form> 



</div>
@endsection