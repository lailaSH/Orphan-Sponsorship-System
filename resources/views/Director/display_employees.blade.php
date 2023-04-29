@extends('layouts.index2')

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

<h3>موظفين الادخال</h3>
    <br>
    <table class="table">
        <tr class="TableOrBtn">
          <th>الرقم</th>
          <th>الاسم </th> 
          <th>حذف</th>
        </tr>
     
        @foreach ($users as $enterer)
    <tr>
          
        <th>{{$enterer->id}}</th>
        <th>{{$enterer->name}}</th>
        <th> <a href={{route('remove_employee',$enterer->id)}}> 
            <i class="fas fa-trash-alt" style="font-size: 15px"></i>
     </a></th>
      </tr>
      
        <br>
<br>
    @endforeach
</table>
<tbody>

    <br>
<br>





</div>
@endsection