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
<form action={{route('update_homeOwnership',$homeOwnership->warranty_request_id)}} enctype="multipart/form-data" method="POST">
  @csrf
  <label for="">   نوع الملكية
  </label><br><br>
  <select id="type_ownerships" name="type_ownerships">
   <option value="ملك" @if($homeOwnership->type_ownerships == 'ملك') selected @endif>
     ملك
   </option>
   <option value="اجار"  @if($homeOwnership->type_ownerships == 'اجار') selected @endif>
     اجار
   </option>
   <option value="اعارة"  @if($homeOwnership->type_ownerships == 'اعارة') selected @endif>
     اعارة
   </option>
   <option value="استضافة"  @if($homeOwnership->type_ownerships == 'استضافة') selected @endif>
     استضافة
   </option>
      </select>
 <br/>
 <div id="home_owner"  @if($homeOwnership->type_ownerships == 'اجار') style="display: none" @endif>
  <label for="">  صاحب البيت
  </label>     <br>    
  <input  type="text" name="home_owner" value="{{ $homeOwnership->home_owner }}">
  <br/>
 </div>
 <div id="rent"  @if($homeOwnership->type_ownerships == 'ملك'||$homeOwnership->type_ownerships == 'اعارة'||$homeOwnership->type_ownerships == 'استضافة'
  ) style="display: none" @endif>
  <label for=""> مبلغ الاجار 
  </label>
<br> 
  <input  type="number" name="amount_rent" value="{{ $homeOwnership->amount_rent }}">
 <label for="">   المبلغ الذي تدفعه من الايجار 
</label><br>
  <input  type="number" name="amount_pay_rent" value="{{ $homeOwnership->amount_pay_rent }}">
  <br/>
  <label for=""> من يشاركها بدفع الاجار 
  </label><br>
   <input  type="text" name="participants_in_pay" value="{{ $homeOwnership->participants_in_pay }}">
  <br/>
  <label for="">
    من أين تؤمن المبلغ

  </label>
  <br>
  <input  type="text" name="where_from_secure_money" value="{{ $homeOwnership->where_from_secure_money }}">
  <br/>
 </div>
  <br/>
  <label for=""> عدد غرف البيت 
  </label><br>
   <input  type="number" name="number_room" value="{{ $homeOwnership->number_room }}">
  <br/>
  <label for=""> عدد الاشخاص الموجودين بنفس البيت 
  </label>
<br>
   <input  type="number" name="number_people_in_home" value="{{ $homeOwnership->number_people_in_home }}">
  <br/>
  <label for="">
     صلة القرابة

  </label>
  <br>
  <input  type="text" name="relative_relation" value="{{ $homeOwnership->relative_relation }}">
  <br/>
  <input type="submit" value="حفظ" class="btn TableOrBtn">
</form>
</div>
<script>
$(document).ready(function(){
$('#type_ownerships').on('change', function() {
  var value = $(this).val();
if(value=='اعارة'||value=='استضافة' ||value=='ملك')
{
$('#home_owner').show();
$('#rent').hide();

}else if(value=='اجار')
{
$('#home_owner').hide();
$('#rent').show();
}
});
});

</script>
@endsection