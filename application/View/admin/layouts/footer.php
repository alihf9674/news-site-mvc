</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="//cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
<script src="<?= $this->url('public/admin-panel/js/bootstrap.min.js') ?>"></script>
<script src="<?= $this->url('public/admin-panel/js/mdb.min.js') ?>"></script>
<script src="<?= $this->url('public/admin-panel/jalalidatepicker/persian-date.min.js') ?>"></script>
<script src="<?= $this->url('public/admin-panel/jalalidatepicker/persian-datepicker.min.js') ?>"></script>
<script type="module" src="<?= $this->url('/public/ckeditor/ckeditor.js') ?>"></script>

<script>
    $(document).ready(function () {
        CKEDITOR.replace('summary');
        CKEDITOR.replace('body');

        $("#published_at_view").pDatepicker({
            initialValue: false,
            format: 'YYYY-MM-DD HH:mm:ss',

            toolbox: {
                calendarSwitch: {
                    enabled: true
                }
            },
            observer: true,
            altField: '#published_at',
        })
    });

</body>

</html>