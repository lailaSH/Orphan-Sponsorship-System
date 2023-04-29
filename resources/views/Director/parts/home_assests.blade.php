@extends('layouts.index2')
@section('content')
  
  @if ($assest!=null)

  موجودات المنزل
  <table class="table">
    <tr class="TableOrBtn">
      <th>العنصر</th>
      <th>الوفرة</th> 
      <th>الكمية</th>
    </tr>
          @foreach ($assests as $assest)

    <tr>
      <td>{{$assest->element}}</td>
      <td>{{$assest->availablility}}</td>
      <td>{{$assest->amount}}</td>
    </tr>
    
       @endforeach

  </table>
  @endif
  <br>
<br>
<br>

@if ($eva!=null)
    
تقييم المنزل 

<table class="table">
  <tr class="TableOrBtn">
    <th>التقييم</th>
    <th>درجة الفقر</th> 
    <th>الملاحظات</th>
  </tr>
  <tr>
    
    <td>{{$eva->house_evaluation}}</td>
    <td>{{$eva->poor_degree}}</td>
    <td>{{$eva->notes}}</td>
  </tr>
</table>
<br>
<br>
<br>
@endif
<br>

<a href={{ route('display_request', ['id'=>$r_id]) }} class="btn TableOrBtn">معلومات الطلب</a>
<br>

@include('Director.disclosing_form_parts')

@endsection
