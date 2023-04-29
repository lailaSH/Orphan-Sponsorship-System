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
    @if ($basic_info==null)
    <p>khaled</p>
        
    @endif

    <form action={{route('update_basic_info',['wr_id'=>$basic_info->warranty_request_id])}}  enctype="multipart/form-data" method="POST">
        @csrf
        <label >
          <h5>
   ---المعلومات الأساسية---
  </h5>
  </label><br>
<br>
<label >
  اسم العائلة

</label>
       <br>       
        <input type="text"  name="family_name" value="{{ $basic_info->family_name}}">
         <br>
         <label >            اسم الأم
        </label>         <br>
         <input type="text"  name="mother_name" value="{{ $basic_info->mother_name }}">
         <br>
         <label for="">
          عمل الأم

         </label>
         <br>
         <input type="text"  name="mother_job" value="{{ $basic_info->mother_job }}">
         <br>
         <label for="">         راتب الأم
        </label>
         <br>
         <input type="number"  name="mother_salary" value="{{ $basic_info->mother_salary }}">
         <br>
         <label for="">         الحالة الاجتماعية للأم
        </label>
         <br>
         <input type="text"  name="social_stuation" value="{{ $basic_info->social_stuation }}">
         <br> <br>
         <label for="">         الحالة الاجتماعية للأم  
        </label>
          <br>
         <select name="social_stuation">
                 <option value="
                 متزوجة
                 ">  متزوجة </option>
 
                 <option value="
                أرملة
                 ">  أرملة </option>
                 <option value="
               غير محدد
                  ">  غير ذلك </option>
         </select>

<br>
<label for="">        اسم الأب
</label>
        <br>
         <input type="text"  name="father_name" value="{{ $basic_info->father_name }}">
         <br>
         <label for="">         سبب الوفاة
        </label><br>
         <input type="text"  name="death_reason" value="{{ $basic_info->death_reason }}">
         <br>
         <label for="">         تاريخ الوفاة
        </label><br>
         <input type="date"  name="death_date" value="{{ $basic_info->death_date }}">
         <br>
         <br>
         <br>
         <label >
          <h5>
            -- معلومات الوصي--
          </h5>
  </label><br>
         <br>
         <label for="">         اسم الوصي
        </label>
         <br>
          <input type="text"  name="guardian_name" value="{{ $basic_info->guardian_name }}">
          <br>
          <label for="">         عمل الوصي
          </label>
        <br>
         <input type="text"  name="guardian_job" value="{{ $basic_info->guardian_job }}">
         <br>
         <label for="">         راتب الوصي
        </label>
        <br>
         <input type="number"  name="guardian_salary" value="{{ $basic_info->guardian_salary }}">
         <br>
         <label for="">صلة قرابة الوصي                  
        </label>
        <br>
         <input type="text"  name="guardian_relative_relation" value="{{ $basic_info->guardian_relative_relation }}">
         <br>
         <label for="">           الهاتف الأرضي
        </label>
           <br>
         <input type="text"  name="telephone_fix" value="{{ $basic_info->telephone_fix }}">
         <br>
         <label for="">         رقم الموبايل
        </label>
         <br>
         <input type="text"  name="mobile" value="{{ $basic_info->mobile }}">
         <br>

         <label for="">         العنوان الأصلي
        </label>
         <br>
         <input type="text"  name="original_address" value="{{ $basic_info->original_address }}">
         <br>
         <label for="">        العنوان الحالي
        </label>
        <br>
         <input type="text"  name="current_address" value="{{ $basic_info->current_address }}">
         <br>
         <br>
         <br>
         <label >
          <h5>
            -----الأولاد----
          </h5>
  </label><br>
         <br>
         <br>
         <label for="">        عدد الأولاد الكلي 
        </label>
        <br>
         <br>
         <input type="number"  name="full_children_number" value="{{$basic_info->full_children_number }}">
         <br>
         <label for="">        عدد الأولاد المقيمين مع الأم
        </label>
         <br>
         <input type="number"  name="number_of_children_residing_with_the_mother" value="{{ $basic_info->number_of_children_residing_with_the_mother }}">
         <br>
         <label for="">         عدد الأولاد المتزوجين
        </label>
         <br>
         <input type="number"  name="married_children_number" value="{{ $basic_info->married_children_number }}">
         <br>
         <label for="">عدد الأولاد المتزوجين المقيمين مع الأم 
        </label>
            <br>
         <input type="number"  name="married_sons_number_resident" value="{{ $basic_info->married_sons_number_resident }}">
         <br>
         <label for="">         عدد الأولاد المتزوجين المنفصلين عن الأم 
        </label>
         <br>
         <input type="number"  name="married_sons_number_separated" value="{{ $basic_info->married_sons_number_separated }}">
         <br>
         <input type="submit" value=" حفظ " class="btn TableOrBtn">
    </form>
</div>
@endsection