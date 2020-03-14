<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- SEO -->
  <title>Simple CRUD</title>
  <meta name="description" content="Simple CRUD">
  <meta name="keywords" content="Simple CRUD, CRUD Sample, CRUD, PHP, MYSQL">
  <meta name="author" content="@Estartar.com">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= CONFIG["BASEURL"]. "/assets/images/favicon-32x32.png" ?>">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans:300,500" rel="stylesheet">

  <!-- Base CSS -->
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  
  <!-- Base JS -->
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/validate.js" ?>"></script>
  <script src="<?= CONFIG["BASEURL"]. "/assets/js/mask.js" ?>"></script>
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
