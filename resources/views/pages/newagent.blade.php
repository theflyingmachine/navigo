@extends('layouts.app')
@section('content')
<h1>Add New Agent </h1>
        
<form action="/newagent" method="post">
   {{--show message flash  --}}
   <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
  
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div> <!-- end .flash-message -->
  {{-- Name and contact --}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Name</label>
        <input type="text" class="form-control" name="inputName4" id="inputName4" placeholder="Name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Contact</label>
        <input type="number" class="form-control" name="inputContact4" id="inputContact4" placeholder="Contact" required>
      </div>
    </div>
    {{-- Address --}}
    <div class="form-group">
      <label for="inputAddress">Email</label>
      <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="abc@gmail.com" required>
    </div>
    
            <br><br><br>
          <div class="form-group">
    {{-- <button type="reset" class="btn btn-primary "> Reset </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
    <button type="submit"  class="btn btn-primary btn-block "> Add New Agent </button>
          </div><br>


            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
{{-- <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'See Less Details':'See More Details');});">See More Details</a> --}}
  </form>


@endsection
