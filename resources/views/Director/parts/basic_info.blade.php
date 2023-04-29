@extends('layouts.index2')
@section('content')
  
@if ($info !=null)
    

<table class="table">
  <tr class="TableOrBtn">
    <th>اسم الاب</th>
    <th>اسم الام</th> 
    <th>عمل الام</th>
  </tr>
  <tr>
    
    <td>{{$info->family_name}}</td>
    <td>{{$info->mother_name}}</td>
    <td>{{$info->mother_job}}</td>
  </tr>
</table>
@endif


<br>
<br>
<br>
<a href={{ route('display_request', ['id'=>$r_id]) }}>معلومات الطلب</a>
<br>
<br>
<br>


@include('Director.disclosing_form_parts')


@endsection
