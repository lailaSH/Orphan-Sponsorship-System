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

@if ($requests!=null)
<br>
<h3 class="text_h"> الطلبات التي استلمها الكشاف في الفترة الأخيرة 
</h3>
<br><br>
  <table class="table">
    <tr class="TableOrBtn">
      <th>رقم الطلب </th>
      <th>تاريخ التسليم للكشاف</th> 
    </tr>
    
    @foreach ($requests as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->Scout_Delivery_Date}}</td>
    </tr>

       @endforeach
</table>
       @endif

       <br>
       <br>
       <a href="{{route('scouts_list',['id'=>$wr_id])}}"  class="btn TableOrBtn ">
        <i class="fas fa-forward"></i>
      </a>
            
</div>
@endsection


