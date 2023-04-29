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

    <form action={{ route('update_house_evaluation',$house_evaluation->warranty_request_id)}}  enctype="multipart/form-data" method="POST">
        @csrf
        <label for="">      تقييم المنزل      
        </label>
<br>       
        <input type="text"  name="house_evaluation" value="{{ $house_evaluation->house_evaluation }}">
         <br>
<label for="">       درجة الفقر
</label>
<br>       
        <input type="text"  name="poor_degree" value="{{ $house_evaluation->poor_degree }}">
         <br>
<label for="">ملاحظات</label>
         
<br>       
        <input type="text"  name="notes" value="{{$house_evaluation->notes}}">
         <br>


         <input type="submit" value=" حفظ " class="btn TableOrBtn">
    </form>

</div>
@endsection