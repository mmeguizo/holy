<?php ob_start(); ?>
<?php session_start(); ?>
<?php error_reporting(0); ?>
 <?php 

    if (!$_SESSION['id']) {
      
       header("Location: http://localhost:8080/orphan/pages/index.php");
       die();
    } 
    ?>
<?php 
    include('db.php')
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CHMSC</title>
    <!-- Favicon-->
    <link rel="icon" href="../../images/chmsc.jpg" type="image/x-icon">
    <!-- Favicon-->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="../../template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../template/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../template/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../template/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../template/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

     <!-- Bootstrap Select Css -->
    <link href="../../template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../../template/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../template/plugins/animate-css/animate.css" rel="stylesheet" />

     <!-- JQuery DataTable Css -->
    <link href="../../template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Sweet Alert Css -->
    <link href="../../template/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <!-- Custom Css -->
    <link href="../../template/css/style.css" rel="stylesheet">
    <link href="../../css/calendar.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../template/css/themes/all-themes.css" rel="stylesheet" />
</head>