<?php
$this->include('auth.layouts.head-tag');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ثبت نام</title>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= $this->asset('public/auth/assets/images/img-01.png') ?>" alt="IMG">
            </div>

            <form method="post" action="<?= $this->url('register/store') ?>" class="login100-form validate-form">
                    <span class="login100-form-title">
                        ثبت نام
                    </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="username" placeholder="نام کاربری">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="user_email" placeholder="ایمیل">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="رمز">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="confirm_password" placeholder="تکرار رمز">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        ثبت نام
                    </button>
                </div>
                <div class="text-center p-t-12">
                        <span class="txt1">
                            فراموشی
                        </span>
                    <a class="txt3" href="#">
                        رمز عبور یا نام کاربری
                    </a>
                </div>
                <div class="text-center p-t-136">
                    <a class="txt2" href="<?= url('login') ?>">
                        Login your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$this->include('auth.layouts.scripts');
?>
</body>
</html>