<?php
$this->include('admin.layouts.header');
$this->include('admin.layouts.sidebar');
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h1 class="h5 "><i class="fas fa-newspaper "></i> Comments</h1>
        <div class="btn-toolbar mb-2 mb-md-0 ">
            <a role="button " href="# " class="btn btn-sm btn-success disabled ">create</a>
        </div>
    </div>
    <section class="table-responsive ">
        <table class="table table-striped table-sm ">
            <caption>List of comments</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>user ID</th>
                <th>post ID</th>
                <th>comment</th>
                <th>status</th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href=" ">1</a>
                </td>
                <td>
                    ss
                </td>
                <td>
                    ss
                </td>
                <td>
                    ss
                </td>
                <td>
                    ss
                </td>
                <td>
                    <a role="button " class="btn btn-sm btn-success text-white " href=" ">click to approved</a>
                    <a role="button " class="btn btn-sm btn-warning text-white " href=" ">click not to approved</a>
                </td>
            </tr>
            </tbody>
        </table>
    </section>
<?php

?>