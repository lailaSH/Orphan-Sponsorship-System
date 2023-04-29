@extends('layouts.index2')
@section('content')
  
  @if ($financial_departs!=null)
    
  
  <table class="table">
    <tr class="TableOrBtn">
      <th>#</th>
      <th>الوصف</th> 
    </tr>

    <tr>
      <th scope="row" class="TableOrBtn">من يساعد الاسرة بمصروف البيت</th>

      <td >
        {{$financial_departs->AmountOfParents}} : المبلغ المقدم من الاهل 
        <br>
        {{$financial_departs->AmountOfRelatives}} : المبلغ المقدم من الاقارب
        <br>
        {{$financial_departs->AmountOfManGood}} : المبلغ المقدم من اهل الخير  
      </td>
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">من اين تستلم المونة</th>

      <td>
        {{$financial_departs->WhereToGetHelp}}
      </td>
    </tr>
    <tr>
      <th scope="row " class="TableOrBtn">تاريخ استلام اخر وجبة</th>

      <td>
        {{$financial_departs->LastDateOfReceipt}}
      </td>
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">الجمعيات الاخرى التي انتسبت اليها </th>

      <td>
        {{$financial_departs->OtherAffiliatedAssociations}}
      </td>
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">عدد الاولاد المكفولين بجمعية اخرى </th>

      <td>
        {{$financial_departs->ChildrensSponsoredByAnotherAssociation}}
      </td>
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">
        المبلغ عن كل ولد
      </th>
      <td>
        {{$financial_departs->AmountEachChild}}
      </td>
      
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">
        هل تستفيد من الانوروا
      </th>
      <td>
        {{$financial_departs->BeneficiaryOf_UN}}
      </td>
      
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">
        عدد المستفيدين
      </th>
      <td>
        {{$financial_departs->NumberOfBeneficiaries}}
      </td>
     
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">
        اخر مبلغ استلمته من الانوروا عن كل شخص
      </th>
      <td>
        {{$financial_departs->LastAmountReceivedFrom_UN_ForEachPerson}}
      </td>
     
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">
        المبلغ الاجمالي
      </th>
      <td>
        {{$financial_departs->TotalAmountUN}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        هل يوجد راتب تقاعدي تستفيد منه الاسرة 
      </th>
      <td>
        {{$financial_departs->RetirementSalary}}
      </td>
      
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        المبلغ
      </th>
      <td>
        {{$financial_departs->AmountRetirementSalary}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        عدد الافراد العاملين في الاسرة 
      </th>
      <td>
        {{$financial_departs->NumberWorkersInFamily}}
      </td>
      
    </tr>
  
    <tr>
      <th scope="row" class="TableOrBtn">
        راتب كل فرد 
      </th>
      <td>
        {{$financial_departs->EveryoneSalary}}
      </td>
      
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        عدد الاشخاص الذين تتكفل الام بمصروفهم غير اولادها   
     </th>
      <td>
        {{$financial_departs->NumberOfPeopleExpensesMotherTakesCareOf}}
      </td>
      
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        صلة القرابة
      </th>
      <td>
        {{$financial_departs->RelativeRelation}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        السبب
      </th>
      <td>
        {{$financial_departs->Reason}}
      </td>
    
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        هل الام تتقن مهنة
      </th>
      <td>
        {{$financial_departs->MotherMasteredJob}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        هل يوجد افتراح لاحد افراد الاسرة للمساعدة بتأسيس مشروع 
      </th>
      <td>
        {{$financial_departs->ProjectProposal}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        المشروع
      </th>
      <td>
        {{$financial_departs->Project}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        الكلفة المتوقعة
      </th>
      <td>
        {{$financial_departs->ExpectedCostProject}}
      </td>
     
    </tr>
    
    <tr>
      <th scope="row" class="TableOrBtn">
        عدد الاولاد المسافرين
      </th>
      <td>
        {{$financial_departs->NumberChildrenTravels}}
      </td>
     
    </tr>
    <tr>
      <th scope="row" class="TableOrBtn">
        المبلغ الذي يرسلونه شهريا
      </th>
      <td>
        {{$financial_departs->MonthlyAmount}}
      </td>
     
    </tr>
  </table>


  @endif



    



  <br>
  <br>
  <br>
  <a href={{ route('display_request', ['id'=>$r_id]) }} class="btn TableOrBtn">معلومات الطلب</a>
  <br>
  <br>
  <br>


@include('Director.disclosing_form_parts')

@endsection
