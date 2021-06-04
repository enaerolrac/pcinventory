<?php defined("BASEPATH") or exit("No direct script access allowed"); ?>

</body>
</html>
<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/moment.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/sweetalert/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/scripts/product/product.js'); ?>"></script>

<script>
    var site_url = "<?php echo site_url();?>";


        if (<?php echo $this->session->flashdata("response") ? $this->session->flashdata("response") : 0; ?>) {
            alert("<?php echo $this->session->flashdata('message') ?>");

        }
</script>




