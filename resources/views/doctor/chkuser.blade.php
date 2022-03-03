@if(Session::has('user'))
            <div class="alert alert-success text-center">
        <a href="/enquiry">Home</a>     Hello  {{ Session::get('user') }}   <a href="/doctorlogout">logout</a>
            </div>
         @else
         <script type="text/javascript">location.href="/doctorlogin"</script>

        @endif 