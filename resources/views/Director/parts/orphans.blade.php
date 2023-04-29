
@extends('layouts.index2')

@section('content')
<div class="container">
<table class="table">
    <thead >
      <tr class="TableOrBtn">
        <th scope="col"></th>
        <th scope="col">الاسم</th>
        <th scope="col">الصف</th>
        <th scope="col">العمر</th>
        <th scope="col">الجنس</th>
    </tr>
    </thead>
    <tbody>
@php
$i=0;
@endphp
      
@foreach ($orphans as $item)  
<tr>
<th scope="row"></th>
<td>{{$item->name}}</td>
<td>{{$item->class}}</td>
<td>{{$item->birth_date}}</td>
<td>{{$item->gender}}</td>
</tr>
@endforeach          
    </tbody>
  </table>



    






@include('Director.disclosing_form_parts')

<br>

<a href={{ route('display_request', ['id'=>$r_id]) }} class="btn TableOrBtn">معلومات الطلب</a>

@endsection