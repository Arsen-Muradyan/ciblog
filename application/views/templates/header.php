<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uri = $this->uri->uri_string();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.css">
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
	<title>Document</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">CiBlog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
     <?php if ($this->session->userdata('logged_in')): ?>
        <li class="nav-item <?php if ($uri == 'dashboard') echo 'active'; ?>">
          <a class="nav-link" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item <?php if ($uri == 'posts/create') echo 'active'; ?>">
          <a class="nav-link" href="/posts/create">New Posts</a>
        </li>
     <?php endif; ?>
      <li class="nav-item <?php if ($uri == 'posts') echo 'active'; ?>">
        <a class="nav-link" href="/posts">Posts</a>
      </li>
    </ul>
    <?php if ($this->session->userdata('logged_in')): ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if ($uri == 'users/logout') echo 'active'; ?>">
            <a class="nav-link" href="/users/logout">Logout</a>
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if ($uri == 'users/login') echo 'active'; ?>">
            <a class="nav-link" href="/users/login">Login</a>
          </li>
          <li class="nav-item <?php if ($uri == 'users/register') echo 'active'; ?>">
            <a class="nav-link" href="/users/register">Register</a>
          </li>
        </ul>
     <?php endif; ?>
  </div>
</nav>