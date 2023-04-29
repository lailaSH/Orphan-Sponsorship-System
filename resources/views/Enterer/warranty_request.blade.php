@extends('layouts.index')

@section('content')
    <div class="container">
        @if (count($errors) > 0){
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        <br />
                    @endforeach
                </ul>
            </div>
            }
        @endif
        <ul class="progressbar">
<li class="active"></li>
<li ></li>
<li></li>
        </ul>
        <div class="form-group">
        <form action={{ route('warranty_request_store') }} id="usrform" enctype="multipart/form-data" method="POST">
            @csrf

            <label class="form-label" for="orphan_guardian"> وصي اليتيم</label><br>
            <input  type="text" id="orphan_guardian" name="orphan_guardian" value="{{ Request::old('orphan_guardian') }}">
            <br />

            <label class="form-label" for="relationship"> صلةالقرابة</label><br>
            <input type="text" id="relationship" name="relationship" value="{{ Request::old('relationship') }}">
            <br />

            <label class="form-label" for="birthday"> المواليد</label><br>
            <input type="date" id="birthday" name="birthday" value="{{ Request::old('birthday') }}">
            <br />

            <label for="certificate" class="form-label"> الشهادة التي يحملها</label><br>
            <input list="certificate" name="certificate" value="{{ Request::old('certificate') }}">
            <datalist id="certificate">
                <option value="certificate1"></option>
                <option value="certificate2"></option>
                <option value="certificate3"></option>
                <option value="certificate4"></option>
            </datalist>
            <br />

            <label for="work" class="form-label"> العمل</label><br>
            <input type="text" id="work" name="work" value="{{ Request::old('work') }}">
            <br />


            <label for="health_status" class="form-label"> الوضع الصحي</label><br>
            @php
            use App\Models\HealthtStatus;
            $healths=HealthtStatus::all();
                    @endphp
                        <select  name="statue[]"  multiple>
                         @foreach ($healths as $item)
                         <option value="{{$item->id}}">
                             {{$item->statue}}
                         </option>
                         @endforeach
                          
            
                        </select>
         <br>


            <label for="death_husband_name" class="form-label"> اسم الزوج المتوفي</label><br>
            <input type="text" id="death_husband_name" name="death_husband_name"
                value="{{ Request::old('death_husband_name') }}">
            <br />

            <label for="death_husband_date" class="form-label"> تاريخ الوفاة</label><br>
            <input type="date" id="death_husband_date" name="death_husband_date"
                value="{{ Request::old('death_husband_date') }}">
            <br />

            <label for="death_husband_work" class="form-label"> عمل الزوج المتوفي</label><br>
            <input type="text" id="death_husband_work" name="death_husband_work"
                value="{{ Request::old('death_husband_work') }}">
            <br />

            <label for="death_husband_salary" class="form-label"> يتقاضى راتب قدره</label><br>
            <input type="number" id="death_husband_salary" name="death_husband_salary"
                value="{{ Request::old('death_husband_salary') }}" min="0">
            <br />


            <label for="house" class="form-label"> المنزل </label><br>
            <select name="house" id="house" value="{{ Request::old('house') }}">
                <option value="Owned">ملك</option>
                <option value="rented">اجار</option>
                <option value="guests">استضافة</option>
            </select>
            <br />

            <label for="house_status" class="form-label"> حالة المنزل </label><br>
            <select name="house_status" id="house_status" value="{{ Request::old('house_status') }}">
                <option value="good">جيد</option>
                <option value="middle">وسط</option>
                <option value="bad">سيئ</option>
            </select>
            <br />
<br>
            <label for="address" class="form-label"> العنوان</label><br>
            <input type="text" id="address" name="address" value="{{ Request::old('address') }}">
            <div class="row" style="width: 81%">
                <div class="col">
                    <label for="phone_num"class="form-label"> الهاتف</label>
                    <input type="tel" id="phone_num" name="phone_num" placeholder="6473***" pattern="[0-9]{7}"
                        value="{{ Request::old('phone_num') }}" required><br>
                             
            
                </div>
                <div class="col">
           
                    <label for="mobile_num" class="form-label-lg"> الموبايل</label>
                    <input type="tel" id="mobile_num" name="mobile_num" placeholder="0999999999" pattern="[0-9]{10}"
                        value="{{ Request::old('mobile_num') }}" required><br>
                    <br />
        
                    
                </div>
               
              </div>
            
            <label for="applicant_name" class="form-label"> اسم مقدم الطلب</label><br>
            <input type="text" id="applicant_name" name="applicant_name"
                value="{{ Request::old('applicant_name') }}"><br>
            <br />
            <label  class="form-label">ملاحظات</label><br>
            <textarea name="comment" form="usrform" placeholder="هنا....." rows="4" cols="50"></textarea>
            <br>
            <button type="submit"  class="btn TableOrBtn">
                <i class="fas fa-forward"></i>
             </button>
            </form>
        </div>
    </div>
   
@endsection
