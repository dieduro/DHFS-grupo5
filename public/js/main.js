

window.addEventListener('load', function() {

  var btn = document.querySelector('.dropbtn');
  btn.onclick = function() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // var nplayers = document.querySelector(".countL");
  // if (window.innerWidth < 420) {
  //   nplayers.classList.toggle("show");
  // }


  // var todo = document.querySelector('#selectAll');
  //
  // todo.addEventListener('click', function() {
  //   var selected = document.querySelectorAll('.select');
  //
  //   selected.forEach(function(elem) {
  //     if (elem.checked == true){
  //       elem.checked = false;
  //     } else {
  //       elem.checked = true;
  // }
  // });
  // });

  var autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };
  function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
          {types: ['geocode']});

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      //autocomplete.addListener('place_changed', fillInAddress);
      
    }
    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();
      console.log(place);
      
      for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }
    }
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }

    var address = document.querySelector('#autocomplete');
    address.addEventListener('input', function(event){
      initAutocomplete();
      
    });
    
    



});
