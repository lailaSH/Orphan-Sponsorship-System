@extends('layouts.index')

@section('content')
<div class="container">
    <input type="text" name="inputSearch" id="inputSearch" class="form-control" placeholder="ادخل اسم الكفيل" style="background-color:rgba(0, 0, 0, 0);">
    
    <table class="table" id="tableDonors" style="display: none ;">
        <thead >
    <tr class="TableOrBtn" >
        <th scope="col">الرقم</th>
        <th scope="col">الاسم</th>
        <th scope="col"></th>
        <th scope="col"></th>

    </tr>
        </thead>
        <tbody id="output">

        </tbody>
    </table>
</div>

<script type="text/javascript ">
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
        $('#inputSearch').on('keyup',function(){
            $inputSearch=$(this).val();
            if($inputSearch =="")
                    {
                        $('#tableDonors').html();
                        $('#tableDonors').hide();
                    }
                    else
                    {
            $.ajax({
                method:"post",
                url:"search",
                data:JSON.stringify({
                    inputSearch:$inputSearch
                }),
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
                success:function(data){
                    data=JSON.parse(data);
                    console.log(data);
                    if(data.length>0)
                    $('#tableDonors').show();
                    var     searchResult='';
                    for(let i=0;i<data.length;i++){
                        var id=data[i].id;
                        
    searchResult+="<tr><td>";
    searchResult+=data[i].id +"</td>";
    searchResult+="<td>";
    searchResult+=data[i].name + "</td>";            
    searchResult+="<td>";
    searchResult+= "<a class=\"btn TableOrBtn\" href=\"http://localhost/Version_01/public/EditDonor/"+data[i].id+"\" >تعديل</a>"; 
    searchResult+= "</td>";
    searchResult+="<td>";
    searchResult+= "<a class=\"btn TableOrBtn\" href=\"http://localhost/Version_01/public/AddPayment/"+data[i].id+"\">اضافة دفعة</a>";
    searchResult+= "</td></tr>";

                    }
                    $('#output').html(searchResult);
                }
            });
        }
    });

</script>
@endsection