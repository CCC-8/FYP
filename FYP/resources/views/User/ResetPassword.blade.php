<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Google Poppins Font CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Variables */
        :root {
            --primary-font-family: 'Poppins', sans-serif;
            --light-white: #f5f8fa;
            --gray: #5e6278;
            --gray-1: #e3e3e3;
        }

        body {
            font-family: var(--primary-font-family);
            font-size: 14px;
        }

        /* Main CSS OTP Verification New Changing */
        .wrapper {
            padding: 0 0 100px;
            background-position: bottom center;
            background-repeat: no-repeat;
            background-size: contain;
            background-attachment: fixed;
            min-height: 100%;

            /* height:100vh;

        }

        .wrapper .logo img {
            max-width: 40%;
        }

        .wrapper input {
            background-color: var(--light-white);
            border-color: var(--light-white);
            color: var(--gray);
        }

        .wrapper input:focus {
            box-shadow: none;
        }

        .wrapper .password-info {
            font-size: 10px;
        }

        .wrapper .submit_btn {
            padding: 10px 15px;
            font-weight: 500;
        }

        .wrapper .login_with {
            padding: 8px 15px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.3s ease-in-out;
        }

        .wrapper .submit_btn:focus,
        .wrapper .login_with:focus {
            box-shadow: none;
        }

        .wrapper .login_with:hover {
            background-color: var(--gray-1);
            border-color: var(--gray-1);
        }

        .wrapper .login_with img {
            max-width: 7%;
        }

        /* OTP Verification CSS */
            .wrapper .otp_input input {
                width: 14%;
                height: 70px;
                text-align: center;
                font-size: 20px;
                font-weight: 600;
            }

            @media (max-width:1200px) {
                .wrapper .otp_input input {
                    height: 50px;
                }
            }

            @media (max-width:767px) {
                .wrapper .otp_input input {
                    height: 40px;
                }
            }
    </style>
</head>

<body>
    <section class="wrapper">
        <div class="container" style="margin-top: 5%">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <form class="rounded bg-white shadow p-5" method="POST" action="/ResetPassword">
                    @csrf
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Forget Password ?</h3>

                    <div class="fw-normal text-muted mb-4">
                        Enter your email to reset your password.
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <label for="floatingInput">New Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password"
                            name="confirm_password">
                        <label for="floatingInput">Confirm New Password</label>
                    </div>

                    <button type="submit" class="btn btn-primary submit_btn my-4">Submit</button>
                    <button type="submit" class="btn btn-secondary submit_btn my-4 ms-3">Cancel</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
