<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>bootstrap form templates free| bootstrap form templates | Bootstrap responsive registration form | Bootstrap Form Templates | Bootstrap Responsive Form | Registration Form Templates| Responsive Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="patient/css/style.css">
<link rel="stylesheet" type="text/css" href="patient/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,200&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
<script src="patient/js/state.js"></script>
</head>

<body>

<div class="container">
   <h1 class="text-center txt">Online Cancer Treatment  </h1>
</div>

<div class="container">
  <div class="row no-gutters">
   <div class="col-md-6 form">

   @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif    
        <form  method="post" action="{{ route('patient.index') }}" novalidate>
            @csrf

      <div class="form_container">
         <div class="form_group">
            <label class="classpan">Full Name</label>
            <input type="text" class="txtbox @error('name') is-invalid @enderror" name="name" id="name">
         </div>
         @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
         <div class="form_group">
            <label class="classpan">Email</label>
            <input type="text" class="txtbox @error('email') is-invalid @enderror" name="email" id="email">
         </div>
         @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
         <div class="form_group">
            <label class="classpan">Password</label>
            <input type="password" class="txtbox @error('password') is-invalid @enderror" name="password" id="password">
         </div>
         @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
         <div class="form_group">
            <label class="classpan">Contact Number</label>
            <input type="text" class="txtbox @error('contact') is-invalid @enderror" name="contact" id="contact">
         </div>
         @error('contact')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
         <div class="form_group">
            <label class="classpan">State</label>
          
            <select name="state" class="state" id="stateId">
            <option value="">Select State</option>
            </select>
         </div>
        
         
         <div class="form_group">
            <label class="classpan">city</label>
            <select name="city" class="mycity" id="cityId">
              <option>--Section--</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
            </select>
         </div>

         <div class="form_group">
            <label class="classpan">Address</label>
            <textarea class="txtbox"></textarea>
         </div>

         <div class="form_group">
            <label class="classpan">Pincode</label>
            <input type="text" class="txtbox">
         </div>
         
         <div class="form_group">
            <label class="classpan">type of cancer</label>
            <select class="toc">
              <option>--Section--</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
            </select>
         </div>


         
         <div class="form_group">
            <label class="classpan">Upload file</label>
            <input type="file">
         </div>


         
         <div class="form_group">
            <input type="submit" class="mybt" name="send" value="Submit">
         </div>
         
      </div>

</form>
      
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
