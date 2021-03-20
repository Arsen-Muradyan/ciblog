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
      <li class="nav-item <?php if ($uri == 'posts') echo 'active'; ?>">
        <a class="nav-link" href="/posts">Posts</a>
      </li>
      <li class="nav-item <?php if ($uri == 'posts/create') echo 'active'; ?>">
        <a class="nav-link" href="/posts/create">New Post</a>
      </li>
    </ul>
  </div>
</nav>