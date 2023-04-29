@extends('layouts.index2')

@section('content')

<br>
<br>
  @php
   use Carbon\Carbon;
   $now = Carbon::now();
  @endphp
     {{$now->format('l / j / F / Y')}}  
<br>
<br>

    <label>يكفل القسم الطفل دون سن الـ /18/ حيث يقدم خدمات تشمل:
        كفالة مالية، خدمات صحية مع تقديم مواد عينية لكافة الاسر بشكل دوري، ويستفيد من جميع المشاريع التي يقوم بها القسم</label>
   
   <br><br><br>
   
        <h3>------------------------احصائيات هذا الشهر------------------------</h3><br><br>
    <label> 
        تم تسجيل {{ $new_wr_count }} طلب جديد خلال الشهر بعدد ايتام بلغ {{ $new_orphans_count }}</label>
      <br><br>
      
        <h5>يوضح الجدول الاتي توزع الايتام لكل طلب </h5><br>
    <div class="container">
        <table class="table">
            <thead>
                <tr class="TableOrBtn">
                    <th scope="col"></th>
                    <th scope="col"> رقم الطلب </th>
                    <th scope="col">عدد الايتام</th>
                </tr>
            </thead>
            <tbody>
                @if($orphans_count_arr!=null)
                @foreach ($orphans_count_arr as $key => $val)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $key }}</td>
                        <td>{{ $val }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <br><br>
    <h3>------------------------احصائيات كاملة محدثة---------------------------------</h3>
    <br><br>
    <label> يبلغ عدد العائلات المقيمة {{ $Resident_count }} </label>
    <label> ويبلغ عدد العائلات الوافدة {{ $displaced_count }}</label>
    <label>بعدد الايتام الكلي: {{ $all_orphans_count }}</label>
    <label> حيث تم كفالة {{ $sponsored_orphans }} منهم</label>
    <label> وبقي {{ $un_sponsored_orphans }} من الايتام غير مكفولين </label>
    

@endsection
