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

    <table class="table">
        <thead >
          <tr class="TableOrBtn">
            <th scope="col"></th>
            <th scope="col">رقم الطلب</th>
            <th scope="col">تاريخ الطلب </th>
            <th scope="col">عرض</th>
            <th scope="col">اعطاء الطلب لكشاف</th>
        </tr>
        </thead>
        <tbody>
      
          @foreach ($requests as $request)
          <tr >
    <th scope="row"></th>
    <td style="font-size: 15px">{{$request->id}}</td>
    <td style="font-size: 15px">{{$request->created_at}}</td>
    <td style="font-size: 18px">        <a href={{ route('request_display',$request->id) }} > 
                   <i class="fas fa-eye "></i>
    </a> 
    </td>
    <td style="font-size: 18px">
      <a href={{ route('scouts_list',$request->id) }}  >
        <i class="fas fa-plus "></i>

      </a>
    </td>
   
  </tr>
    @endforeach    
      </tbody>
      </table>



</div>
@endsection

  