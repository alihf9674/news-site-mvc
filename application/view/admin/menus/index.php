<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i>Menus</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= $this->url('admin/menu/create') ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of menus</caption>
        <thead>
        <tr>
            <th>row</th>
            <th>name</th>
            <th>url</th>
            <th>parent ID</th>
            <th>setting</th>
        </tr>
        </thead>
        <?php $i = 1;
        foreach ($menus as $menu) { ?>
            <tbody>

            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $menu['name'] ?>
                </td>
                <td>
                    <?= $menu['url'] ?>
                </td>
                <td>
                    <?= $menu['parent_name'] == null ? 'منوی اصلی' : $menu['parent_name']?>
                </td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= $this->url('admin/menu/edit/'. $menu['id']) ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="<?= $this->url('admin/menu/delete/'. $menu['id']) ?>">delete</a>
                </td>
            </tr>
            </tbody>
        <?php } ?>
    </table>
</section>
<?php
$this->include('admin.layouts.footer');
?>
