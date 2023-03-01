<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create User</h1>
</section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="<?= $this->url('admin/user/store') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter title ..." value="">
            </div>

            <div class="form-group">
                <label for="user_call">Phone number</label>
                <input type="number" class="form-control" id="user_call" name="user_call" placeholder="Enter title ..." value="">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter title ..." value="">
            </div>

            <div class="form-group">
                <label for="permission">permission</label>
                <select name="permission" id="permission" class="form-control" required autofocus>
                    <option value="user" >User</option>
                    <option value="admin" >Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>

    </section>
<?php
$this->include('admin.layouts.footer');
?>
