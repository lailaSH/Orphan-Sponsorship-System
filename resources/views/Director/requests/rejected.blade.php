
@extends('layouts.index2')

@section('content')
<table class="table">
    <thead >
      <tr class="TableOrBtn">
        <th scope="col"></th>
        <th scope="col">رقم الطلب</th>
        <th scope="col">تاريخ التقديم</th>
        <th scope="col">اسم الوصي </th>
        <th scope="col">اسم مقدم الطلب</th>
        <th scope="col">استعراض</th>
    </tr>
    </thead>
    <tbody>

      
@foreach ($rejected as $item)  
<tr>
<th scope="row"></th>
<td>{{$item->id}}</td>
<td>{{$item->created_at}}</td>
<td>{{$item->orphan_guardian}}</td>
<td>{{$item->applicant_name}}</td>
<td> <a href={{ route('request_display',$item->id) }} class="TableOrBtn">
  <i class="fas fa-eye"></i>
</a> 
</td>

</tr>
@endforeach          
    </tbody>
  </table>

<br>
<a href={{ route('rejected_requests',['rank'=>2]) }} class="btn TableOrBtn"> الترتيب تصاعديا بحسب التاريخ</a>

@endsection