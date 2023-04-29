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
    $item = DB::table('home_ownerships')->where('warranty_request_id', $wr_id)->first();
    @endphp   
    
    @if ($item != null) 
    <h5> لقد قمت بتعبئة فورم ملكية لهذا الطلب
    برقم {{$wr_id}}
    </h5>
    <br>
    <br>
    <a href={{ route('financial_departs', ['wr_id' => $wr_id]) }}  class="btn TableOrBtn"> الانتقال إلى فورم القسم المادي</a>
    @endif

<br>
<br>
<br>
<ul class="progressbar1">
  <li class="active"></li>
  <li  class="active" ></li>
  <li ></li>
  <li ></li>
  <li ></li>
  <li ></li>
  <li ></li>
  <li ></li>

          </ul>
          <br>

<form action={{route('HomeOwnerships.store',$wr_id)}} enctype="multipart/form-data" method="POST">
  @csrf
  <label for="type_ownerships">نوع الملكية</label><br>
  <select id="type_ownerships" name="type_ownerships">
      <option value="owned" selected>ملك</option>
      <option value="rent">اجار</option>
      <option value="borrowed">إعارة</option>
      <option value="hosted">استضافة</option>
  </select>
  <br><br>
  <div id="home_owner">
      <label for="home_owner">صاحب البيت</label><br>
      <input type="text" name="home_owner" value="{{ Request::old('home_owner') }}">
  </div>
  <div id="rent" style="display: none">

  <div class="row">
    <div class="col">
         
    <label for="amount_rent">مبلغ الاجار</label><br>
    <input type="number" name="amount_rent" value="{{ Request::old('amount_rent') }}">

    <br><br>           

    </div>
    <div class="col">

        <label for="amount_pay_rent">المبلغ الذي تدفعه من الايجار</label><br>
        <input type="number" name="amount_pay_rent" value="{{ Request::old('amount_pay_rent') }}">
  
        <br><br>
  
    </div>
   
  </div>
      <label for="participating_party">هل يوجد من يشاركها بدفع الاجار</label>
      <select name="participating_party" id="participating_party">
          <option value="yes">يوجد</option>
          <option value="no" selected>لا يوجد</option>
      </select>

      <div id="participants_input" style="display: none">
          <label for="participants_in_pay">الجهة المشاركة</label><br>
          <input type="text" name="participants_in_pay" value="{{ Request::old('participants_in_pay') }}">
          <br>
      </div>

      <br>
      <label for="where_from_secure_money">من أين تؤمن المبلغ</label><br>
      <input type="text" name="where_from_secure_money" value="{{ Request::old('where_from_secure_money') }}">


  </div>
       <br/>
       <div class="row">
        <div class="col">
                        
            <label for="">        عدد غرف البيت 
            </label><br>
              <input  type="number" name="number_room" value="{{ Request::old('number_room') }}">
             <br/>
            
        </div>
        <div class="col">
    
            <label for="">         عدد الاشخاص الموجودين بنفس البيت 
            </label>
            <br>
              <input  type="number" name="number_people_in_home" value="{{ Request::old('number_people_in_home') }}">
             <br/>
        </div>
       
      </div>
    
         <label for="">          صلة القرابة
        </label><br>
         <input  type="text" name="relative_relation" value="{{ Request::old('relative_relation') }}">
         <br/>
         <button type="submit"  class="btn TableOrBtn">
            <i class="fas fa-backward"></i>
         </button>    </form>
<br>
<a href={{ route('delete_all_parts', ['w_id'=>$wr_id]) }}  class="btn TableOrBtn">حذف</a>
<br>
<br>
    <br>
    <a href="{{ route('edit_basic_info', ['wr_id'=>$wr_id]) }}"  class="btn TableOrBtn">تعديل المعلومات الاساسية</a>
    <br>
    <br>
</div>
<script>
  $(document).ready(function() {

      $('#type_ownerships').on('change', function() {
          var value = $(this).val();
          if (value == 'owned' || value == 'borrowed' || value == 'hosted') {
              $('#home_owner').show();
              $('#rent').hide();

          } else if (value == 'rent') {
              $('#home_owner').hide();
              $('#rent').show();
          }
      });
  });

  $(document).ready(function() {
      $('#participating_party').on('change', function() {
          var value = $(this).val();
          if (value == 'yes') {
              $('#participants_input').show();
          } else if (value == 'no') {
              $('#participants_input').hide();
          }
      });
  });
</script>
@endsection