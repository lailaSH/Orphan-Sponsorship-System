@extends('layouts.index')
@section('content')
<div class="container">
    <table class="table">
        <thead >
        <tr class="TableOrBtn">
            <th scope="col"></th>
            <th scope="col">الاسم</th>
            <th scope="col">الصف</th>
            <th scope="col">المدرسة</th>
            <th scope="col">الحالة الصحية</th>
            <th scope="col">تاريخ الميلاد</th>
            <th scope="col">الجنس</th>
        </tr>
        </thead>
        <tbody>
    <tr>
    <th scope="row">{{$Orphans->id}}</th>
    <td>{{$Orphans->name}}</td>
    <td>{{$Orphans->class}}</td>
    <td>{{$Orphans->school}}</td>
    <td> @if (isset($health_St)&& $health_St->count()>0)
        @foreach ($health_St as $item)    
        {{$item->statue}} <br>
        @endforeach
        @endif
    </td>
    <td>{{$Orphans->age}}</td>
    <td>{{$Orphans->gender}}</td>
    </tr>
        </tbody>
      </table>
      <div class="row">
        <div class="col">
            <form action={{route('showOrphan',[$num+1])}}  method="GET">
                <input type="submit" value="التالي" class="btn TableOrBtn">
                </form>
        </div>
        <div class="col" >
            @if ($check==0)
            <form action={{route('Add_OrphanToDonor',[$Orphans->id,$num])}}  method="GET">
                <input type="submit" value=" كفالة" class="btn TableOrBtn">
            </form>
            @endif

        </div>

        <div class="col" >
            @if ($check!=0)
            <form action={{route('del_OrphanToDonor',[$Orphans->id,$num])}}  method="GET">
                <input type="submit" value="الغاء الكفالة" class="btn TableOrBtn">
                @endif

            </form>

         </div>
         <div class="col">
            @if ($num!=0)
      <form action={{route('showOrphan',[$num-1])}}  method="GET">
        <input type="submit" value="السابق" class="btn TableOrBtn">
        @endif

        </form>
         </div>
         
      </div>

   
      <div class="row">
        <div class="col">
            @if ($num!=0)
        <form action={{route('Enterer_Page')}}  method="GET">
            <input type="submit" value="تم" class="btn TableOrBtn" style="margin-right: 8%">
            </form>
        @endif
    </div>

            
        

</div>
@endsection