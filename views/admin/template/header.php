<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title><?= $title ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//cdn.ckeditor.com/4.6.0/standard/ckeditor.js"></script>
        <script src="<?= BASEPATH ?>assets/js/plugins/sha1.js" type="text/javascript"></script>
        <script src="<?= BASEPATH ?>assets/js/login-js.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="#">CMS</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= BASEPATH ?>admin">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= BASEPATH ?>admin/blogcreate">Create Blog</a></li>
                                <li><a href="<?= BASEPATH ?>admin/bloglist">Edit Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="padding-top: 40px;">
