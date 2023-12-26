<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dealer Sign Up</title>

    <link rel="stylesheet" href="/DealerAssets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="/DealerAssets/css/style2.css">
</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Dealer Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="contactNo"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="contactNo" id="contactNo" placeholder="Contact Number" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Repeat your password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit"
                                    value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/DealerAssets/img/dealerregister.jpg"
                                style="height: 400px; width: 300px; object-fit: cover; transform: translate3d(0, 0, 1px);">
                        </figure>
                        <a href="/DealerLogin" class="signup-image-link">Already have an account</a>
                    </div>
                </div>
            </div>
        </section>
        <script src="/DealerAssets/js/jquery.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>
