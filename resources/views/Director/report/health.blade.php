
@extends('layouts.index2')

@section('content')
<div class="container">
  <br>
<br>
  @php
   use Carbon\Carbon;
   $now = Carbon::now();
  @endphp
     {{$now->format('l / j / F / Y')}}  
<br>
<br>
<table class="table">
    <thead >
      <tr class="TableOrBtn">
        <th scope="col"></th>
        <th scope="col">النوع</th>
        <th scope="col">معاينات</th>
        <th scope="col">تحاليل</th>
        <th scope="col">أشعة</th>
        <th scope="col">وصفات طبية</th>
        <th scope="col">معالجات سنية</th>

    </tr>
    </thead>
    <tbody>

      
<tr>
<th scope="row"></th>
<td>الكلفة</td>
<td>{{$cost_1}}</td>
<td>{{$cost_2}}</td>
<td>{{$cost_3}}</td>
<td>{{$cost_4}}</td>
<td>{{$cost_5}}</td>

</tr>

<tr>
    <th scope="row"></th>
    <td>عدد المستفيدين</td>
    <td>{{$i1}}</td>
    <td>{{$i2}}</td>
    <td>{{$i3}}</td>
    <td>{{$i4}}</td>
    <td>{{$i5}}</td>
    
    </tr>
    </tbody>
  </table>

@endsection