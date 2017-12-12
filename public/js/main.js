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
      /** @type {!HTMLblurElement} */(document.getElementById('autocomplete')),
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
    // address.addEventListener ('blur', function(event) {
    //   initAutocomplete();
    // });


    // VALIDACION DE REGISTER

      var regexVacio = /^[a-z0-9]+$/i;
      var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

      var form = document.querySelector('#register');
      var username = document.querySelector('#username');
      var email = document.querySelector('#email');
      var password = document.querySelector('#password');
      var cpassword = document.querySelector('#cpassword');
      var legals = document.querySelector('#legals');

      var errors = [];

      username.addEventListener('blur', function() {
        var usernameValue = document.querySelector('#username').value;
        if ( !regexVacio.test(usernameValue) ) {
          // username.style.boxShadow = '0 0 2px red';
          username.style.backgroundColor = '#ffe5e5';
          console.log("campo username vacío");
          var errorUsername = ["username", "elegí un nombre de usuario"];
          errors.push(errorUsername);
        } else if ( usernameValue.length < 3 || usernameValue.length > 15 ) {
          // username.style.boxShadow = '0 0 2px red';
          username.style.backgroundColor = '#ffe5e5';
          console.log("elegí un numbre de usuario de entre 3 y 15 caracteres");
          var errorUsername = ["username", "elegí un numbre de usuario de entre 3 y 15 caracteres"];
          errors.push(errorUsername);
        } else {
          // username.style.boxShadow = '0 0 2px #00B200';
          username.style.backgroundColor = '#e5ffe5';
          console.log("todo ok en username");
        };
      });

      email.addEventListener('blur', function () {
        var emailValue = document.querySelector('#email').value;
        if ( emailValue == null ) {
          // email.style.boxShadow = '0 0 2px red';
          email.style.backgroundColor = '#ffe5e5';
          console.log("campo email vacío");
          var errorEmail = ["email", "Email no puede estar vacío"];
          errors.push(errorEmail);
        } else if ( !regexMail.test(emailValue) ) {
          // email.style.boxShadow = '0 0 2px red';
          email.style.backgroundColor = '#ffe5e5';
          console.log("ingresá un mail válido");
          var errorEmail = ["email", "Ingresá un email válido"];
          errors.push(errorEmail);
        } else {
          // email.style.boxShadow = '0 0 2px #00B200';
          email.style.backgroundColor = '#e5ffe5';
          console.log("todo ok en email");
        };
      });

      password.addEventListener('blur', function () {
        var passwordValue = document.querySelector('#password').value;
        if ( !regexVacio.test(passwordValue) ) {
          // password.style.boxShadow = '0 0 2px red';
          password.style.backgroundColor = '#ffe5e5';
          console.log("campo password vacío");
          var errorPass = ["password", "Ingresá una contraseña"];
          errors.push(errorPass)
        } else if ( password.length < 6 ) {
          // password.style.boxShadow = '0 0 2px red';
          password.style.backgroundColor = '#ffe5e5';
          console.log("la contraseña debe tener al menos 8 caracteres");
          var errorPass = ["password", "Ingresá una contraseña"];
          errors.push(errorPass);
        } else {
          // password.style.boxShadow = '0 0 2px #00B200';
          password.style.backgroundColor = '#e5ffe5';
          console.log("todo ok en pass");
        };
      });

      cpassword.addEventListener('blur', function () {
        var cpasswordValue = document.querySelector('#cpassword').value;
        var passwordValue = document.querySelector('#password').value;
        if ( !regexVacio.test(cpasswordValue) ) {
          // cpassword.style.boxShadow = '0 0 2px red';
          cpassword.style.backgroundColor = '#ffe5e5';
          console.log("Por favor confirmá la contraseña");
          var errorCpass = ["password", "Por favor confirmá la contraseña"]
          errors.push(errorCpass);
        } else if ( cpasswordValue !== passwordValue ) {
          // cpassword.style.boxShadow = '0 0 2px red';
          cpassword.style.backgroundColor = '#ffe5e5';
          console.log("la contraseña no verifica");
          var errorCpass = ["password", "Las contraseñas no son iguales"]
          errors.push(errorCpass);
        } else {
          // cpassword.style.boxShadow = '0 0 2px #00B200';
          cpassword.style.backgroundColor = '#e5ffe5';
          console.log( "todo ok en cpassword");
        };
      });

      legals.addEventListener('blur', function () {
        if ( legals.checked == false ) {
          legals.style.boxShadow = '0 0 2px red';
          console.log("campo legals no clickeado");
          var errorLegals = ["legals", "debés aceptar las condiciones de uso de TeamUp!"];
          errors.push(errorLegals);
        } else {
          legals.style.boxShadow = 'none';
        };
      });

      form.addEventListener('submit', function (event) {
        // validateUsername();
        // validateEmail();
        // validatePassword();
        // validateCpassword();
        // validateLegals();
        if (errors != "") {
          event.preventDefault();
          console.log(errors);
        } else {
          errors = [];
        };
      });

  });
