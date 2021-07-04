<!-- Footer -->
<footer class="py-5" id="footer-main">
    <div class="container">
        <div class="row align-items-center justify-content-xl-end">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-right text-muted">
                    &copy; 2021 <a href="" class="font-weight-bold ml-1">Ali
                        Abdurohman</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url('assets'); ?>/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="<?= base_url('assets'); ?>/js/argon.js?v=1.2.0"></script>
<script>
$('#inputGroupFile02').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$(function() {
    $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
});
</script>
</body>

</html>
