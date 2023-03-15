<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Comments</h1>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of comments</caption>
            <thead>
            <tr>
                <th>row</th>
                <th>user ID</th>
                <th>post ID</th>
                <th>comment</th>
                <th>status</th>
                <th>setting</th>
            </tr>
            </thead>
            <?php
            $i = 1;
            foreach ($comments as $comment) { ?>
                <tbody>
                <tr>
                    <td><?= $i ?>
                    </td>
                    <td>
                        <?= $comment['user_call'] ?>
                    </td>
                    <td>
                        <?= $comment['post_title'] ?>
                    </td>
                    <td>
                        <?= $comment['comment'] ?>
                    </td>
                    <td>
                        <?= $comment['status'] ?>
                    </td>
                    <td>
                        <a role="button" class="btn btn-sm btn btn-outline-success" href="">approved</a>
                        <a role="button" class="btn btn-sm btn btn-outline-info" href="">show</a>
                        <a role="button" class="btn btn-sm btn-outline-danger" href="">not be approved</a>
                    </td>
                </tr>
                </tbody>
                <?php $i++;
            } ?>
        </table>
    </section>
<?php

?>