@extends('layouts.index2')
@section('content')
<br>
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #023e8a; color:white;">
                <div>
                    <p class="fs-5">المليكة</p>
                </div>
                <a href="{{ route('display_basic_info', ['r_id'=>$r_id]) }}" >
                <i class="fas fa-home fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>

            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                <div>
                    <p class="fs-5">القسم المالي</p>
                </div>
                <a href="{{ route('display_financial_departs', ['r_id'=>$r_id]) }}">
                <i  class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                <div>
                    <p class="fs-5">موجودات المنزل</p>
                </div>
                <a href={{ route('display_home_assets', ['r_id'=>$r_id]) }} >
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
                        <p class="fs-5">الايتام</p>
                    </div>
                    <a href="{{ route('display_orphan_less_than_18', ['r_id'=>$r_id]) }}">
                    <i class="fas fa-baby fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>

                </div>
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">الايتام فوق 18</p>
                    </div>
                    <a href={{ route('display_orphans_more_than_18', ['r_id'=>$r_id]) }} >
                    <i  class="fas fa-user-injured fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>
                </div>
            </div>

           
           
        </div>



<div class="row">
    <div class="col">

    </div>
    <div class="col">

    </div>
    <div class="col">

    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col">

    </div>
    <div class="col">

    </div>
    <div class="col">

    </div>
  </div>
<br>
    <br>
    <br>
  
<br>
    @show