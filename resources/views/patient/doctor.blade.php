<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>doctor submission</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="patient/css/style.css">
<link rel="stylesheet" type="text/css" href="patient/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,200&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="patient/js/state.js"></script>
</head>

<body>


<div class="container">
   
@if(Session::has('user'))
       <div>
        <a href="/dashboard">Home</a>     Hello  {{ Session::get('user') }}   <a href="/logout">logout</a>
            </div>
         @else
         <script type="text/javascript">location.href="adminlogin"</script>

        @endif 

 <h3 class="text-center txt">Add Doctor  </h3>
</div>
@if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif  


@if(Session::has('failure'))
            <div class="alert alert-danger text-center">
                {{Session::get('failure')}}
            </div>
        @endif  

<div class="container">
  <div class="row no-gutters">
   <div class="col-md-6 form">

   
        <form  method="post" action="{{ route('form.doctor') }}" enctype="multipart/form-data" novalidate>
            @csrf

      <div class="form_container">
         <div class="form_group">
            <label class="classpan">Full Name</label>
            <input type="text" class="txtbox" name="name" id="name"  value="{{old('name')}}">
           
            <span style ="color:pink;float:right">@error('name')*{{$message}}@enderror </span>
         </div>
  
         <div class="form_group">
            <label class="classpan">Email</label>
            <input type="text" class="txtbox" name="email" id="email"  value="{{old('email')}}">
            
            <span style ="color:pink;float:right">@error('email')*{{$message}}@enderror </span>
         </div>

 
        
         
         <div class="form_group">
            <label class="classpan">specialization</label>
            <select class="txtbox" name="special" id="toc">
              <option value="">--Section--</option>
              @foreach($cancer as $key => $data)
              <option value="{{$data->type}}" {{ (old("special") == $data->type ? "selected":"") }}>{{$data->type}}</option>
@endforeach
            </select>

            <span style ="color:pink;float:right">@error('special')*{{$message}}@enderror </span>
      
         </div>
 
         <div class="form_group">
            <input type="submit" class="mybt" name="send" value="Submit">
         </div>
         
      </div>

      

</form>
      
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $("#clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>



   </div>
   
   
   <div class="col-md-6 pic text-center">
      <img class="text-center" class="img-fluid" width="80%" src="patient/home-graphic.png">
   </div>  
   
  </div> 
</div>


<div class="container">
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Horizental Ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2975528604039680"
     data-ad-slot="4378295767"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>


</body>
</html>
