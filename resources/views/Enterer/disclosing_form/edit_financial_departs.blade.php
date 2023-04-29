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
  
<form action={{ route('update_financial_departs',[$financial_departs->warranty_request_id])}} method="POST">
    @csrf
    <label for="">     من يساعد الاسرة بمصروف البيت
    </label>
<br/>
<label for="">من الاهل 
</label><br>
    <input type="text" name="MoneyFromParents" value="{{  $financial_departs->MoneyFromParents }}">
        <br/>
        <label for="">المبلغ</label>
     <br>
        <input type="number" name="AmountOfParents" value="{{  $financial_departs->AmountOfParents }}">
        <br/>
        <label for="">    من الاقارب
        </label><br>
         <input type="text" name="MoneyFromRelatives" value="{{  $financial_departs->MoneyFromRelatives }}">
         <br/>
         <label for="">المبلغ</label>
         <br>
         <input type="number" name="AmountOfRelatives" value="{{  $financial_departs->AmountOfRelatives }}">
<br/>
<label for="">     اهل الخير 
</label><br>
          <input type="text" name="MoneyFromManGood" value="{{  $financial_departs->MoneyFromManGood }}">
          <br/>
          <label for="">المبلغ</label>
         <br>
                   <input type="number" name="AmountOfManGood" value="{{  $financial_departs->AmountOfManGood }}">
         <br/>
         <label for="">من اين تستلم المونة
        </label><br>
<input type="text" name="WhereToGetHelp" value="{{  $financial_departs->WhereToGetHelp }}">
         <br/>
         <label for="">        تاريخ استلام اخر وجبة
        </label><br>
         <input type="date" name="LastDateOfReceipt" value="{{  $financial_departs->LastDateOfReceipt }}">
         <br/>
         <br/>
         <label for="">        ماهي الجمعيات الاخرى التي انتسبت اليها 
        </label><br>
           <input type="text" name="OtherAffiliatedAssociations" value="{{  $financial_departs->OtherAffiliatedAssociations }}">
          <br/>  
          <label for="">عدد الاولاد المكفولين بجمعية اخرى 
        </label>
<br>          <input type="number" name="ChildrensSponsoredByAnotherAssociation" value="{{  $financial_departs->ChildrensSponsoredByAnotherAssociation }}">
           <br/>  
           <label for="">المبلغ عن كل ولد
        </label><br>
             <input type="text" name="AmountEachChild" value="{{  $financial_departs->AmountEachChild }}">
            <br/>  
            <label for="">هل تستفيد من الانوروا
            </label>
<br>
            <input type="text" name="BeneficiaryOf_UN" value="{{ $financial_departs->BeneficiaryOf_UN }}">
             <br/> 
             <label for="">عدد المستفيدين
            </label><br>
               <input type="number" name="NumberOfBeneficiaries" value="{{ $financial_departs->NumberOfBeneficiaries }}">
              <br/>  <label for="">اخر مبلغ استلمته من الانوروا عن كل شخص
            </label><br>
              <input type="text" name="LastAmountReceivedFrom_UN_ForEachPerson" value="{{$financial_departs->LastAmountReceivedFrom_UN_ForEachPerson }}">
               <br/>  
               <label for="">المبلغ الاجمالي
            </label>
<br>
                 <input type="number" name="TotalAmountUN" value="{{ $financial_departs->TotalAmountUN }}">
                <br/> 
                 <label for="">هل يوجد راتب تقاعدي تستفيد منه الاسرة 
                </label><br>
                <input type="text" name="RetirementSalary" value="{{ $financial_departs->RetirementSalary }}">
                 <br/>
                 <br/>  
                 <label for="">المبلغ
                </label>
<br>                   <input type="number" name="AmountRetirementSalary" value="{{ $financial_departs->AmountRetirementSalary }}">
                  <br/>      
                  <label for="">عدد الافراد العاملين في الاسرة</label>
                  <br> 
                    <input type="number" name="NumberWorkersInFamily" value="{{$financial_departs->NumberWorkersInFamily }}">
                   <br/>     
                   <label for="">                راتب كل فرد 
                </label>
<br>                    <input type="text" name="EveryoneSalary" value="{{ $financial_departs->EveryoneSalary }}">
                    <br/>      
                    <label for="">      عدد الاشخاص الذين تتكفل الام بمصروفهم غير اولادها   
                    </label>
<br>
                    <input type="number" name="NumberOfPeopleExpensesMotherTakesCareOf" value="{{ $financial_departs->NumberOfPeopleExpensesMotherTakesCareOf }}">
                    <br/>
                    <label for="">صلة القرابة
                    </label><br>
                    <input type="text" name="RelativeRelation" value="{{ $financial_departs->RelativeRelation }}">
                    <br/>     
                    <label for="">السبب
                    </label><br>
                        <input type="text" name="Reason" value="{{ $financial_departs->Reason }}">
                    <br/>    
                    <label for="">
                        هل الام تتقن مهنة

                    </label><br>
                        <input type="text" name="MotherMasteredJob" value="{{ $financial_departs->MotherMasteredJob }}">
                        <br/>    
                        <label for="">                        ماهي المهنة
                        </label><br>
                    <input type="text" name="job" value="{{ $financial_departs->job }}">
                        <br/>      
                        <label for="">هل يوجد افتراح لاحد افراد الاسرة للمساعدة بتأسيس مشروع 
                        </label><br>
                        <input type="text" name="ProjectProposal" value="{{ $financial_departs->ProjectProposal }}">
                        <br/>     
                        <label for="">المشروع
                        </label><br>
                            <input type="text" name="Project" value="{{ $financial_departs->Project }}">
                            <br/>     
                            <label for="">الكلفة المتوقعة
                            </label><br>
                            <input type="number" name="ExpectedCostProject" value="{{ $financial_departs->ExpectedCostProject }}">
                            <br/>  
                            <label for="">                            عدد الاولاد المسافرين
                            </label><br>
                            <input type="number" name="NumberChildrenTravels" value="{{ $financial_departs->ExpectedCostProject }}">
                            <br/>
                            <label for="">                            المبلغ الذي يرسلونه شهريا
                            </label>
                            <br/> <input type="number" name="MonthlyAmount" value="{{ $financial_departs->ExpectedCostProject }}">
                            <br/>      
        <input type="submit" value="حفظ" class="btn TableOrBtn">
    </form>
</div>
@endsection