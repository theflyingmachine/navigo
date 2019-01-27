@extends('layouts.app')
@section('content')
<h1>Manage Agent </h1>
        

  {{--show message flash  --}}
  <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
  
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div> <!-- end .flash-message -->
   
    {{-- Table begins --}}
    <!--Table-->
<table id="tablePreview" class="table">
    <!--Table head-->
      <thead>
        <tr>
          <th>Agent ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Account Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <!--Table head-->
      <!--Table body-->
      @foreach($agents as $agent)
  

      <tbody>
        <tr>
            <form action="/manageagent" method="post">
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <input type="hidden" name="a_id" id="a_id" value="{{ $agent->a_id }}" />
          <th scope="row">{{ $agent->a_id }}</th>
          <td>{{ $agent->name }}</td>
          <td>{{ $agent->contact }}</td>
          <td>{{ $agent->email }}</td>
        
@if ( $agent->accountstatus =="inactive")
          <td><img src="red.png" alt="Inactive" height="32" width="32"></td>
          <input type="hidden" name="task" id="task" value="active" />
          <td> <button type="submit"  class="btn btn-success span2">Activate</button></td>
@else
          <td ><img src="green.png" alt="Active" height="32" width="32"></td>
          <input type="hidden" name="task" id="task" value="inactive" />
          <td> <button type="submit"   class="btn btn-danger span2">Deactivate</button></td>
@endif
            </form>
        </tr>
        @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->

@endsection
