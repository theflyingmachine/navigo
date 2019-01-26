@extends('layouts.mapview')
@section('content')
<h1>Add New Customer </h1>
        
<form action="/addnewcustomer" method="post" enctype="multipart/form-data">
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
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="1234 Main St" required>
    </div>
    {{-- Coodrinates --}}
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Latitude</label>
          <input type="number" class="form-control" name="inputlat4" id="inputlat4" value="12.972442" placeholder="Latitude" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Longitude</label>
          <input type="number" class="form-control" name="inputlong4" id="inputlong4" value="77.580643" placeholder="Longitude" required>
        </div>
      </div>
    {{-- <div class="form-group">
      <label for="inputAddress2">Address 2</label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-6">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
          <option selected>Karnataka</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Check me out
        </label>
      </div> 
    </div>--}}
    <div class="form-row">
            <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Upload Home Image</label>
            <input type="file" onchange="readURL(this);" class="form-control-file" name="homeimage" id="homeimage" required>
          </div>
          <div class="form-group col-md-2">
                <label for="inputQuantity">Quantity</label>
                <input type="number" class="form-control" name="inputQuantity" id="inputQuantity" placeholder="Enter in Liters" required>
              </div>
         </div>
            
            <br><br><br>
          <div class="form-group">
    {{-- <button type="reset" class="btn btn-primary "> Reset </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
    <button type="button" onclick="myFunction()" class="btn btn-primary btn-block "> Next </button>
          </div><br>


{{-- Show rendered Map and Notes and image --}}

          {{-- <div class="details" style="display:none">HIDDEN CONTENT</div> --}}
          <div class="details" id="details"  style="display:none">
         
              <div>
                    <div id="map"></div>
                   
              </div>
              <div class="form-group">
                    <label for="blah">Home Image</label>
                    <img id="homeimg" src="#" alt="Upload Home Image"/>
              </div>
              
              <div class="form-group">
                    <div class="form-group col-md-10">
                    <label for="inputNotes">Notes</label>
                    <input type="text" class="form-control" name="inputNotes" id="inputNotes" placeholder="Aditional Notes (in any)">
                  </div>
                  <div class="form-group col-md-2">
                        <label for="sector">Sector</label>
                        <input type="text" class="form-control" name="sector" id="sector" placeholder="Enter in Liters" required>
                      </div>
              </div><br><br><br><br>

                  <div class="form-group pull-right">
                        <button type="reset" class="btn btn-primary "> Reset </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary "> Save </button>
                              </div>
                              
            </div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
{{-- <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'See Less Details':'See More Details');});">See More Details</a> --}}
  </form>


  <script>
      function myFunction() {
          
  var x = document.getElementById("details");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "block";
  }
  initMap();
      }
     
            // Initialize and add the map
            function initMap() {

              // The location of Uluru
              var ilat = parseFloat(document.getElementById("inputlat4").value);
              var ilong = parseFloat(document.getElementById("inputlong4").value);
            //  alert(ilat  + "," +ilong);
              var uluru = {lat: ilat, lng: ilong};
              // The map, centered at Uluru
              var map = new google.maps.Map(
                  document.getElementById('map'), {zoom: 20, center: uluru});
              // The marker, positioned at Uluru
              var marker = new google.maps.Marker({position: uluru, map: map});
            }





            //render Image
            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#homeimg')
                        .attr('src', e.target.result)
                        .width(800)
                        .height(400);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }




                </script>
                <!--Load the API from the specified URL
                * The async attribute allows the browser to render the page while the API loads
                * The key parameter will contain your own API key (which is not needed for this tutorial)
                * The callback parameter executes the initMap() function
                -->
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeTmVyuiZHhVDSUNa6SZ4Yi6OTjQl2AWk&callback=initMap">
                </script>

@endsection
