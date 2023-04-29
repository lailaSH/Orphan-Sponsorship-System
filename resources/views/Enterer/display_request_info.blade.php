@extends('layouts.index')

@section('content')
<div class="container">
    <br><br><br>
    <h3 class="text_h">معلومات الطلب</h3>
    <br>
        <table class="table" >
            <thead>
              <tr class="TableOrBtn" style="font-size: 15px">
                <th scope="col">#</th>
                <th scope="col">الوصي</th>
              
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{$request->id}}</th>
                <td>{{$request->orphan_guardian}}</td>
              
              </tr>
              
            </tbody>
          </table> 
          <br>
    <h3 class="text_h">الايتام</h3>
    <br><br>
    <table class="table">
        <thead>
          <tr class="TableOrBtn">
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">العمر</th>
            <th scope="col">الصف</th>
            <th scope="col">المدرسة</th>

          
          </tr>
        </thead>
        <tbody>

    @foreach ($request->orphans as $orphan)
              <tr>
                <th scope="row"></th>
                <td>{{$orphan->name}}</td>
                <td>{{$orphan->age}}</td>
                <td>{{$orphan->class}}</td>
                <td>{{$orphan->school}}</td>

              </tr>
            @endforeach
  
        </tbody>
    </table>
<br>
<br>
</div>
@endsection