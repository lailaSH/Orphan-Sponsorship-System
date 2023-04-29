@extends('layouts.index')

@section('content')
<div class="container">
    <form action={{route('Payment.store',$id)}} enctype="multipart/form-data" method="POST">
        @csrf
        <label for="">        عدد الايتام المراد الدفع لهم
        </label><br>
        <input type="text" name="number_orphans" value="{{$number_orphans}}">
        <br>
        <input type="submit" value="موافق" class="btn TableOrBtn">
    </form>

</div>
@endsection