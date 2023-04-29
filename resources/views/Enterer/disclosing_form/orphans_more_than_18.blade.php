@extends('layouts.index')

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

    <ul class="progressbar1">
      <li class="active"></li>
      <li  class="active" ></li>
      <li class="active"></li>
      <li class="active"></li>
      <li class="active"></li>
      <li  class="active"></li>
      <li class="active"></li>
      <li ></li>
    
              </ul>
              <br><br><br><br>
  

    <form action={{ route('fill_more_than_18_orphans',[$wr_id,$num])}}  enctype="multipart/form-data" method="POST">
        @csrf
<label for=""> الاسم</label>
            
        <br>       
        <input type="text"  name="name" value="{{ Request::old('name') }}">
         <br>
         <label for="">العمر</label>
          
           <br>       
         <input type="text"  name="age" value="{{ Request::old('age') }}">
          <br>
          <label for="">الشهادة</label><br><br>
          
          <select name="certificate">
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

              <br>
              <label for="">           الرغبة بالعمل
              </label>
           <br>       
          <input type="text"  name="desire_to_work" value="{{ Request::old('desire_to_work') }}">
           <br>
<label for="">ملاحظات</label>
           
           <br>       
          <input type="text"  name="notes" value="{{ Request::old('notes') }}">
           <br>
           
           <input type="submit" value=" حفظ " class="btn TableOrBtn">

        </form>


        @if ($num==1||$num==2)
        <a href={{ route('finish',['id'=>$wr_id,'num'=>2]) }} class="btn TableOrBtn">تم</a>
        <br>
        @else
  
<!-- Button trigger modal -->
<button type="button" class="btn TableOrBtn " data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fas fa-share" style="font-size: 13px; padding:3px"></i>
ارسال الطلب</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">التأكد من الارسال</h5>
      </div>
      <div class="modal-body">
        يرجى التأكد من ان جميع المعلومات صحيحة 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <a href={{ route('saved_successfully',$wr_id) }} class="btn TableOrBtn">
         إرسال الطلب</a>
      </div>
    </div>
  </div>
</div>
        <br>
        <br>
          <button type="button" class="btn TableOrBtn " data-toggle="modal" data-target="#exampleModalCenter2">
            <i class="fas fa-eraser" style="font-size: 13px; padding:3px"></i>
          حذف   </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">التأكد من حذف الطلب</h5>
                </div>
                <div class="modal-body">
سيتم حذف جميع معلومات  المدخلة                 </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                  <a href={{ route('delete_all_parts', ['w_id'=>$wr_id]) }} class="btn btn-danger">          
                    <i class="fas fa-eraser" style="font-size: 13px; padding:3px"></i>حذف</a>
                </div>
              </div>
            </div>
          </div>
          
        <br>
        <br>
        
        <label for="">
          <h5 >التعديلات</h5>
        </label>
        <br><br>
        <br>
        <div class="container-fluid px-4">
          <div class="row g-3 my-2">
              <div class="col-md-3">
                  <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #023e8a; color:white;">
                      <div>
                          <p class="fs-5">المليكة</p>
                      </div>
                      <a href="{{ route('edit_homeOwnership', ['wr_id'=>$wr_id]) }} ">
                                  <i class="fas fa-home fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                              </a>
  
                  </div>
              </div>
  
              <div class="col-md-3">
                  <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                      <div>
                          <p class="fs-5">القسم المالي</p>
                      </div>
                      <a href="{{ route('edit_financial_departs', ['wr_id'=>$wr_id]) }}"  >
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
                  <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                      <div>
                          <p class="fs-5">تقيم المنزل</p>
                      </div>
                      <a href="{{ route('edit_house_evaluation', ['wr_id'=>$wr_id]) }}"  >      
                                  <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                      </a>
                  </div>
              </div>
          </div>
          <div class="container-fluid px-4" style="margin-right: 25%;">
              <div class="row g-3 my-2">
                  <div class="col-md-3">
                      <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                          <div>
                              <p class="fs-5">الايتام</p>
                          </div>
                          <a href="{{ route('orphan_less_than_18', ['wr_id'=>$wr_id,'num'=>1]) }}"  >
                          <i class="fas fa-baby fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                          </a>
      
                      </div>
                  </div>
      
                  <div class="col-md-3">
                      <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                          <div>
                              <p class="fs-5">المعلومات الاساسية</p>
                          </div>
                          <a href="{{ route('edit_basic_info', ['wr_id'=>$wr_id]) }}">
                          <i  class="fas fa-universal-access fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                          </a>
                      </div>
                  </div>
      
                 
                 
              </div>
      
       
    @endif
</div>
@endsection