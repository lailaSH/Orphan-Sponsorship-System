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
    <form action={{ route('update_home_asset',$assest->id)}}  enctype="multipart/form-data" method="POST">
        @csrf
        <label for="">    المادة 
        </label>
        <br>
        <input type="text"  name="element" value="{{ $assest->element }}">
        <br>
        <br>
        <label for="">الوفرة</label>
        
        <br>       
        <input type="text"  name="availablility" value="{{  $assest->availablility }}">
        <br>
        <label for="">العدد</label>
        
        <br>       
        <input type="number"  name="amount" value="{{  $assest->amount }}">
        <br>
        <label for="">الحالة</label>
        
        <br>       
        <input type="text"  name="status" value="{{  $assest->status }}">
        <br>
        <label for="">المصدر</label>
        
        <br>       
        <input type="text"  name="source" value="{{  $assest->source }}">
        <br>
        <label for="">ملاحظات</label>
         
        <br>       
        <input type="text"  name="notes" value="{{ $assest->notes }}">
        <br>
        <input type="submit" value=" حفظ " class="btn TableOrBtn">
        </form>
<br>
    </div>
    @endsection