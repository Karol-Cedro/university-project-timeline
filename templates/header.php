<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Timeline | Politechnika Warszawska</title>
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
    <link href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet"
          type="text/css"/>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="https://www.pw.edu.pl/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="https://www.okno.pw.edu.pl/design/okno/images/epw_przycisk.png" alt="Logo PW">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Features</a></li>
            <li><a href="#" class="nav-link px-2">Pricing</a></li>
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
    </header>
</div>