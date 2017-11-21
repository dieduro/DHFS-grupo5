window.addEventListener('load', function() {
  var todo = document.querySelector('#todo');

  todo.addEventListener('click', function() {
    var selected = document.querySelectorAll('.guanoguan');

    selected.forEach(function(elem) {
      if (elem.checked == true){
        elem.checked = false;
      } else {
        elem.checked = true;
      }
    });
  });
});
