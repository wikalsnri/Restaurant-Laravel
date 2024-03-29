<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Register ~ Klassy Cafe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css" />

    <!-- STYLE CSS -->
</head>
<style>
    @font-face {
        font-family: "ChelseaMarket-Regular";
        src: url("../fonts/chelsea_market/ChelseaMarket-Regular.ttf");
    }

    @font-face {
        font-family: "Muli-Regular";
        src: url("../fonts/muli/Muli-Regular.ttf");
    }

    @font-face {
        font-family: "Muli-SemiBold";
        src: url("../fonts/muli/Muli-SemiBold.ttf");
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: "Muli-Regular";
        font-size: 15px;
        margin: 0;
        color: #fff;
    }

    input,
    textarea,
    select,
    button {
        font-family: "Muli-SemiBold";
    }

    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    ul {
        margin: 0;
    }

    img {
        max-width: 100%;
    }

    ul {
        padding-left: 0;
        margin-bottom: 0;
    }

    a {
        text-decoration: none;
    }

    :focus {
        outline: none;
    }

    .wrapper {
        min-height: 100vh;
        display: flex;
    }

    .wrapper .image-holder {
        width: 69.9%;
    }

    .wrapper .form-inner {
        width: 30.1%;
    }

    .image-holder {
        background: url("login/bg-register.png") no-repeat;
        background-size: cover;
    }

    .image-holder img {
        display: none;
    }

    .form-inner {
        background: #ff97a4;
        padding-top: 16.36vh;
        padding-left: 4vw;
        padding-right: 4vw;
    }

    form {
        width: 100%;
    }

    .form-header {
        text-align: center;
        margin-bottom: 39px;
    }

    h3 {
        text-transform: uppercase;
        font-size: 40px;
        font-family: "ChelseaMarket-Regular";
    }

    label {
        margin-bottom: 11px;
        display: block;
    }

    .form-group {
        margin-bottom: 26px;
        position: relative;
    }

    .form-control {
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 5px;
        display: block;
        width: 100%;
        height: 45px;
        background: none;
        padding: 0 19px;
        color: #fff;
        font-size: 17px;
    }

    .form-control.error {
        border-color: #fd677a !important;
        background: url("../images/error.png") no-repeat center right 19px;
    }

    .form-control.valid {
        background: url("../images/valid.png") no-repeat center right 19px;
    }

    .form-error {
        margin-top: 10px;
        display: inline-block;
    }

    button {
        border: none;
        width: 100%;
        height: 46px;
        border-radius: 22.5px;
        margin: auto;
        margin-top: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        background: #fff;
        color: #ff97a4;
        text-transform: uppercase;
        font-size: 17px;
        overflow: hidden;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        position: relative;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }

    button:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: #fd677a;
        -webkit-transform: scaleX(0);
        transform: scaleX(0);
        -webkit-transform-origin: 50%;
        transform-origin: 50%;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }

    button:hover {
        color: white;
    }

    button:hover:before {
        -webkit-transform: scaleX(1);
        transform: scaleX(1);
    }

    .socials {
        text-align: center;
        margin-top: 59px;
    }

    .socials-icon {
        display: inline-flex;
        width: 41px;
        height: 41px;
        border-radius: 50%;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.5);
        font-size: 19px;
        color: #fff;
        transition: all 0.5s ease;
        margin-right: 19px;
    }

    .socials-icon:hover {
        background: #fff;
        border: 1px solid transparent;
        color: #ff97a4;
    }

    .socials-icon:last-child {
        margin-right: 0;
    }

    p {
        font-family: "Muli-SemiBold";
        color: #ffff66;
        margin-bottom: 22px;
    }

    @media (max-width: 1500px) {
        .form-inner {
            display: flex;
            align-items: center;
            padding-top: 0;
            padding-left: 4vw;
            padding-right: 4vw;
        }
    }

    @media (max-width: 1199px) {
        .wrapper {
            flex-direction: column;
        }

        .wrapper .image-holder {
            width: 100%;
            height: 45vh;
        }

        .wrapper .form-inner {
            width: 100%;
            height: 55vh;
        }

        .form-inner {
            padding-left: 20vw;
            padding-right: 20vw;
        }

        button {
            width: 50%;
        }
    }

    @media (max-width: 991px) {
        .wrapper .image-holder {
            height: 37vh;
        }

        .wrapper .form-inner {
            height: 63vh;
        }

        .socials {
            margin-top: 40px;
        }

        .form-header {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 767px) {
        .wrapper .form-inner {
            height: auto;
        }

        .wrapper .image-holder {
            height: auto;
        }

        .image-holder img {
            display: block;
        }

        .form-inner {
            padding: 30px 20px;
        }

        button {
            width: 100%;
        }
    }

    /*# sourceMappingURL=style.css.map */
</style>

<body>
    <div class="wrapper">
        <div class="image-holder">
            <img src="images/registration-form-8.jpg" alt="" />
        </div>
        <div class="form-inner">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-header">
                    <h3>Sign Up</h3>
                    <img src="images/sign-up.png" alt="" class="sign-up-icon" />
                </div>
                <div class="form-group">
                    <label for="">Nama :</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">E-mail :</label>
                    <input name="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password :</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <x-label for="password_confirmation" value="{{ __('Konfirmasi Password :') }}" />
                    <x-input id="password_confirmation" class="form-control" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>
                <button>create my account</button>

            </form>
        </div>
    </div>


</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
