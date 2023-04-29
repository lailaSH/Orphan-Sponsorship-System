@extends('layouts.index')
@section('content')
<div class="container">
   
    <label for=""><h5>
        اقسام الطلب</h5></label>
        <br><br>
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">المليكة</p>
                    </div>
                    <a href="{{ route('edit_homeOwnership', ['wr_id'=>$id]) }} ">
                                <i class="fas fa-home fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </a>

                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">القسم المالي</p>
                    </div>
                    <a href="{{ route('edit_financial_departs', ['wr_id'=>$id]) }}"  >
                        <i  class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">موجودات المنزل</p>
                    </div>
                    <a href="{{ route('edit_home_assets', ['r_id'=>$id]) }}"  >
                        <i class="fas fa-toolbox fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                    <div>
                        <p class="fs-5">تقيم المنزل</p>
                    </div>
                    <a href="{{ route('edit_house_evaluation', ['wr_id'=>$id]) }}"  >      
                                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid px-4" style="margin-right: 25%;">
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">الايتام</p>
                        </div>
                        <a href="{{ route('orphan_less_than_18', ['wr_id'=>$id,'num'=>1]) }}"  >
                        <i class="fas fa-baby fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
    
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">الايتام فوق 18</p>
                        </div>
                        <a href="{{ route('list_orphan_more_than_18', ['wr_id'=>$id,'num'=>1]) }}"  >
                                                    <i  class="fas fa-user-injured fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                </div>
    
               
               
            </div>
    
</div>
@endsection