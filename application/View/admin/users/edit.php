<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create User</h1>
    <?php
    $message = flash('error');
    if (!empty($message)) {
        echo failedMessage($message);
    }
    ?>
</section>
<section class="row my-3">
    <section class="col-12">
        <form method="post" action="<?= $this->url('admin/user/update/' . $user['id']) ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
            </div>
            <div class="form-group">
                <label for="user_call">Email</label>
                <input type="text" class="form-control" id="user_email" name="user_email" value="<?= $user['user_email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'] ?>">
            </div>
            <div class="form-group">
                <label for="permission">permission</label>
                <select name="permission" id="permission" class="form-control" required autofocus>
                    <option value="user" <?php if($user['permission'] == 'user') echo 'selected'; ?>>user</option>
                    <option value="admin" <?php if($user['permission'] == 'admin') echo 'selected'; ?>>admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>
    </section>
    <?php
    $this->include('admin.layouts.footer');
    ?>

