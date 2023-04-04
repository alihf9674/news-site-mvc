<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h2">Show Comment</h1>
</section>
<section class="row my-3">
    <section class="col-12">
        <h1 class="h4 border-bottom"><?= $comment['username'] ?></h1>
        <p class="text-dark border-bottom"><?= $comment['comment'] ?></p>
        <p class="text-dark border-bottom"><?= $comment['post_titles'] ?></p>
        <p class="text-dark border-bottom"><?= $comment['user_call'] ?></p>
        <p class="text-dark border-bottom"><?= $comment['status'] ?></p>
        <p class="text-dark border-bottom"><?= convertToJalaliDate($comment['created_at']) ?></p>
        <?php if ($comment['status'] == 'approved') { ?>
            <a role="button" class="btn btn-sm btn-outline-danger text-white" href="<?= $this->url('admin/comment/change-status/' . $comment['id']) ?>">click not to approved</a>
        <?php } else { ?>
            <a role="button" class="btn btn-sm btn-outline-success text-white" href="<?= $this->url('admin/comment/change-status/' . $comment['id']) ?>">click to approved</a>
        <?php } ?>
    </section>
</section>
<?php
$this->include('admin.layouts.footer');
?>
