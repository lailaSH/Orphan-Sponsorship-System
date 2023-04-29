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
    <ul class="progressbar1">
        <li class="active"></li>
        <li  class="active" ></li>
        <li  class="active" ></li>
        <li class="active" ></li>
        <li ></li>
        <li ></li>
  <li ></li>
  <li ></li>
      
                </ul>
                <br>
      

    <form action={{ route('fill_home_assets',$wr_id)}}  enctype="multipart/form-data" method="POST">
        @csrf
    المادة 
        <br> 


        <select name="element">
            <option value>   </option>

                <option value="براد
                ">  براد </option>
                <option value="غسالة
                ">غسالة</option>
                <option value="فرن غاز
                ">فرن غاز</option>
                <option value="سخان كهربائي
                ">سخان كهربائي</option>
                <option value="مؤونة
                ">مؤونة</option>
                <option value="مدفأة كهربائية
                ">مدفأة كهربائية</option>
                <option value="مدفأة غاز
                ">مدفأة غاز</option>
                <option value="مدفأة مازوت
                ">مدفأة مازوت</option>
                <option value="مدفأة حطب
                ">مدفأة حطب</option>
                <option value="تلفاز
                ">تلفاز</option>
                <option value= "الأسرة
                ">الأسرة</option>
                <option value="خزانة الملابس
                ">خزانة الملابس</option>
                <option value="سجاد
                ">سجاد</option>
                <option value="مروحة
                ">مروحة</option>
                <option value="مكيف
                ">مكيف</option>
                <option value="خزان مازوت
                ">خزان مازوت</option>
                <option value="هاتف جوال
                ">هاتف جوال</option>
                <option value="ألبسة
                ">ألبسة</option>
                <option value="ماكينة خياطة
                ">ماكينة خياطة</option>
                <option value="حاسب 
                ">حاسب</option>
                <option value="محتويات البراد
                ">محتويات البراد</option>
                </select>
                <br>
                 مادة أخرى
                  <br>       
                  <input type="text"  name="another" value="{{ Request::old('another') }}">
                   <br>
        <br>
      الوفرة
        <br>       
        <input type="text"  name="availablility" value="{{ Request::old('availablility') }}">
         <br>
        العدد
        <br>       
        <input type="number"  name="amount" value="{{ Request::old('amount') }}">
         <br>
        الحالة
        <br>       
        <input type="text"  name="status" value="{{ Request::old('status') }}">
         <br>
       المصدر
        <br>       
        <input type="text"  name="source" value="{{ Request::old('status') }}">
         <br>
         ملاحظات 
        <br>       
        <input type="text"  name="notes" value="{{ Request::old('notes') }}">
         <br>
         <input type="submit" value=" اضافة " class="btn TableOrBtn">
        </form>



<br>
<br>


        <a href={{ route('house_evaluation',$wr_id) }} class="btn TableOrBtn" style="  width: 75%;
        ">            <i class="fas fa-backward"></i>
</a>
        <br><br>
        <a href={{ route('delete_all_parts', ['w_id'=>$wr_id]) }} class="btn TableOrBtn">حذف</a>
        <br>
        <br>
        <br>
        <label for="">
          <h5 >التعديلات</h5>
        </label>
        <br><br><div class="row">
    <div class="col">
        <a href="{{ route('edit_basic_info', ['wr_id'=>$wr_id]) }}" class="btn TableOrBtn"> المعلومات الاساسية</a>

    </div>
    <div class="col">
        <a href="{{ route('edit_homeOwnership', ['wr_id'=>$wr_id]) }}" class="btn TableOrBtn"> الملكية</a>
    </div>
    <div class="col">
        <a href="{{ route('edit_financial_departs', ['wr_id'=>$wr_id]) }}" class="btn TableOrBtn"> القسم المالي</a>    
    </div>
  </div>
        <br>
        <br>
      </div>
    @endsection