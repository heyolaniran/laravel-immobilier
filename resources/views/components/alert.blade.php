<div class="alert alert-{{$type}} alert-dismissible fade show" role="alert" {{$attributes}}>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{$slot}}</strong> 
</div>

<script>
  $(".alert").alert();
</script>