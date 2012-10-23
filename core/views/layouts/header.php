<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $metaData['meta-title'];?> &middot; Jay Rainey</title>
  <script type="text/javascript" src="//use.typekit.net/fxh5jpu.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <script src="<?php echo URL;?>public/js/pack.js"></script>
  <meta name="author" content="Jay Rainey" />
  <meta name="description" content="<?php echo $metaData['meta-title'];?> - Jay Rainey" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="<?php echo URL;?>public/css/style.css" />
</head>
<body onload="prettyPrint()">
<div class="wrapper">
  <header role="banner">
    <div id="logo"><a href="<?php echo URL;?>">Jay Rainey</a></div>
    <nav role="navigation">
      <ul>
        <li<?php if ( !empty ( $metaData['home-active'] ) ) { echo ' class="active"'; }?>><a href="<?php echo URL ?>" id="orange">Home</a></li>
        <li<?php if ( !empty ( $metaData['about-active'] ) ) { echo ' class="active"'; }?>><a href="<?php echo URL . 'about/'?>" id="green">About</a></li>
        <li<?php if ( !empty ( $metaData['blog-active'] ) ) { echo ' class="active"'; }?>><a href="<?php echo URL . 'blog/'?>" id="blue">Blog</a></li>   
        <li<?php if ( !empty ( $metaData['projects-active'] ) ) { echo ' class="active"'; }?>><a href="<?php echo URL . 'projects/'?>" id="purple">Projects</a></li>
      </ul>
    </nav>
  </header>
  <div id="main" role="main">
    <section>
