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

    <form action={{route('Update_Enterer_Info')}} enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        @method('PUT')
<label for="">كلمة السر</label>        <br />
        <input type="password" name="password" >
        <br />
        <br />
        <label for="">الاسم</label>        <br />

        <input type="text" name="name"value="{{$user->name}}">
        <br />
       

        <button type="submit"  class="btn TableOrBtn">
            <i class="fas fa-cloud-download-alt
            " style="padding:4px"></i>حفظ
         </button>
        
    </form> 

<br>
    <a href={{route('update_Enterer_password') }} class="btn TableOrBtn">
        <i class="fas fa-edit
        " style="padding:4px"></i>
تعديل كلمة السر</a>


</div>
@endsection