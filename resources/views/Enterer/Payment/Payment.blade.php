@extends('layouts.index')

@section('content')
<div class="container">
    <form action={{route('Payment.create')}} enctype="multipart/form-data">
        @csrf
        <label for="">        رقم الكفيل
        </label>
        <br>
        <input type="text" name="id">
        <br>
        <input type="submit" value=" موافق " class="btn TableOrBtn">
    </form>

</div>
@endsection