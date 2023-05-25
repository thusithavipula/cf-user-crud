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

    <script src="assets/js/vendors.bundle.js"></script>
    <script src="assets/js/app.bundle.js"></script>
</body>
<!-- END Body -->

</html>