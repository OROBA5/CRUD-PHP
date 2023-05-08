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
  
    // Update form action URL based on selected type
    function changeActionForm() {
      var type = $('#type').val();
      var action = '';
      if (type == '3') {
        action = 'products/book.php';
        console.log(action);
      } else if (type == '1') {
        action = 'add_dvd.php';
      } else if (type == '2') {
        action = 'add_furniture.php';
      }
      $('#myForm').attr('action', action);
    }
  });