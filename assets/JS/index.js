$(document).ready(function() {
    // Show/hide additional fields based on selected type
    $('#type').change(function() {
      var type = $(this).val();
      
      // Define object with keys as types and values as field IDs
      var fieldIDs = {
        book: '#book-fields',
        dvd: '#dvd-fields',
        furniture: '#furniture-fields'
      };
      
      // Hide all additional fields initially
      $('.hidden').hide();
  
      // Show additional fields based on selected type
      if (fieldIDs[type]) {
        $(fieldIDs[type]).show();
      }
    });
  });

  function changeActionForm() {
    var type = document.getElementById("type").value;
    var form = document.getElementById("myForm");
    if (type == "book") {
      form.action = "../products/book.php";
    } else if (type == "dvd") {
      form.action = "database/adddvd.php";
    } else if (type == "furniture") {
      form.action = "database/addfurniture.php";
    }
  }