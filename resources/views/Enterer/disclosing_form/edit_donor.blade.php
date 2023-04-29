@extends('layouts.index')
@section('content')
<div class="container">

<form action={{route('donor.Update',$donor->id)}} enctype="multipart/form-data" method="POST">
    @csrf
    <br>
    <label for="">    الاسم 
    </label>
    <br/>
    <input type="text" name="name" value="{{$donor->name}}">
    <br/>
    <label for="">    العمل 
    </label>
    <br/>
    <input type="text" name="work" value="{{$donor->work}}">
    <br/>
    <label for="">مدة الكفالة
    </label>
    <br/>
    <input type="text" name="period" value="{{$donor->period}}">
    <br/>
    <label for="">    تاريخ مباشرة الكفالة 
    </label>
    <br/>
    <input type="date" name="start_date" value="{{$donor->start_date}}">
    <br/>
    <label for="">    عدد الاطفال المكفولين 
    </label>
    <br/>
    <input type="text" name="number_orphans" value="{{$donor->number_orphans}}">
    <br/>
    <label for="">    مكان الاقامة 
    </label>
    <br/>
    <input type="text" name="Residence_place" value="{{$donor->Residence_place}}">
    <br/>
    <label for="">    رقم الموبايل 
    </label>
    <br/>
    <input type="text" name="number_phone" value="{{$donor->number_phone}}">
    <br/>

    <button type="submit"  class="btn TableOrBtn">
        <i class="fas fa-cloud-download-alt
        " style="padding:4px"></i>حفظ
     </button>
    
</form>
</div>
@endsection