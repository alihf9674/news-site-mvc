<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
 ?>
 <section class="pt-3 pb-1 mb-2 border-bottom">
  <h1 class="h5">Create category</h1>
</section>
<section class="row my-3">
  <section class="col-12">
    <form method="post" action="<?= $this->url('admin/category/store') ?>">
      <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ...">
      </div>
      <button type="submit" class="btn btn-primary btn-sm">store</button>
    </form>
  </section>
</section>
  </main>
  </div></div>
<?php
$this->include('admin.layouts.footer');
?>