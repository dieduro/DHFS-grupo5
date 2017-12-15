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

    var errors = {};

    function createSpan() {
      var spanError = document.createElement("span");
      spanError.className = "errores";
      return spanError;
    }

    function deleteSpan(id) {
      var div = document.querySelector(id);
      var span = document.querySelector(id + " " + 'span');

      if (div && span) {
        div.removeChild(span);
      }
    }

    function isEmpty(obj) {
      for(var key in obj) {
        if(obj.hasOwnProperty(key))
        return false;
      }
      return true;
    }

    username.addEventListener('blur', function() {
      if (errors.username) {
        delete errors.username
      }
      deleteSpan('.username');
      var usernameValue = document.querySelector('#username').value;
      var usernameDiv = document.querySelector('.username');
      var spanError = createSpan();
      if ( !regexVacio.test(usernameValue) ) {
        errors.username = "Elegí un nombre de usuario";
      } else if ( usernameValue.length < 3 || usernameValue.length > 15 ) {
        errors.username = "Elegí un numbre de usuario de entre 3 y 15 caracteres";
      } else {
        username.style.backgroundColor = '#e5ffe5';
      };

      if (errors.username) {
        spanError.innerHTML = errors.username;
        usernameDiv.appendChild(spanError);
        username.style.backgroundColor = '#ffe5e5';
      }
    });

    email.addEventListener('blur', function () {
      if (errors.email) {
        delete errors.email;
      }
      deleteSpan('.email');
      var emailValue = document.querySelector('#email').value;
      var emailDiv = document.querySelector('.email');
      var spanError = createSpan();
      if ( emailValue == "" ) {
        errors.email = "Ingresá un email";
      } else if ( !regexMail.test(emailValue) ) {
        errors.email = "Ingresá un email válido";
      } else {
        email.style.backgroundColor = '#e5ffe5';
      };

      if (errors.email) {
        spanError.innerHTML = errors.email;
        emailDiv.appendChild(spanError);
        email.style.backgroundColor = '#ffe5e5';
      }
    });

    password.addEventListener('blur', function () {
      if (errors.password) {
        delete errors.password;
      }
      deleteSpan('.password');
      var passwordValue = document.querySelector('#password').value;
      var passwordDiv = document.querySelector('.password');
      var spanError = createSpan();
      if ( !regexVacio.test(passwordValue) ) {
        errors.password = "Ingresá una contraseña";
      } else if ( passwordValue.length < 6 ) {
        errors.password = "La contraseña debe tener al menos 6 caracteres";
      } else {
        password.style.backgroundColor = '#e5ffe5';
      };

      if (errors.password) {
        spanError.innerHTML = errors.password;
        passwordDiv.appendChild(spanError);
        password.style.backgroundColor = '#ffe5e5';
      };
    });

    cpassword.addEventListener('blur', function () {
      if (errors.cpassword) {
        delete errors.cpassword;
      }
      deleteSpan('.cpassword');
      var passwordValue = document.querySelector('#password').value;
      var cpasswordValue = document.querySelector('#cpassword').value;
      var cpasswordDiv = document.querySelector('.cpassword');
      var spanError = createSpan();
      if ( cpasswordValue == "" || cpasswordValue != passwordValue ) {
        errors.cpassword = "Las contraseñas no se verifican";
      } else {
        cpassword.style.backgroundColor = '#e5ffe5';
      };

      if (errors.cpassword) {
        spanError.innerHTML = errors.cpassword;
        cpasswordDiv.appendChild(spanError);
        cpassword.style.backgroundColor = '#ffe5e5';
      }
    });

    legals.addEventListener('blur', function () {
      if (errors.legals) {
        delete errors.legals
      }
      deleteSpan('.legals');
      var legalsDiv = document.querySelector('.legals');
      var spanError = createSpan();
      if ( legals.checked == false ) {
        legals.style.boxShadow = '0 0 2px red';
        errors.legals = "Campo obligatorio";
        spanError.innerHTML = errors.legals;
        legalsDiv.appendChild(spanError);
      } else {
        legals.style.boxShadow = 'none';
      };
    });

    form.addEventListener('submit', function (event) {
      if (!isEmpty(errors)) {
        event.preventDefault();
      } else {
        errors = [];
      };
    });

// BUSCADOR DE PARTIDOS

    var selectSport = document.querySelector(#selectSport)

    selectSport.addEventListener('change', function(){
      
    })
















  });
