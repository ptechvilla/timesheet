<<<<<<< HEAD
<?php
require_once('function/function.php');
 

$resp = "";
if (isset($_POST['login_me'])) {

    $resp = user_login();
}

?>
<!doctype html>
<html lang="en">

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="main.cba69814a806ecc7945a.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">

                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome to Login page</div>
                                            <?= $resp; ?>
                                        </h4>
                                    </div>
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="pass" id="examplePassword" placeholder="Password here..." type="password" class="form-control"></div>
                                            </div>
                                        </div>


                                        <div class="divider"></div>

                                </div>
                                <div class="modal-footer clearfix">

                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg" name="login_me">Login to Dashboard</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/scripts/main.cba69814a806ecc7945a.js"></script>
</body>

=======
<?php
require_once('function/function.php');
 

$resp = "";
if (isset($_POST['login_me'])) {

    $resp = user_login();
}

?>
<!doctype html>
<html lang="en">

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="main.cba69814a806ecc7945a.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">

                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome to Login page</div>
                                            <?= $resp; ?>
                                        </h4>
                                    </div>
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group"><input name="pass" id="examplePassword" placeholder="Password here..." type="password" class="form-control"></div>
                                            </div>
                                        </div>


                                        <div class="divider"></div>

                                </div>
                                <div class="modal-footer clearfix">

                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg" name="login_me">Login to Dashboard</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/scripts/main.cba69814a806ecc7945a.js"></script>
</body>

>>>>>>> 7de9070ae9da8f15180d6f3ba53496805b9029de
</html>