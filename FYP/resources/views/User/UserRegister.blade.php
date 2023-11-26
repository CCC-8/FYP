<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #B0BEC5;
            background-repeat: no-repeat;
        }

        .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px;
        }

        .card2 {
            margin: 0px 40px;
        }

        .logo {
            width: 200px;
            height: 100px;
            margin-top: 20px;
            margin-left: 35px;
        }

        .image {
            width: 450px;
            height: 500px;
            object-fit: cover;
        }

        .border-line {
            border-right: 1px solid #EEEEEE;
        }

        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px;
        }

        .or {
            width: 10%;
            font-weight: bold;
        }

        .text-sm {
            font-size: 14px !important;
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300
        }

        :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0;
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0;
        }

        a {
            color: inherit;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #F06543 !important;
            width: 150px;
            color: #fff !important;
            border-radius: 2px;
        }

        .btn-blue:hover {
            background-color: #000 !important;
            cursor: pointer;
        }

        .bg-blue {
            color: #fff;
            background-color: #F06543;
        }

        @media screen and (max-width: 991px) {
            .logo {
                margin-left: 0px;
            }

            .image {
                width: 300px;
                height: 220px;
            }

            .border-line {
                border-right: none;
            }

            .card2 {
                border-top: 1px solid #EEEEEE !important;
                margin: 0px 15px;
            }
        }
    </style>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="bg-blue py-4"></div>
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pt-5 pb-5">
                        <div class="row px-3 justify-content-center mt-5 mb-5 border-line">
                            <img src="/assets/img/register.jpg" class="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <h1 class="mb-5">Register</h1>
                        <form method="POST" action="/UserRegister">
                            @csrf
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Name</h6>
                                </label>
                                <input class="mb-4" type="text" name="name" placeholder="Enter your name"
                                    required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label>
                                <input class="mb-4" type="text" name="email"
                                    placeholder="Enter a valid email address" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Contact Number</h6>
                                </label>
                                <input class="mb-4" type="text" name="contactNo"
                                    placeholder="Enter a valid contact number" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input class="mb-4" type="password" name="password" placeholder="Enter password"
                                    required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Confirm Password</h6>
                                </label>
                                <input class="mb-4" type="password" name="confirm_password"
                                    placeholder="Confirm password" required>
                            </div>
                            <div class="row mb-3 px-3">
                                <button type="submit" class="btn btn-blue text-center px-5">Login</button>
                            </div>
                            <div class="row mb-3 px-3">
                                <small class="font-weight-bold">Already have an account?
                                    <a class="text-danger" href="/UserLogin">Login</a>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4"></div>
        </div>
    </div>
</body>

</html>
