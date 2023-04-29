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




    <form action={{ route('orphan_more_than_18_update',$orphan->id)}}  enctype="multipart/form-data" method="POST">
        @csrf
<label for="">الاسم</label>
             
        <br>       
        <input type="text"  name="name" value="{{ $orphan->name }}">
        <br>
        <label for="">العمر</label>
          
          <br>       
        <input type="text"  name="age" value="{{ $orphan->age }}">
          <br>
          <label for="">الشهادة</label>
          <br>
          <select name="certificate">
            <option value="{{$orphan->certificate}}" selected> {{$orphan->certificate}} </option>
            <option value="ابتدائي">
              ابتدائي </option>
            <option value="إعدادي"> 
              إعدادي</option>
            <option value="ثانوي">
ثانوي
            </option>
            <option value="معهد">
              معهد</option>
            <option value="شهادة جامعية">
              شهادة جامعية</option>
            <option value="غير ذلك">
             غير ذلك</option>
          </select>
              <br>
              <label for="">           الرغبة بالعمل
              </label>
           <br>       
          <input type="text"  name="desire_to_work" value="{{ $orphan->desire_to_work }}">
          <br>
<label for="">ملاحظات</label>
          
          <br>       
          <input type="text"  name="notes" value="{{ $orphan->notes }}">
          <br>
          <input type="submit" value=" حفظ " class="btn TableOrBtn">

        </form>
</div>
@endsection