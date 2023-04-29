@extends('layouts.index')

@section('content')
@php
use App\Models\HealthtStatus;
  $healths=HealthtStatus::all();
@endphp
<div class="container">
    @if(count($errors)>0)
    <div>
    <ul>
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
            <br/>
    @endforeach
    </ul>
    </div>
    @endif
<br>

    <form action={{route('orphan_less_than_18_update',['id'=>$orphan->id,$num])}} enctype="multipart/form-data" method="POST">
        @csrf
        <br>
        <label for="">الاسم</label>
         
        <br/>
        <input type="text" name="name" value="{{$orphan->name}}">
        <br/>
        <label for="">الصف</label>
         
        <br/>
        <input type="text" name="class" value="{{$orphan->class}}">
        <br/>
        <label for="">المدرسة</label>
     
        <br/>
        <input type="text" name="school" value="{{$orphan->school}}">
        <br/>
        <label for="">المواليد</label>
        
        <br/>
        <input type="date" name="birth_date" value="{{$orphan->birth_date}}">
        <br/>
        <label for="">
            الوضع الصحي 

        </label><br>
        @if (isset($health_status)&& $health_status->count()>0)
        <table class="table">
            <thead >
              <tr class="TableOrBtn">
                <th scope="col"></th>
                <th scope="col">اسم الحالة </th>
            </tr>
            </thead>
            <tbody>
        @endif
        @php
        $i=0;
        @endphp    
        @if (isset($health_status)&& $health_status->count()>0)
        @foreach ($health_status as $item)    
        <tr>
        <th scope="row"></th>
        <td>  {{$item->statue}} </td>
        <td><a href="{{route('orphan.del_Status',['id'=>$orphan->id,'id_st'=>$item->id])}}" class="btn TableOrBtn">حذف</a></td>
        </tr>
        @endforeach          
    </tbody>
  </table>
      @endif
      <br/>
      <label for="      اضافة حالة جديدة 
      "></label>
      <select  name="statue[]" class="form-control" multiple>
    @foreach ($healths as $item)
        @if (isset($health_status)&& $health_status->count()>0)
            @foreach ($health_status as $h_st)    
                @if ($item->statue!=$h_st->statue)
                <option value="{{$item->id}}">
                {{$item->statue}}
                </option> 
                @endif
            @endforeach
        @else
        <option value="{{$item->id}}">
            {{$item->statue}}
            </option>
        @endif

    @endforeach
    </select>

        <br/>
        <label for="">
            الجنس 

        </label>
        <br/>
        <input type="text" name="gender" value="{{$orphan->gender}}">
        <br/>

        <input type="submit" value=" حفظ " class="btn TableOrBtn">
    </form>
<br>
</div>
@endsection