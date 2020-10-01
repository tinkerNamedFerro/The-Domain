<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width" />

  <!-- Favicon and title -->
  <link rel="icon" href="path/to/fav.png">
  <title>Starter template - Halfmoon</title>

  <!-- Halfmoon CSS -->
  <script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
  <!--
    Or,
    Use the following (no variables, supports IE11):
    <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.0/css/halfmoon.min.css" rel="stylesheet" />
    Learn more: https://www.gethalfmoon.com/docs/customize/#notes-on-browser-compatibility
  -->
</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-set-preferred-mode-onload="true">
  <!-- Modals go here -->
  <!-- Reference: https://www.gethalfmoon.com/docs/modal -->

  <!-- Page wrapper start -->
  <div class="page-wrapper with-navbar">

    <!-- Sticky alerts (toasts), empty container -->
    <!-- Reference: https://www.gethalfmoon.com/docs/sticky-alerts-toasts -->
    <div class="sticky-alerts"></div>

    <!-- Navbar start -->
    <nav class="navbar">
      <!-- Reference: https://www.gethalfmoon.com/docs/navbar -->
        <!-- Navbar content (with toggle sidebar button) -->
        <div class="navbar-content">
        <button class="btn btn-action" type="button">
          <i class="fa fa-bars" aria-hidden="true"></i>
          <span class="sr-only">Toggle sidebar</span> <!-- sr-only = show only on screen readers -->
        </button>
      </div>
      <!-- Navbar brand -->
      <a href="#" class="navbar-brand">
        <img src="..." alt="...">
        Brand
      </a>
      <!-- Navbar text -->
      <span class="navbar-text text-monospace">v3.0</span> <!-- text-monospace = font-family shifted to monospace -->
      <!-- Navbar nav -->
      <ul class="navbar-nav d-none d-md-flex"> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px) -->
        <li class="nav-item active">
          <a href="#" class="nav-link">Docs</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Products</a>
        </li>
      </ul>
      <!-- Navbar form (inline form) -->
      <form class="form-inline d-none d-md-flex ml-auto" action="..." method="..."> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px), ml-auto = margin-left: auto -->
        <input type="text" class="form-control" placeholder="Email address" required="required">
        <button class="btn btn-primary" type="submit">Sign up</button>
      </form>
      <!-- Navbar content (with the dropdown menu) -->
      <div class="navbar-content d-md-none ml-auto"> <!-- d-md-none = display: none on medium screens and up (width > 768px), ml-auto = margin-left: auto -->
        <div class="dropdown with-arrow">
          <button class="btn" data-toggle="dropdown" type="button" id="navbar-dropdown-toggle-btn-1">
            Menu
            <i class="fa fa-angle-down" aria-hidden="true"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right w-200" aria-labelledby="navbar-dropdown-toggle-btn-1"> <!-- w-200 = width: 20rem (200px) -->
            <a href="#" class="dropdown-item">Docs</a>
            <a href="#" class="dropdown-item">Products</a>
            <div class="dropdown-divider"></div>
            <div class="dropdown-content">
              <form action="..." method="...">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email address" required="required">
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
    <p>sdsdadasd</p>
    </div>
    <!-- Content wrapper end -->

  </div>
  <!-- Page wrapper end -->

  <!-- Halfmoon JS -->
  <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.0/js/halfmoon.min.js"></script>
</body>
</html>