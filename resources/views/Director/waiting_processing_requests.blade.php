@extends('layouts.index2')

@section('content')
<div class="container">
    @if(count($errors)>0)
    <div>
    <ul>
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>        <br/>
    @endforeach
    </ul>
    </div>
  
    @endif
    <table class="table">
      <thead>
        <tr class="TableOrBtn">
          <th scope="col">رقم الطلب</th>
          <th scope="col">تاريخ التقديم</th>
          <th scope="col">عرض</th>
          <th scope="col">حالة الطلب</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($requests as $request)
        <tr>
          <th scope="row">{{$request->id}} </th>
          <td>{{$request->created_at}}</td>
          <td>      <a href={{ route('display_request', ['id'=>$request->id]) }} >
            <i class="fas fa-eye" style="font-size: 18px"></i>
          </a>
          </td>
          <td>    <a href={{ route('request_status_page',['r_id'=>$request->id]) }}>
            <i class="fas fa-plus" style="font-size: 18px"></i>

          </a>
          </td>
        </tr>
        @endforeach
      
       
      </tbody>
    </table>
    
</div>
@endsection