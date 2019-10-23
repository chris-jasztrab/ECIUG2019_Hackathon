<?php
  ob_start(); // output buffering is turned on
  session_start(); // turn on sessions
  include('functions.php');
  include('config.php');
  setApiAccessToken();
  $errors = [];

  ?>
