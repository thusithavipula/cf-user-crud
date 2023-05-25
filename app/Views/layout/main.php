<!DOCTYPE html>
<html lang="en">
<?= $this->include('layout/header') ?>

<!-- BEGIN Body -->

<body class="mod-bg-1 mod-nav-link ">

    <!-- BEGIN Page Wrapper -->
    <div class="page-wrapper">
        <div class="page-inner">

            <!-- BEGIN Left Aside -->
            <?= $this->include('layout/sidebar') ?>
            <!-- END Left Aside -->

            <div class="page-content-wrapper">

                <!-- BEGIN Page Header -->
                <?= $this->include('layout/nav_bar') ?>
                <!-- END Page Header -->

                <!-- BEGIN Page Content -->
                <main id="js-page-content" role="main" class="page-content">
                    <?= $this->renderSection('content') ?>
                </main>
                <!-- END Page Content -->

                <!-- BEGIN Page Footer -->
                <?= $this->include('layout/footer') ?>
                <!-- END Page Footer -->
            </div>

        </div>
    </div>
    <!-- END Page Wrapper -->

    <script src="<?= base_url('assets/js/vendors.bundle.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.bundle.js'); ?>"></script>

    <!-- jQuery-->
    <script src="<?= base_url('assets/jquery/jquery-3.6.0.min.js'); ?>"></script>

    <!-- DataTable JS-->
    <script src="<?= base_url('assets/datatable/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/datatable/js/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- BEGIN Page Scripts -->
    <?= $this->renderSection('scripts') ?>
    <!-- BEGIN Page Scripts -->


</body>
<!-- END Body -->

</html>