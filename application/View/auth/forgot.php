<?php
$this->include('auth.layouts.head-tag');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>فراموشی رمز عبور</title>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= $this->asset('public/auth/assets/images/img-01.png') ?>" alt="IMG">
            </div>
            <form method="post" action="<?= url('forgot/request') ?>" class="login100-form validate-form">
                    <span class="login100-form-title">
                        فراموشی رمز
                    </span>
                <?php
                $failedMessage = flash('error');
                if (!empty($failedMessage)) {
                    echo failedMessage($failedMessage);
                }
                ?>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label>
                        <input class="input100" type="text" name="user_email" placeholder="ایمیل">
                    </label>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        ارسال
                    </button>
                </div>
                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        ساخت حساب کاربری
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