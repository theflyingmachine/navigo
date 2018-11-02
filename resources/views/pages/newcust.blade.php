@extends('layouts.mapview')
@section('content')
<h1>Add New Customer </h1>
        
        <div class="form-horizontal" style="width: 100%">
                
                <div id="us3" style="width: 100%; height: 400px;"></div>
                <div class="clearfix">&nbsp;</div>
                <div class="form-group">
                                <label class="col-sm-1 control-label">Address:</label>
                    
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="us3-address" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Radius:</label>
                    
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="us3-radius" />
                                </div>
                            </div>
                <div class="m-t-small">
                    <label class="p-r-small col-sm-1 control-label">Lat.:</label>
        
                    <div class="col-sm-3">
                        <input type="text" class="form-control" style="width: 110px" id="us3-lat" />
                    </div>
                    <label class="p-r-small col-sm-2 control-label">Long.:</label>
        
                    <div class="col-sm-3">
                        <input type="text" class="form-control" style="width: 110px" id="us3-lon" />
                    </div>
                </div>
                <div class="clearfix">&nbsp;<br></div>
                <div class="form-group"><br>
                                <label class="col-sm-1 control-label">Name:</label>
                    
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="us3-address" />
                                </div>
                                <label class="col-sm-1 control-label">Mobile:</label>
                    
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="us3-radius" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Email:</label>
                    
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="us3-radius" />
                                </div>
                                <label class="col-sm-1 control-label">Quantity:</label>
                    
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="us3-radius" />
                                </div>
                            </div>
                            <button type="button">Save</button>   &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button">Reset</button>
                            <br>
                                         
                <div class="clearfix"></div>
                <script>
                    $('#us3').locationpicker({
                        location: {
                            latitude: 12.9716,
                            longitude: 77.5946
                        },
                        radius: 300,
                        inputBinding: {
                            latitudeInput: $('#us3-lat'),
                            longitudeInput: $('#us3-lon'),
                            radiusInput: $('#us3-radius'),
                            locationNameInput: $('#us3-address')
                        },
                        enableAutocomplete: true,
                        onchanged: function (currentLocation, radius, isMarkerDropped) {
                            // Uncomment line below to show alert on each Location Changed event
                            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                        }
                    });
                </script>
            </div>
@endsection
