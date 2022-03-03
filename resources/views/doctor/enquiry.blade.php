@include('doctor.chkuser')


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
  
  
                     <table class="pure-table">

                      

    <thead>

    <tr>
        <td>Name</td>
        <td> Disease</td>
        <td> city</td>
        <td> state</td>
        <td> contact</td>
        <td></td>
</tr>
</thead>
@foreach($patient as $key => $data)

<tr>
        <td>{{$data->name}}</td>
        <td>{{$data->cancer}}</td>
        <td>{{$data->city}}</td>
        <td>{{$data->state}}</td>
        <td>{{$data->contact}}</td>

        @if(array_key_exists($data->id,$plan))

        @if(in_array(Session::get('id'),$plan[$data->id]))
        <td>Plan Created <a class="btn btn-primary" href={{"plan/".$data->id}}>New Plan</a></td>
        @else
        <td>Plan Created</td>
        @endif
        @else
        <td><a class="btn btn-primary" href={{"plan/".$data->id}}>Make Plan</a></td>
        @endif
        

</tr>
@endforeach


</table>

<style>
.w-5{
        display:none;
}

</style>
{{ $patient->onEachSide(5)->links("pagination::bootstrap-4") }}
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

</body>
</html>