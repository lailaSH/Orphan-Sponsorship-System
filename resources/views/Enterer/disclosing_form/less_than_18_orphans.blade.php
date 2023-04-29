@extends('layouts.index')

@section('content')

<div class="container">
  <ul class="progressbar1">
    <li class="active"></li>
    <li  class="active" ></li>
    <li class="active"></li>
    <li class="active"></li>
    <li class="active"></li>
    <li  class="active"></li>
    <li ></li>
    <li ></li>
  
            </ul>
            <br><br><br><br>

<table class="table">
  <caption><a href={{route('orphan_store_page',[$wr_id,'num'=>2])}} class="btn TableOrBtn"><i class="fas fa-plus" style="font-size: 13px; padding:3px"></i>اضافة يتيم جديد</a></caption>
    <thead >
      <tr class="TableOrBtn">
        <th scope="col"></th>
        <th scope="col">الاسم</th>
        <th scope="col">الصف</th>
        <th scope="col">العمر</th>
        <th scope="col">الجنس</th>
        <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
  
@foreach ($orphans as $item)  
<tr>
<th scope="row"></th>
<td>{{$item->name}}</td>
<td>{{$item->class}}</td>
<td>{{$item->age}}</td>
<td>{{$item->gender}}</td>

<td>
  <a href="{{route('orphan_less_than_18_edit',[$item->id,$num])}}" ><i class="fas fa-edit"></i></td></a>
</tr>
@endforeach    
  </tbody>
  </table>
  @if ($num==1||$num==2)
  <a href={{ route('finish',['id'=>$wr_id,'num'=>1]) }} class="btn TableOrBtn">تم</a>
  <br>
  @else
<a href="{{route('orphanMore18',[$wr_id,0])}}" class="btn TableOrBtn" style="width: 75%">            <i class="fas fa-backward"></i>
</a>
  <br>
  <br>
  @endif
  <label for="">
    <h5 >التعديلات</h5>
  </label>
  <br><br>
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

       
    </div>
    <div class="container-fluid px-4" >
       
      <div class="row g-3 my-2">
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
      <div class="col-md-3">
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
           

           
           
        </div>

@endsection