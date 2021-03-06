window.addEventListener('load', function() {

  var autocomplete;
  var componentForm = {
    street_number: '',
    sublocality_level_1: '',
    administrative_area_level_1: '',
    country: '',
  };



  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    var input = document.getElementById('autocomplete');
    var options = {
      //bounds: defaultBounds,
      types: ['establishment','geocode'],
      componentRestrictions: {country: 'ar'}
    };
    autocomplete = new google.maps.places.Autocomplete(input,
      options);
      geolocate();

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    
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

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();
      
      for (var component in componentForm) {
        if (document.getElementById(component)) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
        
      }
      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      
      if (place.name ) {
        var hayName = document.querySelector('#name');
        if ( hayName == null){
          
          var nameInput =  document.createElement('input');
          nameInput.setAttribute('class','field');
          nameInput.setAttribute('id','name');
          nameInput.setAttribute('placeholder','Club o Establecimiento');
          var addressInfo = document.querySelector('#addressInfo');
          addressInfo.prepend(nameInput);
        }
        var name = document.querySelector('#name');
        componentForm.name = place.name;
        name.value = componentForm.name;
        
        
       }
       
      for (var i = 0; i < place.address_components.length; i++) {
      
        var addressType = place.address_components[i].types[0];
        var val = place.address_components[i].long_name;
       
         if (componentForm.hasOwnProperty(addressType) || addressType == 'premise') {
          if (addressType == "street_number") {
            document.getElementById(addressType).value = place.address_components[i+1].long_name+ ' ' + val;
          } else if (addressType == 'premise') {
            document.getElementById('street_number').value = val;
          }
          else if (document.getElementById(addressType)) {
            document.getElementById(addressType).value =  val;
           }
        }
      }
    }
    
     
    
    var address = document.querySelector('#autocomplete');
    if (address) {
      address.addEventListener ('focus', function(event) {
        initAutocomplete();
        
      });
      address.addEventListener ('blur', function(event) {
       
      });
    }
  
  
    var btn = document.querySelector('.dropbtn');
    btn.onclick = function() {
      document.getElementById("myDropdown").classList.toggle("show");
    }


    var miCuenta = document.querySelector('#miCuenta');
    miCuenta.onclick = function() {
      var miCuentaItems = document.querySelector("#dropdown-left");
      miCuentaItems.classList.toggle("show");
    }

    var partidos = document.querySelector('#partidos');
    partidos.onclick = function() {
      var partidosItems = document.querySelector("#partidosItems");
      partidosItems.classList.toggle("show");
    }





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
    if (username) { 
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
    }
    if (email) {
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
    }
    if (password) {
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
    }
    if (cpassword) {

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
    }
    if (legals) {
      
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
    }
    if (form) {
    form.addEventListener('submit', function (event) {
      if (!isEmpty(errors)) {
        event.preventDefault();
      } else {
        errors = [];
      };
    });
  }

// BUSCADOR DE PARTIDOS

    var selectSport = document.querySelector('#selectSport');
  
    if ( selectSport) {
    selectSport.addEventListener('change', function(){
      
    })
    }
   
















  });
