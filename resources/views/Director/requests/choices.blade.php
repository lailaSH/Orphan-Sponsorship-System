@extends('layouts.index2')

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

<a href={{ route('approved_requests',['rank'=>1]) }} class="btn TableOrBtn">الطلبات المقبولة</a>
<br>
<br>
<a href={{ route('rejected_requests',['rank'=>1]) }} class="btn TableOrBtn">الطلبات المرفوضة</a>



</div>
@endsection