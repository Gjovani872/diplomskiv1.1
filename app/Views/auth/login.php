<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login pagee</title>

    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
    <div class="container">

        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Sign in</h4>
                <hr>
                <form action="" method="post">

                    <div class="form-group">
                        <label for="">
                            Email
                        </label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    </div>

                    <div class="form-group">

                        <label for="">
                            Password
                        </label>
                        <input type="text" class="form-control" name="Password" placeholder="Enter your password">

                    </div>

                    <div class="form-group">
                        <buttton class="btn btn-primary btn-block" type="submit">
                            Sign in
                        </buttton>
                    </div>

                </form>

                <a href="<?= site_url('auth/register') ?>">Don't have an account? Register here!</a>

            </div>
        </div>

    </div>

</body>

</html>