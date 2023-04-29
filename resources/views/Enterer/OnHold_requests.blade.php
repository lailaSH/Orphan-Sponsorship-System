@extends('layouts.index')

@section('content')
@php
use Illuminate\Support\Facades\DB;   
@endphp
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


@if ($requests!=null)
    


  <table  class="table">
    <tr  class="TableOrBtn">
      <th>الرقم</th>
      <th>الكشاف المكلف </th> 
      <th>تاريخ التسليم للكشاف</th>
      <th>سبب إعادة الإرسال</th>
      <th>عرض</th>
      <th>       إرجاع الطلب للكشاف المكلف
</th>
      <th>
            إعطاء الطلب لكشاف جديد
 </th>

    </tr>
          @foreach ($requests as $request)
    <tr>
      <td>{{$request->id}}</td>
   @php
       $scout=DB::table('scouts')->where('id', $request->scout)->first();
   @endphp
      <td>{{$scout->full_name}}</td>
      <td>{{$request->Scout_Delivery_Date}}</td>
      <td>{{$request->reason}}</td>
      <td><a href={{ route('request_display',$request->id) }} >
          <i class="fas fa-eye"></i>

      </a></td> 
      <td><a href={{ route('add',['wr_id'=>$request->id,'s_id'=>$scout->id])}} >
                <i class="fas fa-share"></i>
</a></td>
      <td><a href={{ route('scouts_list',$request->id) }} >
                   <i class="fas fa-plus"></i>
   </a></td>
    </tr>
       @endforeach

  </table>

  @endif
<br>
<br>
</div>
@endsection