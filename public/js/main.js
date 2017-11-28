

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
});
