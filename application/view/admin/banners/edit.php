<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Edit Banner</h1>
</section>
<section class="row my-3">
    <section class="col-12">

        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." value="">
            </div>

            <div class="form-group">
                <img style="width: 100px;" src="" alt="">
                <hr/>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>
    </section>
<?php
$this->include('admin.layouts.footer');
?>
