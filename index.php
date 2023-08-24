<!DOCTYPE html>
<html>

<head>
  <link rel="Stylesheet" href="styles.css">
  <title>Employee Grievance System</title>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      // Handle form submission
      $('form').submit(function(e) {
        e.preventDefault(); // Prevent page refresh

        // Send form data to the server
        $.ajax({
          type: 'POST',
          url: 'submit_grievance.php',
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              // Show success message as popup
              alert(response.message);
              window.location.reload();
            } else {
              // Show error message as popup
              alert(response.message);
            }
          },
        });
      });
    });
  </script>
</head>

<body>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>Employee Grievance</span>
            <span>System</span>
          </div>
          <div class="app-copyright">Made with ❤ by Fardeen Beigh</div>
        </div>
        <div class="screen-body-item">
<form method="POST">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="NAME"
               name="employee_name"
              id="employee_name" 
              required="required">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL"  
              name="email"
              id="email"
              required="required">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="CONTACT NO"
              name="phone_number"
              id="phone_number"
              required="required">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="MESSAGE"
              name="grievance_text"
              id="grievance_text"
              required="required">
            </div>
            <div class="app-form-group buttons">
            <button class="button">Send</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
    <hr>
  <h2>List of Grievances</h2>
  <?php include('list_grievances.php'); 
  ?>
  </div>
</div>

</body>

</html>
