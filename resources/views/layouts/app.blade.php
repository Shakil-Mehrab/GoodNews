<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Admin Area</title>
    <link href="{{asset('style/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/bootstrap/awesome-font/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/ownstyle.css')}}" rel="stylesheet">
    
    @yield('link')
    <script>
    window.laravel={!! json_encode([
      'csrfToken'=>csrf_token(),
    ]) !!};
    </script>
</head>
<body>
        @include('admin.includes.nav')
        <section class="container">
                <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">   
                      <div class="row"> 
                           <div class="content-wrap well">
                            @include('admin.includes.side-nav')
                     </div>
                   </div>
                </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="row navigation" style="margin-bottom:10px;">                    
                                    @yield('navigation')                               
                            </div> 
                            <div class="row">    
                                 <div class="content-wrap well"  id='app'>
                                    @yield('content')
                                 </div>
                            </div>
                           <div class="row" >
                              <div class="content-wrap well lower" style="background:#66D7E5;">
                                    @yield('content-right-1')
                              </div>
                          </div>
                    </div>
            </div>
            </section>
   @include('admin.includes.footer')
</body>
</html>
