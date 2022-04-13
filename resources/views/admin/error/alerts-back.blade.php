<script>
    @if(session()->has('message'))
        @if(session('icon') === 'success')
        Swal.fire({
          icon: '{{session('icon')}}',
          text: '{{session('message')}}',
        timer: 3000
        });
      @endif
@endif
</script>

