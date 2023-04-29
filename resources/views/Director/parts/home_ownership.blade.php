@extends('layouts.index2')
@section('content')
  
  @if ($ownership!=null)
    
  
  <table class="table">
    <tr class="TableOrBtn">
      <th></th>
      <th>الوصف</th> 
    </tr>

    <tr>
      <th scope="row" class="TableOrBtn">
        نوع الملكية
     </th>
      <td>
        
        {{$ownership->type_ownerships}}  
       </td>
    
    </tr>
    
    <tr>
      <th scope="row" class=" TableOrBtn">
        صاحب البيت      </th>
    
      <td>
        {{$ownership->home_owner}}
      </td>
    </tr>
    <tr>
      <th scope="row" class=" TableOrBtn">
        مبلغ الاجار  
          </th>
      <td>
        {{$ownership->amount_rent}}
      </td>
      
    </tr>
    <tr>
      <th scope="row" class=" TableOrBtn">
        المبلغ الذي تدفعه من الايجار </th>
    </tr>
      <td>
        {{$ownership->amount_pay_rent}}
      </td>
      
    <tr>
      <th scope="row" class=" TableOrBtn">من يشاركها بدفع الاجار </th>

      <td>
        {{$ownership->participants_in_pay}}
      </td>
    </tr>
    <tr>
      <th scope="row" class=" TableOrBtn">
        من أين تؤمن المبلغ      </th>
   
      <td>
        {{$ownership->where_from_secure_money}}
      </td>
     </tr>
    <tr>
      <th scope="row" class=" TableOrBtn">
        عدد غرف البيت      </th>
      <td>
        {{$ownership->number_room}}
      </td>
     
    </tr>
    <tr>
      
      <th scope="row" class=" TableOrBtn">
        عدد الاشخاص الموجودين بنفس البيت      </th>
      <td>
        {{$ownership->number_people_in_home}}
      </td>
    </tr>
    <tr>
      <th scope="row" class=" TableOrBtn">
        صلة القرابة
     </th>
      <td>
        {{$ownership->relative_relation}}
      </td>
     
    </tr>
    
  </table>


  @endif

@include('Director.disclosing_form_parts')

<br>

<a href={{ route('display_request', ['id'=>$r_id]) }} class="btn TableOrBtn">معلومات الطلب</a>

@endsection
