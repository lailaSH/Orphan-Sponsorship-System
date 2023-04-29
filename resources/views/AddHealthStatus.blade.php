@extends('layouts.app')

@section('content')
<div class="container">

    <form action={{ route('HealthtStatus.store')}}  enctype="multipart/form-data" method="POST">
        @csrf
        <label for="">         اسم المرض
        </label>
         <br>       
        <input type="text"  name="statue">
         
         <input type="submit" value=" اضافة "class="btn TableOrBtn">

    </form>
</div>
@endsection