<div class="container mt-3">
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong> {{session('success')}} </strong> 
            </div>
            
            <script>
              $(".alert").alert();
            </script>


        @endif  


        @if($errors->any()) 

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <ul class="list-group">
                @foreach($errors->all() as $error)

                    <p>{{$error}}</p>

                @endforeach
                <p></p>
          </ul>
         
        </div>
        
        <script>
          $(".alert").alert();
        </script>


        @endif
</div>