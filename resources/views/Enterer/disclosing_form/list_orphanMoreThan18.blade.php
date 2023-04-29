@extends('layouts.index')

@section('content')
<div class="container">
  
<table class="table">
  <caption><a href={{route('orphanMore18',[$wr_id,1])}}>add</a></caption>
    <thead >
      <tr class="table-primary">
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Certificate</th>
        <th scope="col">Desire To Work</th>
        <th scope="col">Notes</th>
        <th scope="col"> </th>

    </tr>
    </thead>
    <tbody>
@php
$i=0;
@endphp
@foreach ($orphans as $item)  
<tr>
<th scope="row"></th>
<td>{{$item->name}}</td>
<td>{{$item->age}}</td>
<td>{{$item->certificate}}</td>
<td>{{$item->desire_to_work}}</td>
<td>{{$item->notes}}</td>
<td>
  <a href="{{route('orphan_more_than_18_edit',[$item->id])}}"><i class="far fa-edit fa-lg fa-color"></i></td></a>
</tr>

@endforeach          
      
</tbody>
  </table>
  <br>
<a href={{ route('finish',['id'=>$wr_id,'num'=>1]) }}>Finish</a>

@endsection