@extends('layouts.index3')

@section('content')
  @if ($status!=null)

  <table class="table">
    <tr class="TableOrBtn">
      <th>الحالة</th>
      <th>الوصف</th> 
      <th>ملاحظات إضافية</th>
      <th>إزالة الحالة</th>

    </tr>
          @foreach ($status as $statu)

    <tr>
      <td>{{$statu->statue}}</td>
      <td>{{$statu->description}}</td>
      <td>{{$statu->notes}}</td>
      <td><a href={{ route('delete_health_status',$statu->id) }} class="btn TableOrBtn">حذف</a></td>

    </tr>
    
       @endforeach

  </table>
  @endif
<br>
<br>
<br>

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
<br>
<br>
<a href={{route('contol_health_status',['flag'=>1])}} class="btn TableOrBtn">إضافة حالة جديدة</a>

<br>
<br>
<br>
@if($flag==1)

<form action={{route('store_health_status')}} enctype="multipart/form-data" method="POST">
    @csrf
    <br>
    <label for="">الحالة</label>
 
<br>
    <input type="text" name="statue" value="{{Request::old('statue')}}">
<br>
<label for="">الوصف</label>
<br>
    <input type="text" name="description" value="{{Request::old('description')}}">
<br>
<label for="">ملاحظات</label>
 
<br>
<input type="text" name="notes" value="{{Request::old('notes')}}">
<br>
    <input type="submit" value="اضافة">
<br>
</form>

@endif

</div>
@endsection