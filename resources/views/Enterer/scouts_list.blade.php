@extends('layouts.index')

@section('content')
<h3 class="text_h">  قائمة الكشافين </h3>
  <br>
  <br>
  @if($scouts!=null)
  <table class="table">
    <thead>
      <tr class="TableOrBtn">
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col">العنوان</th>
        <th scope="col">رقم الموبايل</th>
        <th scope="col">عرض</th>
        <th scope="col">اختيار</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($scouts as $scout)
      <tr>
        <th scope="row">{{$scout->id}}</th>
        <td>{{$scout->full_name}}</td>
        <td>{{$scout->current_address}}</td>
        <td>{{$scout->phone_number}}</td>
        <td style="font-size: 18px">    <a href={{ route('scouts_requests',['s_id'=>$scout->id,'wr_id'=>$wr_id]) }}> 
                            <i class="fas fa-eye "></i>
        </a>        </td>
        <td style="font-size: 18px">    <a href={{ route('add',['wr_id'=>$wr_id,'s_id'=>$scout->id])}} >
          <i class="fas fa-plus "></i>
        </a>
        </td>

      </tr>
      @endforeach    
      @endif  
   
    </tbody>
  </table> 
  <br>

   @endsection