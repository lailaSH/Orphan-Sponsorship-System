@extends('layouts.index2')
@section('content')
  
@if ($orphans!=null)
    


  <table class="table">
    <tr class=" TableOrBtn">
      <th>الاسم</th>
      <th>العمر</th> 
      <th>الشهادة</th>
    </tr>
          @foreach ($orphans as $orphan)

    <tr>
      <td>{{$orphan->name}}</td>
      <td>{{$orphan->age}}</td>
      <td>{{$orphan->certificate}}</td>
    </tr>
    
       @endforeach

  </table>

  @endif
  <br>
  <br>
  <br>
  <a href={{ route('display_request', ['id'=>$r_id]) }} class="btn TableOrBtn">معلومات الطلب</a>

<br>
<br>
<br>
@include('Director.disclosing_form_parts')

<br>
@endsection