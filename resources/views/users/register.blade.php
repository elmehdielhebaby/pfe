<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon.ico')}} ">

  <title>REGISTER</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}} " />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  <link href="{{ asset('assets')}}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets')}}/css/material-bootstrap-wizard.css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets')}}/css/demo.css" rel="stylesheet" />

  <style>
    .topnav {
      background-color: #333;
      overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 20px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }


    /* Add a color to the active/current link */


    #m {
      text-align: rigth;
    }

    .navbar {
      position: relative;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 1rem;
    }

    .navbar>.container,
    .navbar>.container-fluid {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
    }

    .navbar-brand {
      display: inline-block;
      padding-top: 0.0625rem;
      padding-bottom: 0.0625rem;
      margin-right: 1rem;
      font-size: 1.25rem;
      line-height: inherit;
      white-space: nowrap;
    }

    .navbar-brand:hover,
    .navbar-brand:focus {
      text-decoration: none;
    }

    .navbar-nav {
      display: flex;
      flex-direction: column;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
    }

    .navbar-nav .nav-link:not(.btn) {
      padding-right: 0;
      padding-left: 0;
    }

    .navbar-nav .dropdown-menu {
      position: static;
      float: none;
    }

    .navbar-text {
      display: inline-block;
      padding-top: 0.25rem;
      padding-bottom: 0.25rem;
    }

    .navbar-collapse {
      flex-basis: 100%;
      flex-grow: 1;
      align-items: center;
    }

    .navbar-toggler {
      padding: 0.25rem 0.75rem;
      font-size: 1.25rem;
      line-height: 1;
      background-color: transparent;
      border: 0.0625rem solid transparent;
      border-radius: 0.25rem;
    }

    .navbar-toggler:hover,
    .navbar-toggler:focus {
      text-decoration: none;
    }

    .navbar-toggler-icon {
      display: inline-block;
      width: 1.5em;
      height: 1.5em;
      vertical-align: middle;
      content: "";
      background: no-repeat center center;
      background-size: 100% 100%;
    }

    @media (max-width: 575.98px) {

      .navbar-expand-sm>.container,
      .navbar-expand-sm>.container-fluid {
        padding-right: 0;
        padding-left: 0;
      }
    }

    @media (min-width: 576px) {
      .navbar-expand-sm {
        flex-flow: row nowrap;
        justify-content: flex-start;
      }

      .navbar-expand-sm .navbar-nav {
        flex-direction: row;
      }

      .navbar-expand-sm .navbar-nav .dropdown-menu {
        position: absolute;
      }

      .navbar-expand-sm .navbar-nav .nav-link {
        padding-right: 1rem;
        padding-left: 1rem;
      }

      .navbar-expand-sm>.container,
      .navbar-expand-sm>.container-fluid {
        flex-wrap: nowrap;
      }

      .navbar-expand-sm .navbar-collapse {
        display: flex !important;
        flex-basis: auto;
      }

      .navbar-expand-sm .navbar-toggler {
        display: none;
      }
    }

    @media (max-width: 767.98px) {

      .navbar-expand-md>.container,
      .navbar-expand-md>.container-fluid {
        padding-right: 0;
        padding-left: 0;
      }
    }

    @media (min-width: 768px) {
      .navbar-expand-md {
        flex-flow: row nowrap;
        justify-content: flex-start;
      }

      .navbar-expand-md .navbar-nav {
        flex-direction: row;
      }

      .navbar-expand-md .navbar-nav .dropdown-menu {
        position: absolute;
      }

      .navbar-expand-md .navbar-nav .nav-link {
        padding-right: 1rem;
        padding-left: 1rem;
      }

      .navbar-expand-md>.container,
      .navbar-expand-md>.container-fluid {
        flex-wrap: nowrap;
      }

      .navbar-expand-md .navbar-collapse {
        display: flex !important;
        flex-basis: auto;
      }

      .navbar-expand-md .navbar-toggler {
        display: none;
      }
    }

    @media (max-width: 991.98px) {

      .navbar-expand-lg>.container,
      .navbar-expand-lg>.container-fluid {
        padding-right: 0;
        padding-left: 0;
      }
    }

    @media (min-width: 992px) {
      .navbar-expand-lg {
        flex-flow: row nowrap;
        justify-content: flex-start;
      }

      .navbar-expand-lg .navbar-nav {
        flex-direction: row;
      }

      .navbar-expand-lg .navbar-nav .dropdown-menu {
        position: absolute;
      }

      .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 1rem;
        padding-left: 1rem;
      }

      .navbar-expand-lg>.container,
      .navbar-expand-lg>.container-fluid {
        flex-wrap: nowrap;
      }

      .navbar-expand-lg .navbar-collapse {
        display: flex !important;
        flex-basis: auto;
      }

      .navbar-expand-lg .navbar-toggler {
        display: none;
      }
    }

    @media (max-width: 1199.98px) {

      .navbar-expand-xl>.container,
      .navbar-expand-xl>.container-fluid {
        padding-right: 0;
        padding-left: 0;
      }
    }

    @media (min-width: 1200px) {
      .navbar-expand-xl {
        flex-flow: row nowrap;
        justify-content: flex-start;
      }

      .navbar-expand-xl .navbar-nav {
        flex-direction: row;
      }

      .navbar-expand-xl .navbar-nav .dropdown-menu {
        position: absolute;
      }

      .navbar-expand-xl .navbar-nav .nav-link {
        padding-right: 1rem;
        padding-left: 1rem;
      }

      .navbar-expand-xl>.container,
      .navbar-expand-xl>.container-fluid {
        flex-wrap: nowrap;
      }

      .navbar-expand-xl .navbar-collapse {
        display: flex !important;
        flex-basis: auto;
      }

      .navbar-expand-xl .navbar-toggler {
        display: none;
      }
    }

    .navbar-expand {
      flex-flow: row nowrap;
      justify-content: flex-start;
    }

    .navbar-expand>.container,
    .navbar-expand>.container-fluid {
      padding-right: 0;
      padding-left: 0;
    }

    .navbar-expand .navbar-nav {
      flex-direction: row;
    }

    .navbar-expand .navbar-nav .dropdown-menu {
      position: absolute;
    }

    .navbar-expand .navbar-nav .nav-link {
      padding-right: 1rem;
      padding-left: 1rem;
    }

    .navbar-expand>.container,
    .navbar-expand>.container-fluid {
      flex-wrap: nowrap;
    }

    .navbar-expand .navbar-collapse {
      display: flex !important;
      flex-basis: auto;
    }

    .navbar-expand .navbar-toggler {
      display: none;
    }

    .navbar-light .navbar-brand {
      color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-brand:hover,
    .navbar-light .navbar-brand:focus {
      color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-nav .nav-link {
      color: rgba(0, 0, 0, 0.5);
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus {
      color: rgba(0, 0, 0, 0.7);
    }

    .navbar-light .navbar-nav .nav-link.disabled {
      color: rgba(0, 0, 0, 0.3);
    }

    .navbar-light .navbar-nav .show>.nav-link,
    .navbar-light .navbar-nav .active>.nav-link,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .nav-link.active {
      color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-toggler {
      color: rgba(0, 0, 0, 0.5);
      border-color: transparent;
    }

    .navbar-light .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-light .navbar-text {
      color: rgba(0, 0, 0, 0.5);
    }

    .navbar-light .navbar-text a {
      color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-text a:hover,
    .navbar-light .navbar-text a:focus {
      color: rgba(0, 0, 0, 0.9);
    }

    .navbar-dark .navbar-brand {
      color: rgba(255, 255, 255, 0.65);
    }

    .navbar-dark .navbar-brand:hover,
    .navbar-dark .navbar-brand:focus {
      color: rgba(255, 255, 255, 0.65);
    }

    .navbar-dark .navbar-nav .nav-link {
      color: rgba(255, 255, 255, 0.95);
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
      color: rgba(255, 255, 255, 0.65);
    }

    .navbar-dark .navbar-nav .nav-link.disabled {
      color: rgba(255, 255, 255, 0.25);
    }

    .navbar-dark .navbar-nav .show>.nav-link,
    .navbar-dark .navbar-nav .active>.nav-link,
    .navbar-dark .navbar-nav .nav-link.show,
    .navbar-dark .navbar-nav .nav-link.active {
      color: rgba(255, 255, 255, 0.65);
    }

    .navbar-dark .navbar-toggler {
      color: rgba(255, 255, 255, 0.95);
      border-color: transparent;
    }

    .navbar-dark .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.95)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-dark .navbar-text {
      color: rgba(255, 255, 255, 0.95);
    }

    .navbar-dark .navbar-text a {
      color: rgba(255, 255, 255, 0.65);
    }

    .navbar-dark .navbar-text a:hover,
    .navbar-dark .navbar-text a:focus {
      color: rgba(255, 255, 255, 0.65);
    }

    .navbar.navbar-absolute {
      position: absolute;
      z-index: 1050;
      width: 100%;
    }

    .navbar.navbar-main {
      z-index: 3;
    }

    .navbar-nav .nav-link {
      font-size: 0.9rem;
      font-family: "Open Sans", sans-serif;
      font-weight: 400;
      text-transform: normal;
      letter-spacing: 0;
      transition: all 0.15s linear;
    }

    @media (prefers-reduced-motion: reduce) {
      .navbar-nav .nav-link {
        transition: none;
      }
    }

    .navbar-nav .nav-link .nav-link-inner--text {
      margin-left: .25rem;
    }

    .navbar-brand {
      font-size: 0.875rem;
      font-weight: 600;
      text-transform: uppercase;
      font-size: .875rem;
      letter-spacing: .05px;
    }

    .navbar-brand img {
      height: 30px;
    }

    .navbar-dark .navbar-brand {
      color: #fff;
    }

    .navbar-light .navbar-brand {
      color: #32325d;
    }

    .navbar-nav .nav-item .media:not(:last-child) {
      margin-bottom: 1.5rem;
    }

    @media (min-width: 992px) {
      .navbar-nav .nav-item {
        margin-right: .5rem;
      }

      .navbar-nav .nav-item [data-toggle="dropdown"]::after {
        transition: all 0.15s ease;
      }

      .navbar-nav .nav-item.show [data-toggle="dropdown"]::after {
        transform: rotate(180deg);
      }

      .navbar-nav .nav-link {
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-radius: 0.25rem;
      }

      .navbar-nav .nav-link i {
        margin-right: .625rem;
      }

      .navbar-nav .nav-link-icon {
        padding-left: .5rem !important;
        padding-right: .5rem !important;
        font-size: 1rem;
        border-radius: 0.25rem;
      }

      .navbar-nav .nav-link-icon i {
        margin-right: 0;
      }

      .navbar-nav .dropdown-menu {
        opacity: 0;
        pointer-events: none;
        margin: 0;
      }

      .navbar-nav .dropdown-menu:before {
        background: #fff;
        box-shadow: none;
        content: '';
        display: block;
        height: 16px;
        width: 16px;
        left: 5px;
        position: absolute;
        bottom: 100%;
        transform: rotate(-45deg) translateY(1rem);
        z-index: -5;
        border-radius: 0.2rem;
      }

      .navbar-nav .dropdown-menu-right:before {
        right: 20px;
        left: auto;
      }

      .navbar-nav:not(.navbar-nav-hover) .dropdown-menu.show {
        opacity: 1;
        pointer-events: auto;
        animation: show-navbar-dropdown .25s ease forwards;
      }

      .navbar-nav:not(.navbar-nav-hover) .dropdown-menu.close {
        display: block;
        animation: hide-navbar-dropdown .15s ease backwards;
      }

      .navbar-nav.navbar-nav-hover .dropdown-menu {
        opacity: 0;
        display: block;
        pointer-events: none;
        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
        transition: visibility 0.25s, opacity 0.25s, transform 0.25s;
        animation: none;
      }

      .navbar-nav.navbar-nav-hover .nav-item.dropdown:hover>.dropdown-menu {
        display: block;
        opacity: 1;
        pointer-events: auto;
        visibility: visible;
        transform: translate(0, 0);
        animation: none;
      }

      .navbar-nav.navbar-nav-hover .nav-item.dropdown>.dropdown-menu .dropdown-item.open+.dropdown-menu {
        display: block;
        opacity: 1;
        pointer-events: auto;
        visibility: visible;
        transform: translate(0, 0);
        animation: none;
      }

      .navbar-nav.navbar-nav-hover .nav-item.dropdown>.dropdown-menu .dropdown-item+.dropdown-menu {
        margin-left: 10px;
      }

      .navbar-nav.navbar-nav-hover .nav-item.dropdown>.dropdown-menu .dropdown-item+.dropdown-menu:before {
        left: -16px;
        top: 4px;
      }

      .navbar-nav .dropdown-menu-inner {
        position: relative;
        padding: 1rem;
      }
    }

    .navbar-transparent {
      position: absolute;
      top: 0;
      width: 100%;
      z-index: 100;
      background-color: transparent !important;
      border: 0;
      box-shadow: none;
    }

    .navbar-transparent .navbar-brand {
      color: white;
    }

    .navbar-transparent .navbar-toggler {
      color: white;
    }

    .navbar-transparent .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.95)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .bg-white .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    @media (min-width: 768px) {
      .navbar-transparent .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.95);
      }

      .navbar-transparent .navbar-nav .nav-link:hover,
      .navbar-transparent .navbar-nav .nav-link:focus {
        color: rgba(255, 255, 255, 0.65);
      }

      .navbar-transparent .navbar-nav .nav-link.disabled {
        color: rgba(255, 255, 255, 0.25);
      }

      .navbar-transparent .navbar-nav .show>.nav-link,
      .navbar-transparent .navbar-nav .active>.nav-link,
      .navbar-transparent .navbar-nav .nav-link.show,
      .navbar-transparent .navbar-nav .nav-link.active {
        color: rgba(255, 255, 255, 0.65);
      }

      .navbar-transparent .navbar-brand {
        color: rgba(255, 255, 255, 0.95);
      }

      .navbar-transparent .navbar-brand:hover,
      .navbar-transparent .navbar-brand:focus {
        color: rgba(255, 255, 255, 0.95);
      }
    }

    .navbar-collapse-header {
      display: none;
    }

    @media (max-width: 991.98px) {
      .navbar-nav .nav-link {
        padding: .625rem 0;
        color: #172b4d !important;
      }

      .navbar-nav .dropdown-menu {
        box-shadow: none;
        min-width: auto;
      }

      .navbar-nav .dropdown-menu .media svg {
        width: 30px;
      }

      .navbar-collapse {
        width: calc(100% - 1.4rem);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1050;
        margin: .7rem;
        overflow-y: auto;
        height: auto !important;
        opacity: 0;
      }

      .navbar-collapse .navbar-toggler {
        width: 20px;
        height: 20px;
        position: relative;
        cursor: pointer;
        display: inline-block;
        padding: 0;
      }

      .navbar-collapse .navbar-toggler span {
        display: block;
        position: absolute;
        width: 100%;
        height: 2px;
        border-radius: 2px;
        opacity: 1;
        background: #283448;
      }

      .navbar-collapse .navbar-toggler :nth-child(1) {
        transform: rotate(135deg);
      }

      .navbar-collapse .navbar-toggler :nth-child(2) {
        transform: rotate(-135deg);
      }

      .navbar-collapse .navbar-collapse-header {
        display: block;
        padding-bottom: 1rem;
        margin-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      }

      .navbar-collapse .collapse-brand img {
        height: 36px;
      }

      .navbar-collapse .collapse-close {
        text-align: right;
      }

      .navbar-collapse.collapsing,
      .navbar-collapse.show {
        padding: 1.5rem;
        border-radius: 0.25rem;
        background: #FFF;
        box-shadow: 0 50px 100px rgba(50, 50, 93, 0.1), 0 15px 35px rgba(50, 50, 93, 0.15), 0 5px 15px rgba(0, 0, 0, 0.1);
        animation: show-navbar-collapse .2s ease forwards;
      }

      .navbar-collapse.collapsing-out {
        animation: hide-navbar-collapse .2s ease forwards;
      }
    }

    @keyframes show-navbar-collapse {
      0% {
        opacity: 0;
        transform: scale(0.95);
        transform-origin: 100% 0;
      }

      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes hide-navbar-collapse {
      from {
        opacity: 1;
        transform: scale(1);
        transform-origin: 100% 0;
      }

      to {
        opacity: 0;
        transform: scale(0.95);
      }
    }

    @keyframes show-navbar-dropdown {
      0% {
        opacity: 0;
        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
        transition: visibility 0.25s, opacity 0.25s, transform 0.25s;
      }

      100% {
        transform: translate(0, 0);
        opacity: 1;
      }
    }

    @keyframes hide-navbar-dropdown {
      from {
        opacity: 1;
      }

      to {
        opacity: 0;
        transform: translate(0, 10px);
      }
    }

    .section-components>.navbar+.navbar,
    .section-components>.progress+.progress,
    .section-components>.progress+.btn,
    .section-components .badge,
    .section-components .btn {
      margin-top: .5rem;
      margin-bottom: .5rem;
    }

    .ct-navbar {
      background-color: #5e72e4;
      box-shadow: rgba(116, 129, 141, 0.1) 0px 1px 1px 0px;
      padding-top: .5rem;
      padding-bottom: .5rem;
    }

    @media (max-width: 991.98px) {
      .ct-navbar {
        padding-right: .5rem;
        padding-left: .5rem;
      }

      .ct-navbar .navbar-nav-scroll {
        max-width: 100%;
        height: 2.5rem;
        margin-top: .25rem;
        overflow: hidden;
        font-size: .875rem;
      }

      .ct-navbar .navbar-nav-scroll .navbar-nav {
        padding-bottom: 2rem;
        overflow-x: auto;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    }

    @media (min-width: 768px) {
      @supports (position: sticky) {
        .ct-navbar {
          position: sticky;
          top: 0;
          z-index: 1071;
        }
      }
    }

    .ct-navbar .navbar-nav .nav-link {
      padding-right: .5rem;
      padding-left: .5rem;
      color: rgba(255, 255, 255, 0.9) !important;
    }

    .ct-navbar .navbar-nav .nav-link.active,
    .ct-navbar .navbar-nav .nav-link:hover {
      color: #fff !important;
      background-color: transparent !important;
    }

    .ct-navbar .navbar-nav .nav-link.active {
      font-weight: 500;
    }

    .ct-navbar .navbar-nav-svg {
      display: inline-block;
      width: 1rem;
      height: 1rem;
      vertical-align: text-top;
    }

    .ct-navbar .dropdown-menu {
      font-size: .875rem;
    }

    .ct-navbar .dropdown-item.active {
      font-weight: 500;
      color: #212529;
      background-color: transparent;
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23292b2c' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: .4rem .87rem;
      background-size: .75rem .75rem;
      padding-left: 25px;
    }
  </style>
</head>

<body>

  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <div class="pull-lifte">

        <a class="navbar-brand mr-lg-5" href="/">
          <img src="{{ asset('assets3')}}/img/brand/white.png">
        </a>
      </div>

      <div class="pull-right">
        <a href="{{ route('login') }}" class=" h4 link text-white  btn-wd ">Se connecter</a>
      </div>
    </div>
  </nav>

  <div class="image-container set-full-height" style="background-image: url({{URL::asset('assets/img/luxury-working-room-in-executive-office.jpg') }} )">
    <div class="container ">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <!--      Wizard container        -->
          <div class="wizard-container">
            <div class="card wizard-card" data-color="purple" id="wizardProfile">
              <form role="form" method="post" action="{{ route('user.create') }}">
                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                @csrf
                <div class="wizard-header">
                  <h3 class="wizard-title">
                    Créer Votre Profile
                  </h3>
                  <!-- <h5>This information will let us know more about you.</h5> -->
                </div>
                <div class="wizard-navigation">
                  <ul>
                    <li><a href="#about" data-toggle="tab">About</a></li>
                    <li><a href="#account" data-toggle="tab">Compte</a></li>
                    <li><a href="#address" data-toggle="tab">Address</a></li>
                  </ul>
                </div>

                <div class="tab-content">
                  <div class="tab-pane" id="about">
                    <div class="row">
                      <h4 class="info-text"> Commençant Par les informations personnelles (avec validation)</h4>
                      <!-- <div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture">
		                                        	</div>
		                                        	<h6>Choose Picture</h6>
		                                    	</div>
		                                	</div> -->
                      <div class="col-sm-6 col-sm-offset-2">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">face</i>
                          </span>
                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} label-floating">
                            <label class="control-label">Votre Nom et Prénom <small>(obligatoire)</small></label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                          </div>
                        </div>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-sm-6 col-sm-offset-2">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">email</i>
                          </span>
                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} label-floating">
                            <label class="control-label">Email <small>(obligatoire)</small></label>
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" required>
                            <input class="" type="hidden" name="user" value="user">
                          </div>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-sm-6 col-sm-offset-2">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                          </span>
                          <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} label-floating">
                            <label class="control-label">Nouveau mot de passe<small>(obligatoire)</small></label>
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required>
                          </div>
                        </div>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-sm-6 col-sm-offset-2">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                          </span>
                          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} label-floating">
                            <label class="control-label">Confirmer mot de passe<small>(obligatoire)</small></label>
                            <input class="form-control" type="password" name="password_confirmation" required>
                          </div>
                        </div>
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="account">
                    <h4 class="info-text">Informations de l'établissment </h4>
                    <div class="row">
                      <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }} label-floating">
                          <label class="control-label">Téléphone travail</label>
                          <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Veuillez choisir la catégorie de votre entreprise</label>
                          <select name="categorie" class="form-control" required>
                            <option disabled="" selected=""></option>
                            <option value="Retailers"> Retailers </option>
                            <option value="Beauté et bien-être"> Beauté et bien-être </option>
                            <option value="Sports"> Sports </option>
                            <option value="Médical">Médical </option>
                            <option value="Rendez-vous personnels et services"> Rendez-vous personnels et services </option>
                            <option value="Education"> Education</option>
                            <option value="Evénements et divertissements"> Evénements et divertissements </option>
                            <option value="Officiel"> Officiel </option>
                            <option value="Supermarket"> Supermarket </option>
                            <option value="Retail Finance">Retail Finance </option>
                            <option value="Other retailers"> Other retailers </option>
                            <option value="Entraîneurs personnels">Entraîneurs personnels </option>
                            <option value="Gyms">Gyms</option>
                            <option value="Cours de fitness"> Cours de fitness </option>
                            <option value="Cours de yoga"> Cours de yoga </option>
                            <option value="Cours de golf"> Cours de golf </option>
                            <option value="Location de produits sportifs"> Location de produits sportifs </option>
                            <option value="Massage"> Massage </option>
                            <option value="Salons de beauté"> Salons de beauté </option>
                            <option value="Salons de coiffure">Salons de coiffure </option>
                            <option value="Salons de manucure"> Salons de manucure </option>
                            <option value="Extensions de cils"> Extensions de cils </option>
                            <option value="Spa"> Spa </option>
                            <option value="Cliniques et médecins"> Cliniques et médecins </option>
                            <option value="Dentistes"> Dentistes </option>
                            <option value="Ostéopathes"> Ostéopathes </option>
                            <option value="Acupuncture"> Acupuncture </option>
                            <option value="Physiologistes"> Physiologistes </option>
                            <option value="Psychologues"> Psychologues </option>
                            <option value="Rendez-vous personnels et services"> Rendez-vous personnels et services </option>
                            <option value="Conseil en affaires">Conseil en affaires </option>
                            <option value="Conseil"> Conseil </option>
                            <option value="Coaching"> Coaching </option>
                            <option value="Services spirituels">Services spirituels </option>
                            <option value="Consultants en design"> Consultants en design </option>
                            <option value="Nettoyage">Nettoyage </option>
                            <option value="Maison"> Maison </option>
                            <option value="Services pour les animaux"> Services pour les animaux </option>
                            <option value="...">...</option>
                          </select>
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Adresse de l’entreprise</label>
                          <input type="text" name="adresse" class="form-control" required>
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Titre de votre page de réservation (nom de l’entreprise, par exemple)</label>
                          <input type="text" name="titre" class="form-control" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="address">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4 class="info-text"> </h4>
                      </div>
                      <div class="col-sm-8 col-sm-offset-1 ">
                        <div class="form-group label-floating">
                          <label class="control-label"> Combien de services sont fournis par votre entreprise ?</label>
                          <input type="number" name="service" class="form-control" min="1" max="10" required>
                        </div>
                      </div>
                      <div class="col-sm-8 col-sm-offset-1 ">
                        <div class="form-group label-floating">
                          <label class="control-label">Login société (partie de l’URL, ne peut être modifié</label>
                          <input type="text" maxlength="8" onkeydown="if(event.keyCode==32) return false;" name="url" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-sm-8 col-sm-offset-1">
                        <div class="form-group label-floating">
                          <label class="control-label">Une brève description</label>
                          <textarea class="form-control" name="description" placeholder="" rows="4"></textarea required>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next1' value='Suivant' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd'  name='finish' value='Valider' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Précédant' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->
		<div class="footer">
	        <div class="container text-center">
	             &copy; {{ now()->year }} <a href="" class="font-weight-bold ml-1" target="_blank">HADDADA</a> &amp;
            <a href="" class="font-weight-bold ml-1" target="_blank">EL HEBABY</a>
	        </div>
	    </div>
	</div>


</body>

	<!--   Core JS Files   -->
    <script src="{{ asset('assets')}}/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="{{ asset('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ asset('assets')}}/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{ asset('assets')}}/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{ asset('assets')}}/js/jquery.validate.min.js"></script>

</html>