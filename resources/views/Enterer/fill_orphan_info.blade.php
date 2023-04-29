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
<ul class="progressbar">
    <li class="active"></li>
    <li  class="active" ></li>
    <li></li>
            </ul>
            <br>
    
@if($count===0)
<label>
<h5  > املأ المعلومات اليتيم الأولى </h5>
</label>
    <br>
@endif

@if($count===1)
<label>
    <h5  > قم بتعبئة بيانات اليتيم التالي 
    </h5>
    </label>
<br>
@endif

    <form action={{route('orphan_request_store',[$wr_id,$num])}} enctype="multipart/form-data" method="POST">
        @csrf
        <br>

        الاسم 
        <br/>
        <input type="text" name="name" value="{{Request::old('name')}}">
        <br/>
الصف الدراسي 
        <br/>
        <input type="text" name="class" value="{{Request::old('class')}}">
        <br/>
        المواليد
        <br/>
        <input type="date" name="birth_date" value="{{Request::old('birth_date')}}">
        <br/>
        الوضع الصحي 
        <br/>
            <select  name="statue[]" class="form-control" multiple>
                @foreach ($healths as $item)
                <option value="{{$item->id}}">
                    {{$item->statue}}
                </option>
                @endforeach
            </select>
        <br/>
       
الجنس     
        <br>
        <select name="gender">
                <option value="
                أنثى
                ">  أنثى </option>

                <option value="
                ذكر
                ">  ذكر </option>
        </select>   
<br>
<br>
<button type="submit"  class="btn TableOrBtn">
    <i class="fas fa-plus" style="font-size: 15px"></i>
    اضافة
 </button>
    </form>
<br>

@if ($count===1)
<button type="button" class="btn TableOrBtn " data-toggle="modal" data-target="#exampleModalCenter2">
    <i class="fas fa-share" style="font-size: 13px; padding:3px"></i>
  ارسال   </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">التأكد من ارسال الطلب</h5>
        </div>
        <div class="modal-body">
<label for="">
    يرجى التأكيد على ان جميع المعلومات صحيحة    
</label>           </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
          <a href={{ route('finish',['id'=>$wr_id,'num'=>$num]) }}  class="btn TableOrBtn">
            <i class="fas fa-share" style="font-size: 13px; padding:3px"></i>
            ارسال
        </a>
                </div>
      </div>
    </div>
  </div>

@endif
</div>
@endsection