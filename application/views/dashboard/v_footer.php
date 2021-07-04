<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-end">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-right  text-muted">
                &copy; 2021 <a href="" class="font-weight-bold ml-1">Ali Abdurohman</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url('assets'); ?>/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?= base_url('assets'); ?>/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= base_url('assets'); ?>/js/argon.js?v=1.2.0"></script>
<!-- DataTables -->
<script src="<?= base_url('assets'); ?>/vendor/datatables.net/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function() {

    $('#inputGroupFile02').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
});
</script>
</body>

<html>