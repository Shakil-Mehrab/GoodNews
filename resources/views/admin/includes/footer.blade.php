     
   <br><br>
   <div class="footer">
      <nav class="navbar navbar-default navbar-fixed-bottom">
         <div class="container text-center">
           Copyright &copy; By <a href="">Mehrab Houssain Shakil</a>
             <div class="time">
               <?php date_default_timezone_set("Asia/Dhaka")?>
               <i class="fas fa-clock"></i> {{date("h:i:sa")}} 
             Date: {{date("d/M/Y")}}
           </div>
         </div>
       </nav>
   </div>     
    
  
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="{{asset('style/admin/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script src="{{asset('/js/main.js')}}"></script>
   @yield('js')
  
  
    </script>