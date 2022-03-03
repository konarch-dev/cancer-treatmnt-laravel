@if(Session::has('user'))
       <div class="alert alert-success text-center">
        <a href="/dashboard">Home</a>     Hello  {{ Session::get('user') }}   <a href="/logout">logout</a>
            </div>
         @else
         <script type="text/javascript">location.href="/adminlogin"</script>

        @endif 

        <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<body>
    
  
  <main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">


    <div class="form-group row">

                           <a class="btn btn-primary"  href="/addCancer">Add Cancer </a>&nbsp;


                 <a class="btn btn-primary" href="/doctor">Add Doctor</a>&nbsp;

                       
                           <a class="btn btn-primary"  href="/doctor_list">Doctor List </a>
                          &nbsp;
                        
</div>

  
                 {!!$msg!!}
  
                        <form action="/add" method="post">
    @csrf

<input type="text" name="type" value="" placeholder="enter cancer name" class="form-control">
<br>
<br>
<button class="btn btn-primary" type="submit">Add Cancer</button>

</form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

</body>
</html>