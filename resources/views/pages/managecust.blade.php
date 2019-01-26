@extends('layouts.app')
@section('content')
<h1>Manage Customer </h1>
        

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
          <th>Customer ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Quantity</th>
          <th>Sector</th>
          <th>Notes</th>
          <th>Account Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <!--Table head-->
      <!--Table body-->
      @foreach($customers as $customer)
  

      <tbody>
        <tr>
            <form action="/managecust" method="post">
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <input type="hidden" name="c_id" id="c_id" value="{{ $customer->c_id }}" />
          <th scope="row">{{ $customer->c_id }}</th>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->contact }}</td>
          <td>{{ $customer->address }}</td>
          <td>{{ $customer->quantity }}</td>
          <td>{{ $customer->area_code }}</td>
          <td>{{ $customer->notes }}</td>
        
 @if ( $customer->accountstatus =="inactive")
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
