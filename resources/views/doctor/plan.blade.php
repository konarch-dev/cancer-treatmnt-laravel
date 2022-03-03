@include('doctor.chkuser')


        <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
    </style>

<meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
    
  
  <main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
  
  <form action="/addPlan" method="POST">
    @csrf
                       <table style="margin: 10px;" cellpadding="15px">

    <tr>
        <td>Name</td>
        <td> state</td>
        <td> city</td>
        <td> Disease</td>
        <td> contact</td>
</tr>

@foreach($patient as $key => $data)
@if(session('special')==$data->cancer)
<tr>
    <input type="hidden" name="name" value="{{$data->name}}">
    <input type="hidden" name="email" value="{{$data->email}}">

    <input type="hidden" name="state" value="{{$data->state}}">

    <input type="hidden" name="city" value="{{$data->city}}">
    <input type="hidden" name="address" value="{{$data->address}}">
    <input type="hidden" name="pid" value="{{$data->id}}">
    <input type="hidden" name="contact" value="{{$data->contact}}">
    <input type="hidden" name="docmail" value=" {{ Session::get('email') }} ">
    <input type="hidden" name="did" value=" {{ Session::get('id') }} ">
        <td>{{$data->name}}</td>
        <td>{{$data->state}}</td>
        <td>{{$data->city}}</td>
        <td>{{$data->cancer}}</td>
        <td>{{$data->contact}}</td>

      
</tr>

   @foreach(json_decode($data->document) as $info)
   <tr> 
    <td><a  target="_blank" href="{{ URL::to('/') }}/files/{{$info}}">{{$info}}</a>&nbsp;&nbsp;<a class="btn btn-primary" target="_blank" href="{{ URL::to('/') }}/downloadfile/{{$info}}">download</a></td>
</tr>
  @endforeach
  @else
<script>location.href="/enquiry"</script>
@endif


@endforeach

</table>


  
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
       <textarea name="editorData" id="editor">
            &lt;p&gt;This is some sample content.&lt;/p&gt;
        </textarea>
    <button type="submit" class="btn btn-primary" name="save">save</button>
</form>

     <script>
let editor;

ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

// Assuming there is a <button id="submit">Submit</button> in your application.
document.querySelector( '#save' ).addEventListener( 'click', () => {
    const editorData = editor.getData();

  
 });

</script>
                 <div id="home"></div>           
                  </div>
              </div>
          </div>
      </div>
  </div>



</main>


</body>
</html>