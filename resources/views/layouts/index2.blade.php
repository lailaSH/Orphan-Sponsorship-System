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
label{
font-size: 16px;
}
select{
  background-color:rgba(0, 0, 0, 0);

}
textarea{
  background-color:rgba(0, 0, 0, 0);

}
  </style>
    
  </head>
  <body>
    
    @php
    $name=Auth::user()->name;
@endphp

  <div class="container-fluid">
    <div class="row">
      
      <nav id="sidebarMenu" class="col-md-3 col-lg-2  bg-light sidebar ">
        <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex  align-items-center">
        <img loading="lazy" src="{{asset('male.png')}}" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body" style="padding: 4%;">
          <h4 class="m-0">{{$name}}</h4>
          <p class="font-weight-normal text-muted mb-0">مدير</p>
        </div>
      </div>
    </div>
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href="{{route('Home.check')}}">
              <i class="fas fa-home"></i>
              <span> الصفحة الرئيسية</span> 
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link link1" aria-current="page" href={{ route('display_waiting_requests') }}>
              <i class="fas fa-book-reader"></i>
              <span> الطلبات</span> 
            </a>
          </li> <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href="{{ route('summery_of_employee')}}">
                 <i class="fas fa-pray"></i>
              <span>  الموظفين</span> 
            </a>
          </li> <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href={{ route('choices') }}>
              <i class="fas fa-book"></i>
              <span> الارشيف </span> 
            </a>
          </a>
        </li>
        <li class="nav-item">
            <i class="fas fa-plus-circle"></i>
            <span> التقارير </span> 
          </li> 
          <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href={{ route('health_report') }}>
              <i class="fas fa-book"></i>
              <span> التقارير الصحية </span> 
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href={{ route('orphans_report') }}>

              <i class="fas fa-chart-bar"></i>
              <span> 
احصائيات الأيتام              </span> 
            </a>
          </li> 

          <li class="nav-item">
            <a class="nav-link link1" aria-current="page" href={{ route('Show_Director_Info') }}>
              <i class="fas fa-user-circle"></i>
              <span> معلوماتي </span> 
            </a>
          </li>
        </li> 
        <li class="nav-item">
          <a class="nav-link link1" aria-current="page" href={{ route('Director_logout') }} style="color: red">
            <i class="fas fa-sign-out-alt"></i>
            <span> تسجيل الخروج </span> 
          </a>
        </li>
       
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
    <div class="col-md-3 col-lg-2 contentPage  " style="  width: 85%;  right: 16%; padding:3%; ">
      @yield('content')

  </div>
  
  </div>

  </body>
</html>
