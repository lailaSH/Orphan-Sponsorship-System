@extends('layouts.index')

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

@if($flag==0)
<a href={{ route('search_request', ['id'=>1]) }} class="btn TableOrBtn" > إدخال مساعدة صحية جديدة ليتيم محدد</a>
@endif
    @if ($flag==1)
    <br>
<br>
<label for="">
    <h5>
        الخطوة الأولى

    </h5>
</label>
<br>
    <form action={{ route('enter_request_number') }} enctype="multipart/form-data" method="POST">
        @csrf
        <label for="">
            أدخل رقم الطلب 

        </label>
<br>
        <input type="number" name="number" >
        <br>  
        <input type="submit" value="تم" class="TableOrBtn" >
    </form>
@endif

    @if($flag==2)
    <br>
    <br>
    <label for="">

<h5> 
  الخطوة الثانية
</h5>     
    </label>
    <br><br>
    <label for="">    اختر اليتيم 
    </label>
<br>

@foreach ($orphans as $orphan)
 <a href={{ route('display_health_form', ['id'=>$orphan->id]) }}  class="btn TableOrBtn">  {{ $orphan->name}}</a>
   <br>
@endforeach
    @endif
    @if($flag==3)
    <br>
    <br>
    <label for="">

        <h5> 
            الخطوة الثالثة
        </h5>     
            </label>
            <br><br>
  <label for="">قم بتعبئة المعلومات 
</label>
<br>
<form action={{ route('h_info',['id'=>$id]) }} enctype="multipart/form-data" method="POST">
    @csrf
    <label for="">نوع المساعدة    
    </label><br>
    <select name="type">
            <option value="
            معاينات
            ">  معاينات </option>

            <option value="
            تحاليل
            ">  تحاليل</option>
            <option value="
            أشعة
            ">  أشعة</option>
    <option value="
            وصفات طبية
    ">  وصفات طبية</option>
    <option value="
            معالجات سنية
    ">  معالجات سنية</option>
</select> 
<br>    <br> 

    <label for="">الكلفة</label>
       <br>
    <input type="number" name="cost" >
    <br> 
    <label for="">التاريخ</label>
    <br>
    <input type="date" name="date" >
    <br>  
    <input type="submit" value="تم" class="btn TableOrBtn">
</form>
@endif

<br>
<br>
@endsection