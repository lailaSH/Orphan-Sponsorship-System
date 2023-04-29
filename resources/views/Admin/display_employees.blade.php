@extends('layouts.index3')

@section('content')
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

    <br>
    <label for=""><h5>موظفين الادخال</h5></label>
    <table class="table">
        <thead>
          <tr class="TableOrBtn">
            <th scope="col">الاسم </th>
            <th scope="col"></th>
            
          </tr>
        </thead>
        <tbody>

    @foreach ($enterers as $enterer)
    <tr>
      <td >{{$enterer->name}}</td>
      <td>        <a href={{route('remove_employee',$enterer->id)}} class="btn TableOrBtn"> حذف الموظف</a>
      </td>
     
    </tr>

    @endforeach
</tbody>
</table>
<br><br>
<label for="">
    <h5>الكشافين</h5>
</label>
<table class="table">
    <thead>
      <tr class="TableOrBtn">
        <th scope="col">الاسم </th>
        <th scope="col"></th>
        
      </tr>
    </thead>
    <tbody>
    @foreach ($scouts as $scout)
    
<tr>
    <td >{{$scout->full_name}}</td>
    <td>        
        <a href={{route('remove_scout',$scout->id)}} class="btn TableOrBtn">حذف الكشاف</a>
    </td>
   
  </tr>
@endforeach
</tbody>
</table>
</div>
@endsection