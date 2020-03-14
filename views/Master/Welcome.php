<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- SEO Tags -->
  <title>Alpha . PHP XS Framework</title>
  <meta name="description" content="A PHP Micro Framework">
  <meta name="keywords" content="PHP, Microframework, Framework, MVC, ActiveRecord">
  <meta name="author" content="Estartar.com">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= CONFIG["BASEURL"]. "/assets/images/favicon-32x32.png" ?>">

  <!-- CSS -->
  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/css/sb-admin-2.css?version=". rand() ?>">

  <!-- Vendor -->  
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/fontawesome-free/css/all.min.css" ?>" >
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans:300,500" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/css/quill.css?version=". rand() ?>">  
  
  <!-- Base -->
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/css/spinner.css?version=". rand() ?>">
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/css/snackbar.css?version=". rand() ?>">
  <link rel="stylesheet" type="text/css" href="<?= CONFIG["BASEURL"]. "/assets/css/style.css?version=". rand() ?>">  
</head>

<body id="page-top" style="position: relative">

  <!-- Hidden Fields -->
  <input type="hidden" name="root" value="<?= CONFIG["BASEURL"] ?>"/>  

  <!-- Spinner -->  
  <div class="spinner-container">
      <div class="spinner"></div>
  </div>

  <!-- Snackbar -->  
  <div id="snackbar"></div>

  <!-- View -->
  <?= $view ?>
  <!-- //. End View -->

  <!-- Vendor JS -->
  <script src="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/jquery/jquery.min.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/jquery-easing/jquery.easing.min.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/datatables/jquery.dataTables.min.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js" ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

  <!-- Theme JS -->
  <script src="<?= CONFIG["BASEURL"]. "/assets/themes/sb-admin/js/sb-admin-2.min.js?version=". rand() ?>"></script>
  
  <!-- Base JS -->
  <!-- TODO: Review Order -->
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/moment.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/moment-business.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/moment-holiday.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/moment-pt-br.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/validate.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/mask.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/overlay.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/datepicker.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/datepicker.pt-BR.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/Chart.bundle.min.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/quill.js" ?>"></script>  
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/quill-image-resize.js" ?>"></script>  
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/app.js?version=". rand() ?>"></script>

  <!-- Custom JS -->
  <script>
    $(document).ready(function() {

        app.init();
        
        // ----------------- //
        // Backend messages  //
        // ----------------- //
        <?php if(!empty($viewbag->alert)) { ?>
          app.message('<i class="<?= $viewbag->alert->icon ?>"></i> <?= $viewbag->alert->body ?>');
        <?php } ?>  

    });
  </script>  
</body>

</html>
