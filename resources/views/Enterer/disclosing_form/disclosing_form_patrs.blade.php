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
 

    <a href="#">orphans</a>
    <br>
        <a href={{ route('display_basic_info', ['r_id'=>$r_id]) }}>basic info</a>
        <br>
        <a href="#">home_ownership</a>
        <br>
        <a href="#">financial_departs</a>
        <br>
        <a href={{ route('display_home_assets', ['r_id'=>$r_id]) }}>home_assets</a>
        <br>
        <a href={{ route('display_orphans_more_than_18', ['r_id'=>$r_id]) }}>orphans more than 18</a>
        <br>
        <br>
    <br>





    
</div>
@endsection