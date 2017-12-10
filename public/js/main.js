window.addEventListener('load', function() {

  var autocomplete;
  var componentForm = {
    street_number: '',
    locality: '',
    administrative_area_level_1: '',
    country: '',
  };
  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();
      console.log(place);
      console.log('me cago en dios');

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

      // var btnSubmit = document.querySelector('#crear');
      // btnSubmit.addEventListener('click', function(event){
      //   event.preventDefault();
      // });
      //
      var address = document.querySelector('#autocomplete');
      address.addEventListener ('focus', function(event) {
        geolocate();
      });
      address.addEventListener ('input', function(event) {
        initAutocomplete();
      });
    });

    username.addEventListener('blur', function () {
      var username = document.querySelector('#username').value;
      if ( username.length == "" ) {
        console.log("campo username vacío");
      } else if ( username.length < 3 && username.length > 15 ) {
        console.log("elegí un numbre de usuario de entre 3 y 15 caracteres");
      } else {
        console.log("todo ok");
      };
    });

    email.addEventListener('blur', function () {
      var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      var email = document.querySelector('#email').value;
      if ( email == "" ) {
        console.log("campo email vacío");
      } else if ( !regexMail.test(email) ) {
        console.log("ingresá un mail válido");
      } else {
        console.log("todo correcto");
      };
    });

    password.addEventListener('blur', function () {
      var regexVacio = /^[a-z0-9]+$/i;
      var password = document.querySelector('#password').value;
      if ( !regexVacio.test(password) ) {
        console.log("campo password vacío");
      } else if ( password.length < 6 ) {
        console.log("la contraseña debe tener al menos 8 caracteres");
      } else {
        console.log( "todo ok");
      };
    });

    cpassword.addEventListener('blur', function () {
      var regexVacio = /^[a-z0-9]+$/i;
      var password = document.querySelector('#password').value
      var cpassword = document.querySelector('#cpassword').value;
      if ( !regexVacio.test(cpassword) ) {
        console.log("Por favor confirmá la contraseña");
      } else if ( cpassword !== password ) {
        console.log("la contraseña no verifica");
      } else {
        console.log( "todo ok");
      };
    });

    var form = document.querySelector('#register');
    form.addEventListener('submit', function (event) {
      var legals = document.querySelector('#legals');
      if ( legals.checked == false ) {
        event.preventDefault();
        console.log("campo legals vacío");
      };
    });

});
