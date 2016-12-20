<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= BASEPATH ?>assets/js/plugins/sha1.js" type="text/javascript"></script>
        <script src="<?= BASEPATH ?>assets/js/login-js.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">

                <h1 class="page-header">Login page</h1>

                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Login
                        </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <form action="<?= BASEPATH ?>auth/processlogin" class="form-horizontal" method="POST" onsubmit="return encrypt()">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" autocomplete="false" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input id="password" type="password" autocomplete="false" name="password" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-link btn-block btn-lg" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php 
        if($this->get('status')=='error'){
            echo '<script>alert("login failed!")</script>';
        }
        ?>
    </body>
</html>
