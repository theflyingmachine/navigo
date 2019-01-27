@extends('layouts.app')
@section('content')
<h1>Delivery Jobs </h1>
        

  {{--show message flash  --}}
  <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
  
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div> <!-- end .flash-message -->
   
  <!-- Editable table -->
<div class="card">
  
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Contact</th>
          <th class="text-center">Sector</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Notes</th>
          <th class="text-center">Action</th>
        </tr>
        @foreach($jobs as $job)
  

        <tbody>
          <tr>
              <form action="/managecust" method="post">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="c_id" id="c_id" value="{{ $job->c_id }}" />
            <td class="pt-3-half" contenteditable="false">{{ $job->name }}</td>
            <td class="pt-3-half" contenteditable="false">{{ $job->contact }}</td>
            <td class="pt-3-half" contenteditable="false">{{ $job->area_code }}</td>
            <td class="pt-3-half" contenteditable="true">{{ $job->quantity }}</td>
            <td class="pt-3-half" contenteditable="true">{{ $job->notes }}</td>
            {{-- <td class="pt-3-half" contenteditable="false">{{ $job->notes }}</td> --}}
          
  
   <td> <button type="submit"  class="btn btn-primary span2">Update</button></td>
 
     </form>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
{{-- Publish Button --}}
<form action="/publishdeliveryjob/c98c8ec894c7adf4b348a25cb2cfe61c" method="get">
<button type="submit" class="btn btn-block btn-success">Publish</button>
</form>
@endsection
