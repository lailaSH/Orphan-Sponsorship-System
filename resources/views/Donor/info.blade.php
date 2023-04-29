
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
      <meta charset="utf-8">
          <title>جمعيةالشباب الخيرية</title>

      <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet">
      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
      <!-- Custom styles for this template -->
      <link href="{{asset('css/dashboard.rtl.css')}}" rel="stylesheet">
      <link href="{{asset('css/all.css')}}" rel="stylesheet">
      <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet">

      <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>


<style>
  .TableOrBtn{
    background-color: #023e8aad; color:white;

  }
input{
  background-color:rgba(0, 0, 0, 0);
  width: 75%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=text]:focus {
  background-color: #023e8aad;
}
input[type=checkbox] {
width: 2%;}

label{
font-size: 16px;
}
select{
  background-color:rgba(0, 0, 0, 0);

}
textarea{
  background-color:rgba(0, 0, 0, 0);

}
.progressbar{
  counter-reset: step;
}
.progressbar li{
  list-style-type: none;
  float: left;
  width: 33%;
  position: relative;
  text-align: center;
}
.progressbar li::before{
  content: counter(step);
  counter-increment: step;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ddd;
  display: block;
  text-align: center;
  margin: 0 auto 10px auto;
  border-radius: 50%;
  background-color: white;
}
.progressbar li::after{
  content: '';
  position: absolute;
  width: 100%;
  height: 1px;
  background-color: #ddd;
  top: 22.5px;
  z-index: -200;
}
.progressbar li:first-child::after{
  content: none;
}
.progressbar li.active{
  color: #023e8a;
}
.progressbar li.active::before{
  border-color: #023e8a;
}
.progressbar li.active + li::after{
  background-color: #023e8a;
}
.progressbar1{
  counter-reset: step;
  margin-left:16%;
}
.progressbar1 li{
  list-style-type: none;
  float: left;
  width: 12%;
  position: relative;
  text-align: center;
}
.progressbar1 li::before{
  content: counter(step);
  counter-increment: step;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ddd;
  display: block;
  text-align: center;
  margin: 0 auto 10px auto;
  border-radius: 50%;
  background-color: white;
}
.progressbar1 li::after{
  content: '';
  position: absolute;
  width: 100%;
  height: 1px;
  background-color: #ddd;
  top: 22.5px;
  z-index: -200;
}
.progressbar1 li:first-child::after{
  content: none;
}
.progressbar1 li.active{
  color: #023e8a;
}
.progressbar1 li.active::before{
  border-color: #023e8a;
}
.progressbar1 li.active + li::after{
  background-color: #023e8a;
}
i{
  font-size: 20px;
}
  </style>
    
  </head>
  <body>
    
  <div class="container-fluid">
    <div class="row">
      
      <nav id="sidebarMenu" class="col-md-3 col-lg-2  bg-light sidebar ">
        <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex  align-items-center">
        <img loading="lazy" src="{{asset('male.png')}}" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body" style="padding: 4%;">
          <h4 class="m-0" >{{$Donor->name}}</h4>
          <p class="font-weight-normal text-muted mb-0">كفيل</p>
        </div>
      </div>
    </div>
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href={{route('Page',$Donor->id)}}>
              <i class="fas fa-home"></i>
              <span> الصفحة الرئيسية</span> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link link3" href="#">
              <i class="fas fa-book"></i>
            <span>التقارير</span>  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link link3" href={{ route('donoredit',$Donor->id) }}>
              <i class="fas fa-user-circle"></i>
            <span>معلوماتي</span>  
            </a>
          </li>
          </ul>
        <ul class="nav flex-column mb-2">
          <li class="nav-item" >
            <a class="nav-link " href={{ route('Donor_logout') }} style="color: red">
              <i class="fas fa-sign-out-alt"></i>
              <span> تسجيل خروج
              </span>
            </a>
          </li>
        </ul>
      </div>
   </nav>
   <div class="img2" style=" left: 5%;
   margin: auto;
   height: 100%;
   padding: 0;
   position: fixed;
   top: 0;
   width: 75%;
   opacity: 0.15;
   z-index: -1;  ">
     <img src="{{asset('img/logo.png')}}" >
   </div>
    <div class="col-md-3 col-lg-2 contentPage  " style="  width: 85%;  right: 16%; padding-right: 2%;
    padding-top: 4%; ">
        <div class="container-fluid px-3">
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">{{$Donor->number_orphans}}</p>
                            <p class="fs-6">المكفولين</p>

                        </div>
                        <a href="#">
                                    <i class="fas fa-baby fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                                </a>
        
                    </div>
                </div>
        
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">{{$countPayment}}</p>
                            <p class="fs-6">تم الدفع لهم</p>
                        </div>
                        <a href="#"  >
                            <i  class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                </div>
        
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">{{$count}}</p>
                            <p class="fs-6"> لم يتم الدفع لهم</p>
                        </div>
                        <a href="#"  >
                            <i class="fas fa-hourglass-start fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                </div>
        
                <div class="col-md-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded"  style="background-color: #023e8a; color:white;">
                        <div>
                            <p class="fs-5">{{$total}}</p>
                            <p class="fs-6"> اجمالي الدفع</p>
                        </div>
                        <a href="#"  >
                            <i class="fas fa-comments-dollar fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                </div>
        
            </div>
                   
                </div>
        

    </div>

</div>

</div>

</body>
</html>
