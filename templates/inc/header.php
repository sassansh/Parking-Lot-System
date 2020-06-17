<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <!-- Import Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Import Local Styles -->
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
    // Reference for this code snippet: http://www.sweet-web-design.com/wordpress/how-to-add-active-navigation-class-based-on-url-to-menu-item/2401/#:~:text=To%20add%20an%20'active'%20class,%2Fa%3E
    jQuery(function($) {
      var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
      $('li a').each(function() {
        if (this.href === path) {
          $(this).addClass('active');
        }
      });
    });
  </script>
</head>
<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">Parking Lot System</a>
  </nav>
  <?php displayMessage(); ?>
  <div class="container-fluid">
    <div class="row">