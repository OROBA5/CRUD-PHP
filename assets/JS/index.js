$(document).ready(function() {
  // Show/hide additional fields based on selected type
  $('#type').change(function() {
    var type = $(this).val();

    // Define object with keys as types and values as field IDs
    var fieldIDs = {
      '3': '#book-fields',
      '1': '#dvd-fields',
      '2': '#furniture-fields'
    };

    // Hide all additional fields initially
    $('.hidden').hide();

    // Show additional fields based on selected type
    if (fieldIDs[type]) {
      $(fieldIDs[type]).show();
    }
  });

});

// Define the changeActionForm function
function changeActionForm() {
  var type = $('#type').val();
  var action = '';
  if (type == '3') {
    action = '../products/book.php';
  } else if (type == '1') {
    action = '../products/dvd.php';
  } else if (type == '2') {
    action = '../products/furniture.php';
  }
  $('#myForm').attr('action', action);
}

// Handle the onchange event of the select element
$(document).ready(function() {
  $('#type').on('change', changeActionForm);
});
