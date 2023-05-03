<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= $this->url('admin/user/create') ?>"
           class="btn btn-sm btn-success">create</a>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of users</caption>
        <thead>
        <tr>
            <th>row</th>
            <th>full name</th>
            <th>email</th>
            <th>password</th>
            <th>permission</th>
            <th>created at</th>
            <th>setting</th>
        </tr>
        </thead>
        <?php $i = 1;
        foreach ($users as $user) {
            ?>
            <tbody>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['user_email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['permission'] ?></td>
                <td><?= convertToJalaliDate($user['created_at']) ?></td>
                <td>
                    <?php if ($user['permission'] == 'user') { ?>
                        <a role="button" class="btn btn-sm btn-outline-warning"
                           href="<?= $this->url('admin/user/change-permission/' . $user['id']) ?>">click to be admin</a>
                    <?php } else { ?>
                        <a role="button" class="btn btn-sm btn-light text-black"
                           href="<?= $this->url('admin/user/change-permission/' . $user['id']) ?>">click not to be
                            user</a>
                    <?php } ?>
                    <a role="button" class="btn btn-sm btn-primary text-white"
                       href="<?= $this->url('admin/user/edit/' . $user['id']) ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white"
                       href="<?= $this->url('admin/user/delete/' . $user['id']) ?>"">delete</a>
                </td>
            </tr>
            </tbody>
            <?php $i++;
        } ?>
    </table>
</section>

<?php
$this->include('admin.layouts.footer');
?>
