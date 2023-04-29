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



    @php
    $item = DB::table('financial_departs')->where('warranty_request_id', $wr_id)->first();
    @endphp   
    
    @if ($item != null) 
    <h5> لقد قمت بتعبئة فورم القسم المادي لهذا الطلب
    برقم {{$wr_id}}
    </h5>
    <br>
    <br>
    <a href={{ route('house_asset', ['wr_id' => $wr_id]) }} class="btn TableOrBtn"> الانتقال إلى فورم موجودات المنزل</a>
    @endif

<br>

<ul class="progressbar1">
  <li class="active"></li>
  <li  class="active" ></li>
  <li  class="active" ></li>
  <li ></li>
  <li ></li>
  <li ></li>
  <li ></li>
  <li ></li>
          </ul>
          <br>

<form action="{{route('financial_store',$wr_id)}}" method="POST">
    @csrf
    <label for="expense_help">من يساعد الاسرة بمصروف البيت</label>
            <select name="expense_help" id="expense_help">
                <option value="yes" {{ Request::old('expense_help') == 'yes' ? 'selected' : '' }}>يوجد</option>
                <option value="no" {{ Request::old('expense_help') == 'no' ? 'selected' : '' }}>لا يوجد</option>
            </select>

            <div id="there_expense_help" {{ Request::old('expense_help') == 'no' ? 'style=display:none' : '' }}>
                <input type="checkbox" name="hobby[]" id="MoneyFromParents" value="1"
                @php $check1 @endphp
                    {{ $check1=(is_array(old('hobby')) and in_array(1, old('hobby'))) ? ' checked' : '' }}>

                <label for="MoneyFromParents"> الأهل</label>
                <div class="1 selectt" @if ($check1) style="display: inline" @else style="display: none" @endif >
                    <label for="AmountOfParents">المبلغ</label>
                    <input type="number" name="AmountOfParents" value="{{ Request::old('AmountOfParents') }}">
                </div><br>
                <input type="checkbox" name="hobby[]" id="MoneyFromRelatives" value="2"
                @php $check2 @endphp
                    {{ $check2=(is_array(old('hobby')) and in_array(2, old('hobby'))) ? ' checked' : '' }}>
                
                <label for="MoneyFromRelatives"> الأقارب</label>
                <div class="2 selectt" @if ($check2) style="display: inline" @else style="display: none" @endif>
                    <label for="AmountOfRelatives">المبلغ</label>
                    <input type="number" name="AmountOfRelatives" value="{{ Request::old('AmountOfRelatives') }}">
                </div><br>
                <input type="checkbox" name="hobby[]" id="MoneyFromManGood" value="3"
                @php $check3 @endphp
                    {{ $check3=(is_array(old('hobby')) and in_array(3, old('hobby'))) ? ' checked' : '' }}>

                <label for="MoneyFromManGood"> أهل الخير</label>
                <div class="3 selectt" @if ($check3) style="display: inline" @else style="display: none" @endif>
                    <label for="AmountOfManGood">المبلغ</label>
                    <input type="number" name="AmountOfManGood" value="{{ Request::old('AmountOfManGood') }}">
                </div><br>
            </div>

<br>




     <label for="">        من اين تستلم المؤونة
        </label><br>
<input type="text" name="WhereToGetHelp" value="{{ Request::old('WhereToGetHelp') }}">
         <br/>
         <label for="">          تاريخ استلام اخر وجبة
        </label><br>
         <input type="date" name="LastDateOfReceipt" value="{{ Request::old('LastDateOfReceipt') }}">
         <br/>
         <label for="">           ماهي الجمعيات الاخرى التي انتسبت اليها 
        </label><br>
           <input type="text" name="OtherAffiliatedAssociations" value="{{ Request::old('OtherAffiliatedAssociations') }}">
          <br/>  
          <div class="row" style="width: 88%">
            <div class="col">
                <label for="">            عدد الاولاد المكفولين بجمعية اخرى
                </label><br>
                <input type="number" name="ChildrensSponsoredByAnotherAssociation" value="{{ Request::old('ChildrensSponsoredByAnotherAssociation') }}">
                 <br/>  
                                  
        
            </div>
            <div class="col">
                <label for="">المبلغ عن كل ولد          
                </label><br>
                   <input type="text" name="AmountEachChild" value="{{ Request::old('AmountEachChild') }}">
                  <br/>  
              
            </div>
           
          </div>
        
            <label for="">            هل تستفيد من الأنوروا
            </label>
<br>            <input type="text" name="BeneficiaryOf_UN" value="{{ Request::old('BeneficiaryOf_UN') }}">
             <br/>  
             <div class="row" style="width: 88%">
                <div class="col">
                      
             <label for="">            عدد المستفيدين
            </label><br>
               <input type="number" name="NumberOfBeneficiaries" value="{{ Request::old('NumberOfBeneficiaries') }}">
              <br/> 
                      
            
                </div>
                <div class="col">
                    <label for="">
                        اخر مبلغ استلمته من الانوروا عن كل شخص
                        
                                      </label>
                        <br>
                                      <input type="text" name="LastAmountReceivedFrom_UN_ForEachPerson" value="{{ Request::old('LastAmountReceivedFrom_UN_ForEachPerson') }}">
                                       <br/>  
                                    
                </div>
               
              </div>
               <label for="">              المبلغ الاجمالي
              </label>
<br>                 <input type="number" name="TotalAmountUN" value="{{ Request::old('TotalAmountUN') }}">
                <br/> 
                <label for="">هل يوجد راتب تقاعدي تستفيد منه الاسرة 
                </label><br>
                <input type="text" name="RetirementSalary" value="{{ Request::old('RetirementSalary') }}">
                 <br/>
                 <label for="">              المبلغ
                </label><br>
                   <input type="number" name="AmountRetirementSalary" value="{{ Request::old('AmountRetirementSalary') }}">
                  <br/> 
                  <div class="row" style="width: 88%">
                    <div class="col">
                        <label for="">                   عدد الافراد العاملين في الاسرة 
                        </label><br>
                          <input type="number" name="NumberWorkersInFamily" value="{{ Request::old('NumberWorkersInFamily') }}">
                         <br/>    
                                          
                
                    </div>
                    <div class="col">
                        <label for="">        راتب كل فرد 
                        </label><br>
      <br>                     <input type="text" name="EveryoneSalary" value="{{ Request::old('EveryoneSalary') }}">
                          <br/>      
                       
                    </div>
                   
                  </div>
                   
                    <label for="">                     عدد الاشخاص الذين تتكفل الام بمصروفهم غير اولادها   
                    </label><br>
                      <input type="number" name="NumberOfPeopleExpensesMotherTakesCareOf" value="{{ Request::old('NumberOfPeopleExpensesMotherTakesCareOf') }}">
                     <br/>     
                     <label for="">                     صلة القرابة
                    </label><br>

                       <input type="text" name="RelativeRelation" value="{{ Request::old('RelativeRelation') }}">
                      <br/> <label for="">
                        السبب
                      </label><br>
                        <input type="text" name="Reason" value="{{ Request::old('Reason') }}">
                       <br/>
                       <label for="">                       هل الام تتقن مهنة
                      </label>    <br>
                         <input type="text" name="MotherMasteredJob" value="{{ Request::old('MotherMasteredJob') }}">
                        <br/>    
                        <label for="">   ماهي المهنة
                        </label><br>
                          <input type="text" name="job" value="{{ Request::old('job') }}">
                         <br/>     
                         <label for="">
                          هل يوجد افتراح لاحد أفراد الاسرة للمساعدة بتأسيس مشروع 

                         </label>
<br>
                         <input type="text" name="ProjectProposal" value="{{ Request::old('ProjectProposal') }}">
                        <br/>     
                        <label for="">         المشروع                      
                        </label><br>
                            <input type="text" name="Project" value="{{ Request::old('Project') }}">
                            <br/>     
<label for="">                         الكلفة المتوقعة
</label>
<br>
                            <input type="number" name="ExpectedCostProject" value="{{ Request::old('ExpectedCostProject') }}">
                            <br/>  
                            <div class="row" style="width: 88%">
                                <div class="col">
                                                
                                    <label for="">                            عدد الاولاد المسافرين
                                    </label><br>
                                    <input type="number" name="NumberChildrenTravels" value="{{ Request::old('ExpectedCostProject') }}">
                                    <br/>
                                    
                                </div>
                                <div class="col">
                            
                                    <label for="">     المبلغ الذي يرسلونه شهريا
                                    </label>
                                    <br/> <input type="number" name="MonthlyAmount" value="{{ Request::old('ExpectedCostProject') }}">
                                    <br/> 
                                </div>
                               
                              </div>
                                 
         <button type="submit"  class="btn TableOrBtn">
            <i class="fas fa-backward"></i>
         </button>
    </form>
    <br>
 
    <a href={{ route('delete_all_parts', ['w_id'=>$wr_id]) }} class="btn TableOrBtn">حذف</a>
    <br>
    <br>
    <br>
    <label for="">
      <h5 >التعديلات</h5>
    </label>
    <br><br>
    <div class="row">
      <div class="col">
        <a href="{{ route('edit_basic_info', ['wr_id'=>$wr_id]) }}" class="btn TableOrBtn"> المعلومات الاساسية</a>

      </div>
      <div class="col">
        <a href="{{ route('edit_homeOwnership', ['wr_id'=>$wr_id]) }}" class="btn TableOrBtn"> الملكية</a>
      </div>
      
    </div>
    <br>
    <br>
    <br>
</div>
<script>
  $('document').ready(function() {
      $("#expense_help").on('change', function() {
          var data = $(this).val();
          if (data == "yes") {
              $('#there_expense_help').show();
          } else {
              $('#there_expense_help').hide();
          }
      });
  });
  $(document).ready(function() {
      $('input[type="checkbox"]').click(function() {
          var inputValue = $(this).attr("value");
          $("." + inputValue).toggle();
      });
  });
</script>
@endsection