<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visit Anderson</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <br><br>
                <img src="images/visitanderson_logo.png" style="width: 100%;">
                <div class="">
                    <!-- error message -->
                    <?php if (isset($_GET['error']) == 1): ?>
                        <div class="alert alert-danger">Wrong userid or password</div>
                    <?php endif; ?>

                    <!-- login form -->
                    <form class="form-horizontal" method="post" action="process_login.php">
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 col-md-3 col-lg-3 control-label dark-grey">
                                Username
                            </label>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <input name="username" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-md-3 col-lg-3 control-label dark-grey">
                                Password
                            </label>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-md-offset-3 col-md-offset-3 col-sm-9 col-md-9 col-lg-9">
                                <button type="submit" class="btn btn-green"><i class="fa fa-sign-in"></i> Sign in</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- well -->
            </div>
        </div> <!-- row -->
    </div>
</body>
</html>
