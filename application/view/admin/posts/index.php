<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class=" h5"><i class="fas fa-newspaper"></i> Articles</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="<?= $this->url('admin/post/create') ?>" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of posts</caption>
        <thead>
        <tr>
            <th>row</th>
            <th>title</th>
            <th>summary</th>
            <th>view</th>
            <th>status</th>
            <th>user</th>
            <th>category</th>
            <th>image</th>
            <th>setting</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($posts as $post) {

            ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $post['title'] ?>
                <td>
                    <?= html_entity_decode(mb_substr($post['summary'], 0, 10)) . "..." ?>
                </td>
                <td>
                    <?= $post['view'] ?>
                </td>
                <td>
                    <?= $post['breaking_news'] == 1 ? '<span class="badge badge-pill badge-success">#breaking_news</span>' : '' ?>
                    <?= $post['selected'] == 1 ? '<span class="badge badge-pill badge-secondary">#writer_selected</span>' : '' ?>
                </td>
                <td>
                    <?= $post['user_name'] ?>
                </td>
                <td>
                    <?= $post['category_name'] ?>
                </td>
                <td><img style="width: 80px;" src="<?= $this->asset($post['image']) ?>" alt="image post"></td>
                <td style="width: 25rem;">
                    <a role="button" class="btn btn-sm btn-outline-secondary text-black"
                       href="<?= $this->url('admin/post/breaking-news/' . $post['id']) ?>">
                        <?= $post['breaking_news'] == 1 ? "remove breaking news" : "add breaking news" ?>
                    </a>
                    <a role="button" class="btn btn-sm btn-outline-success text-black"
                       href="<?= $this->url('admin/post/selected/' . $post['id']) ?>">
                        <?= $post['selected'] == 1 ? "remove selcted" : "add selected" ?>
                    </a>
                    <hr class="my-1"/>
                    <a role="button" class="btn btn-sm btn-primary text-white active"
                       href="<?= $this->url('admin/post/edit/' . $post['id']) ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white active"
                       href="<?= $this->url('admin/post/delete/' . $post['id']) ?>">delete</a>
                </td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
<?php
$this->include('admin.layouts.footer');
?>