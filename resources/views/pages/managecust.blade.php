@extends('layouts.app')
@section('content')
<h1>Manage Customer </h1>
        
<form action="/addnewcustomer" method="post" enctype="multipart/form-data">
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
          <th scope="row">{{ $customer->c_id }}</th>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->contact }}</td>
          <td>{{ $customer->address }}</td>
          <td>{{ $customer->quantity }}</td>
          <td>{{ $customer->area_code }}</td>
          <td>{{ $customer->notes }}</td>
        
 @if ( $customer->accountstatus =="pending")
          <td align="center"><img src="red.png" alt="Inactive" height="42" width="42"></td>
          <td> <button type="button" class="btn btn-success">Activate</button></td>
@else
          <td align="center"><img src="green.png" alt="Active" height="42" width="42"></td>
          <td> <button type="button" class="btn btn-danger">Deactivate</button></td>
@endif
        </tr>
        @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->

@endsection
