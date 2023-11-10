<?php include_once 'config/init.php'; ?>
<style><?php include 'style/style.css'; ?></style>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Timeline | Politechnika Warszawska</title>
    <link rel="Shortcut icon" href="https://www.pw.edu.pl/design/pw2021/images/favicon/favicon-32x32.png" type="image/x-icon"/>
    <style>
        body, html {
            font-family: arial, sans-serif;
            font-size: 11pt;
        }

        #visualization {
            box-sizing: border-box;
            width: 100%;
            height: 300px;
        }
    </style>
    <!-- note: moment.js must be loaded before vis-timeline-graph2d or the embedded version of moment.js is used -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script type="text/javascript"
            src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet"
          type="text/css"/>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="https://img.icons8.com/?size=80&id=ubUEdo7OzHhC&format=png" alt="Logo" height="70px" width="70px">
            </a>
        </div>

        <h1 class="mainHeader">Timeline</h1>

        <div class="col-md-3 text-end">
            <?php
            if (isset($_SESSION['id']) && isset($_SESSION['email'])) {?>

            <a id="printPageButton" href="logout.php" class="btn btn-primary me-2" role="button">Log out</a>

         <?php }else{?>
            <a id="printPageButton" href="templates/login-form.php" class="btn btn-outline-primary me-2" role="button">Login</a>
            <a id="printPageButton" href="templates/sign-up-form.php" class="btn btn-primary" role="button">Sign-up</a>

           <?php } ?>
        </div>
    </header>
</div>
<?php displayMessage();?>