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
      };
    };

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
    // var address = document.querySelector('#autocomplete');
    // address.addEventListener ('focus', function(event) {
    //   geolocate();
    // });
    // address.addEventListener ('input', function(event) {
    //   initAutocomplete();
    // });


    // VALIDACION DE REGISTER

    function validate() {
      var regexVacio = /^[a-z0-9]+$/i;
      var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

      var form = document.querySelector('#register');
      var username = document.querySelector('#username');
      var email = document.querySelector('#email');
      var password = document.querySelector('#password');
      var cpassword = document.querySelector('#cpassword');
      var legals = document.querySelector('#legals');

      var errors = [];

      username.addEventListener('blur', function () {
        var username = document.querySelector('#username').value;
        if ( !regexVacio.test(username) ) {
          console.log("campo username vacío");
          var errorUsername = ["username", "elegí un nombre de usuario"];
          errors.push(errorUsername);
        } else if ( username.length < 3 && username.length > 15 ) {
          console.log("elegí un numbre de usuario de entre 3 y 15 caracteres");
          var errorUsername = ["username", "elegí un numbre de usuario de entre 3 y 15 caracteres"];
          errors.push(errorUsername);
        } else {
          console.log("todo ok");
        };
      });

      email.addEventListener('blur', function () {
        var email = document.querySelector('#email').value;
        if ( !regexVacio.test(email) ) {
          console.log("campo email vacío");
          var errorEmail = ["email", "Email no puede estar vacío"];
          errors.push(errorEmail);
        } else if ( !regexMail.test(email) ) {
          console.log("ingresá un mail válido");
          var errorEmail = ["email", "Ingresá un email válido"];
          errors.push(errorEmail);
        } else {
          console.log("todo ok en email");
        };
      });

      password.addEventListener('blur', function () {
        var password = document.querySelector('#password').value;
        if ( !regexVacio.test(password) ) {
          console.log("campo password vacío");
          var errorPass = ["password", "Ingresá una contraseña"];
          errors.push(errorPass)
        } else if ( password.length < 6 ) {
          console.log("la contraseña debe tener al menos 8 caracteres");
          var errorPass = ["password", "Ingresá una contraseña"];
        } else {
          console.log("todo ok en pass");
        };
      });

      cpassword.addEventListener('blur', function () {
        var cpassword = document.querySelector('#cpassword').value;
        if ( !regexVacio.test(cpassword) ) {
          console.log("Por favor confirmá la contraseña");
          var errorCpass = ["password", "Por favor confirmá la contraseña"]
          errors.push(errorCpass);
        } else if ( cpassword !== password ) {
          console.log("la contraseña no verifica");
          var errorCpass = ["password", "Las contraseñas no son iguales"]
          errors.push(errorCpass);
        } else {
          console.log( "todo ok en cpassword");
        };
      });

      legals.addEventListener('blur', function () {
        if ( legals.checked == false ) {
          console.log("campo legals no clickeado");
        };
      });

      form.addEventListener('submit', function (event) {
        if (errors != "") {
          event.preventDefault();
        };
      });

    };
    validate();

  });
