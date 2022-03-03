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
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
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
                           <a class="btn btn-primary"  href="/cancer">Cancer List </a>&nbsp;
                       
                           <a class="btn btn-primary"  href="/doctor_list">Doctor List </a>
                          &nbsp;
                        
  <a class="btn btn-primary" href="/doctor">Add Doctor</a>
</div>
  <table class="pure-table">

                      

    <thead>
        <tr>
        <td>Doctor</td>
        <td> Speciality</td>
        <td></td>
        <td></td>
</tr>
</thead>

@foreach($doctor as $key => $data)
<tr>
        <td>{{$data->name}}</td>
        <td>{{$data->special}}</td>
        <td><a href={{"editDoctor/".$data->id}}>Edit</a></td>
        
        <td><a href={{"deleteDoctor/".$data->id}}>Delete</a></td>
</tr>
@endforeach


</table>

<style>
.w-5{
        display:none;
}

</style>
{{ $doctor->onEachSide(5)->links("pagination::bootstrap-4") }}
                        
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

</body>
</html>