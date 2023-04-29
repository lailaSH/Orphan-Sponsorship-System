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


@php
 $item = DB::table('basic_infos')->where('warranty_request_id', $wr_id)->first();
 @endphp
        @if ($item != null) 
            
<h5>
    لقد قمت بتعبئة فورم المعلومات الاساسية لهذا الطلب 
   {{$wr_id}} برقم 
</h5>
    <br>
    <a href={{ route('HomeOwnerships', ['wr_id' => $wr_id]) }} class="btn TableOrBtn">الانتقال إلى فورم الملكية</a>     
<br><br>
    @endif

<ul class="progressbar1">
    <li class="active"></li>
    <li   ></li>
    <li ></li>
    <li ></li>
    <li ></li>
    <li ></li>
    <li ></li>
    <li ></li>

            </ul>
            <br>

    <form action={{ route('fill_Basic_info',$wr_id)}}  enctype="multipart/form-data" method="POST">
        @csrf
        <br><br><label >
            <h5>
     ---المعلومات الأساسية---
    </h5>
    </label>
     <br>
     <label for="family_type">نوع العائلة</label><br>
     <select id="family_type" name="family_type">
         <option value="resident" selected>مقيم</option>
         <option value="deserted">مهجر</option>
     </select>
     <br>

     <br>
     <div class="row">
        <div class="col">
            <label >
                اسم العائلة
        
             </label>
                <br>  
                     
                <input type="text"  name="family_name" value="{{ Request::old('family_name') }}">
                    <br>
        </div>
        <div class="col">
            <label >            اسم الأم
            </label>
            <br>
            <input type="text"  name="mother_name" value="{{ Request::old('mother_name') }}">
           
        </div>
       
      </div>
    
         <br>
         <div class="row">
            <div class="col">
                <label for="">
                    هل الأم تعمل 
    
                </label>
                <select id="ifWork" name="ifWork">
                    <option value="yes" >نعم</option>
                    <option value="no" selected>لا</option>
                </select>
                <br> </div>
            <div class="col">
                <label >            الحالة الاجتماعية للأم  
                </label>
        
                <select name="social_stuation">
                    <option value="married"> متزوجة </option> {{-- edited --}}
                    <option value="widow"> أرملة </option> {{-- edited --}}
                    <option value="deceased"> متوفية </option> {{-- edited --}}
                </select>
    
<br>
            </div>
           
          </div>
           
            {{-- from here new new new new new new --}}
        <br>
            <div id="mother_job_input" style="display: none">
                <div class="row">
                    <div class="col">
                        <label >            عمل الأم
                        </label>
                        <br>
                        <input type="text"  name="mother_job" value="{{ Request::old('mother_job') }}">
                        <br>
                 
                    </div>
                    <div class="col">
                        <label >
                            راتب الأم
            
                        </label>
                        <br>
                    
                        <input type="number"  name="mother_salary" value="{{ Request::old('mother_salary') }}">
                        <br>
                    </div>
                   
                  </div>
                          
        </div> 
                <br>
           
                <div class="row">
                    <div class="col">
                                    
<label >        اسم الأب
</label>
        <br>
         <input type="text"  name="father_name" value="{{ Request::old('father_name') }}">
         <br>
   
                    </div>
                    <div class="col">
                        <label >         تاريخ الوفاة
                        </label>
                        <br>
                         <input type="date"  name="death_date" value="{{ Request::old('death_date') }}">
                         <br>
                         <br>
                    </div>
                   
                  </div>
         <label >
            سبب الوفاة

         </label>
         <br>
         <input type="text"  name="death_reason" value="{{ Request::old('death_reason') }}">
         <br>
         
         <br>
         <label >
            <h5>
                -- معلومات الوصي--
            </h5>
    </label>
         <br>
         <br>
         <label for="guardian_type">نوع الوصاية</label>
            <select name="guardian_type" id="guardian_type">
                <option value="mother_guardian" selected>وصي الأم</option>
                <option value="legal_guardian" >وصي شرعي</option>
            </select>
<br>

<div id="guardian_input" style="display: none">
    <label for="guardian_name">اسم الوصي</label>
    <input type="text" name="guardian_name" value="{{ Request::old('guardian_name') }}">
    <br>
    <label for="guardian_relative_relation">صلة قرابة الوصي</label>
    <input type="text" name="guardian_relative_relation"
        value="{{ Request::old('guardian_relative_relation') }}">
    <br>
    <label for="guardian_Work_choice">هل الوصي يعمل</label>
    <select name="guardian_Work_choice" id="guardian_Work_choice">
        <option value="yes" >يعمل</option>
        <option value="no" selected>لا يعمل</option>
    </select>
    <div id="guardian_Work_input" style="display: none">
        <label for="guardian_job">عمل الوصي</label>
        <input type="text" name="guardian_job" value="{{ Request::old('guardian_job') }}">
        <br>
        <label for="guardian_salary">راتب عمل الوصي</label>
        <input type="number" name="guardian_salary" value="{{ Request::old('guardian_salary') }}">
        <br>
    </div>
</div>

<br>
<div class="row">
    <div class="col">
        <label >           الهاتف الأرضي
        </label>
           <br>
         <input type="text"  name="telephone_fix" value="{{ Request::old('telephone_fix') }}">
         <br>
                    

    </div>
    <div class="col">

        <label >         رقم الموبايل
        </label>
         <br>
         <input type="text"  name="mobile" value="{{ Request::old('mobile') }}">
         <br>

    </div>
   
  </div>
         <label >         العنوان الأصلي
        </label>
         <br>
         <input type="text"  name="original_address" value="{{ Request::old('original_address') }}">
         <br>
         <label >
            العنوان الحالي

         </label>
        <br>
         <input type="text"  name="current_address" value="{{ Request::old('current_address') }}">
         <br>
         <br>
         <br>
         <label >
            <h5>
                -----الأولاد----
            </h5>
    </label>
       
         <br>
         <br>
         <label >        عدد الأولاد الكلي 
        </label>
        <br>
         <br>
         <input type="number"  name="full_children_number" value="{{ Request::old('full_children_number') }}">
         <br>
         <label >        عدد الأولاد المقيمين مع الأم
        </label>
         <br>
         <input type="number"  name="number_of_children_residing_with_the_mother" value="{{ Request::old('number_of_children_residing_with_the_mother') }}">
         <br>
         <label >         عدد الأولاد المتزوجين
        </label>
         <br>
         <input type="number"  name="married_children_number" value="{{ Request::old('married_children_number') }}">
         <br>
         <label >عدد الأولاد المتزوجين المقيمين مع الأم 
        </label>
            <br>
         <input type="number"  name="married_sons_number_resident" value="{{ Request::old('married_sons_number_resident') }}">
         <br>
         <label >         عدد الأولاد المتزوجين المنفصلين عن الأم 
        </label>
         <br>
         <input type="number"  name="married_sons_number_separated" value="{{ Request::old('married_sons_number_separated') }}">
         <br>
         <button type="submit"  class="btn TableOrBtn">
            <i class="fas fa-backward"></i>
         </button>
            </form>
    <br>
    <a href={{ route('delete_all_parts', ['w_id'=>$wr_id]) }} class="btn TableOrBtn">حذف</a>
</div>
<script>
    $('document').ready(function() {
        $("#ifWork").on('change', function() {
            var data = $(this).val();
            if (data == "yes") {
                $('#mother_job_input').show();
            } else {
                $('#mother_job_input').hide();
            }
        });
    });

    $('document').ready(function() {
        $("#guardian_type").on('change', function() {
            var data = $(this).val();
            if (data == "mother_guardian") {
                $('#guardian_input').hide();
            } else {
                $('#guardian_input').show();
            }
        });
    });

    $('document').ready(function() {
        $("#guardian_Work_choice").on('change', function() {
            var data = $(this).val();
            if (data == "yes") {
                $('#guardian_Work_input').show();
            } else {
                $('#guardian_Work_input').hide();
            }
        });
    });
</script>


@endsection