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
        <li class="active"></li>
        <li class="active"></li>
        <li class="active"></li>
        <li ></li>
                <li ></li>
                <li ></li>

                </ul>
                <br><br><br>
    <form action={{ route('fill_house_evaluation',$wr_id)}}  enctype="multipart/form-data" method="POST">
        @csrf

<label for="">        تقييم المنزل 
</label>
                <br><br>
       <select name="house_evaluation">
               <option value="
                      جيد
               ">  جيد </option>

               <option value="
وسط
">  وسط </option>
               <option value="
رديء">  
رديء </option>
       </select>

<br>
<br>
<label for="">درجة الفقر
</label>
<br><br>
<select name="poor_degree">
<option value="
      شديد
">  شديد </option>

<option value="
وسط
">  وسط </option>
<option value="
جيد">  
جيد </option>
</select>

<br><br>
<label for="">         ملاحظات
</label>
<br>       
        <input type="text"  name="notes" value="{{ Request::old('notes') }}">
         <br>


         <button type="submit"  class="btn TableOrBtn">
            <i class="fas fa-backward"></i>
         </button>
    </form>
<br>
<a href={{ route('delete_all_parts', ['w_id'=>$wr_id] ) }} class="btn TableOrBtn">
    <i class="fas fa-eraser" style="font-size: 13px; padding:3px"></i>حذف</a>
    <br>

<br>
<label for="">
  <h5 >التعديلات</h5>
</label>
<br><br>
 <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">المليكة</p>
                    </div>
                    <a href="{{ route('edit_homeOwnership', ['wr_id'=>$wr_id]) }}" >
                    <i class="fas fa-home fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </a>

                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">القسم المالي</p>
                    </div>
                    <a href="{{ route('edit_financial_departs', ['wr_id'=>$wr_id]) }}">
                                                <i  class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">موجودات المنزل</p>
                    </div>
                    <a href="{{ route('edit_home_assets', ['r_id'=>$wr_id]) }}"  >
                        <i class="fas fa-toolbox fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
            </div>
        </div>
        <div class="container-fluid px-4" style="margin-right: 25%;">
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">المعلومات الاساسية</p>
                        </div>
                        <a href="{{ route('edit_basic_info', ['wr_id'=>$wr_id]) }}" >
                        <i class="fas fa-universal-access fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
    
                    </div>
                </div>
    
                <div class="col-md-3">
                </div>
    
               
               
            </div>
    
<br>
<br>


</div>
@endsection