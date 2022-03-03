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



  <table class="pure-table">
<thead>
        <td>ID</td>
        <td> Cancer Type</td>
        <td></td>
        <td></td>
</tr>
</thead>
@foreach($cancer as $key => $data)
<tr>
        <td>{{$data->id}}</td>
        <td>{{$data->type}}</td>
        <td><a href={{"edit/".$data->id}}>Edit</a></td>
        
        <td><a href={{"delete/".$data->id}}>Delete</a></td>
</tr>
@endforeach


</table>

<style>
.w-5{
        display:none;
}

</style>
{{ $cancer->onEachSide(5)->links("pagination::bootstrap-4") }}
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

</body>
</html>