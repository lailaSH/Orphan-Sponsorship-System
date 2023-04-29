@extends('layouts.index2')
@section('content')
  
<table class="table">
  <tr class="TableOrBtn">
    <th>الرقم</th>
    <th>الوصي</th> 
    <th>صلة القرابة</th>
  </tr>
  <tr>
    
    <td>{{$request->id}}</td>
    <td>{{$request->orphan_guardian}}</td>
    <td>{{$request->relationship}}</td>
  </tr>
</table>
<br>
<br>
<br>

@php
 $r_id=  $request->id; 
@endphp

@include('Director.disclosing_form_parts')

<br>
@endsection
