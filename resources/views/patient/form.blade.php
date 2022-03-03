<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>inquiry submission</title>
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
   <h1 class="text-center txt">Online Cancer Treatment  </h1>
</div>
@if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif  
<div class="container">
  <div class="row no-gutters">
   <div class="col-md-6 form">

   <?php //echo $_POST['name']; ?>
        <form  method="post" action="{{ route('form.index') }}" enctype="multipart/form-data" novalidate>
            @csrf

      <div class="form_container">
         <div class="form_group">
            <label class="classpan">Full Name</label>
            <input type="text" class="txtbox" name="name" id="name" value="{{old('name')}}">
            <span style ="color:pink;float:right">@error('name')*{{$message}}@enderror </span>
         </div>

  
         <div class="form_group">
            <label class="classpan">Email</label>
            <input type="text" class="txtbox" name="email" id="email" value="{{old('email')}}">
            <span style ="color:pink;float:right">@error('email')*{{$message}}@enderror </span>
         </div>

         <div class="form_group">
            <label class="classpan">Password</label>
            <input type="password" class="txtbox" name="password" id="password">
            <span style ="color:pink;float:right">@error('password')*{{$message}}@enderror </span>
         </div>
 
         <div class="form_group">
            <label class="classpan">Contact Number</label>
            <input type="text" class="txtbox" name="contact" id="contact" value="{{old('contact')}}">
            <span style ="color:pink;float:right">@error('contact')*{{$message}}@enderror </span>
         </div>
        
         <div class="form_group">
            <label class="classpan">State</label>
          
            <select name="state" class="state" id="stateId">
            <option value="" >Select State</option>
            </select>   
            <span style ="color:pink;float:right">@error('state')*{{$message}}@enderror </span>
        
         </div>
        
         
         <div class="form_group">
            <label class="classpan">city</label>
            <select name="city" class="mycity" id="cityId">
              <option value="">--Section city--</option>
           
            </select>
            <span style ="color:pink;float:right">@error('city')*{{$message}}@enderror </span>
        
         </div>

         <div class="form_group">
            <label class="classpan">Address</label>
            <textarea class="txtbox" name="address"> {{old('address')}}</textarea>
          
            <span style ="color:pink;float:right">@error('address')*{{$message}}@enderror </span>
         </div>

         <div class="form_group">
            <label class="classpan">Pincode</label>
            <input type="text" value="{{old('pin')}}" name="pin" class="txtbox">
            <span style ="color:pink;float:right">@error('pin')* pincode required @enderror </span>
      
         </div>
         
         <div class="form_group">
            <label class="classpan">type of cancer</label>
            <select class="toc" name="toc" id="toc">
              <option value="">--Section--</option>
              @foreach($cancer as $key => $data)
              <option value="{{$data->type}}"  {{ (old("toc") == $data->type ? "selected":"") }}>{{$data->type}}</option>
@endforeach
            </select>
            <span style ="color:pink;float:right">@error('toc')* cancer type required @enderror </span>
      
         </div>

         <div class="form_group increment" >
            
         <label class="classpan">Upload file</label>
         
      
      <input type="file" name="filenames[]" class="dbb">
  <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>

            <span style ="color:pink;float:right">@error('filenames')*{{$message}}@enderror </span>
      
    </div>
   
         
   <div id="clone"style="display:none">
      <div class="hdtuto control-group lst input-group" style="margin-top:10px">
      
        <input type="file" name="filenames[]" class="dbb">
        <div class="input-group-btn"> 
          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
        </div>
      </div>
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
