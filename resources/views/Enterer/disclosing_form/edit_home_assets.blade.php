
@extends('layouts.index')

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

@if ($assests!=null)

موجودات المنزل
<table class="table">
  <tr class="TableOrBtn">
    <th>العنصر</th>
    <th>التوفر</th> 
    <th>الكمية</th>
    <th> </th>
  </tr>
        @foreach ($assests as $assest)

  <tr>
    <td>{{$assest->element}}</td>
    <td>{{$assest->availablility}}</td>
    <td>{{$assest->amount}}</td>
    <td>
        <a href="{{route('edit_home_asset',[$assest->id])}}" class="btn TableOrBtn">تعديل</td></a>
      </tr>
  </tr>
  
     @endforeach

</table>
@endif

@endsection