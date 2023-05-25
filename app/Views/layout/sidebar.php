<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#">
            <span class="page-logo-text mr-1">CF User CRUD App</span>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <ul id="js-nav-menu" class="nav-menu">
            <li class="active open">
                <a href="#" title="Form Stuff" data-filter-tags="form stuff">
                    <i class="fal fa-user"></i>
                    <span class="nav-link-text" data-i18n="nav.form_stuff">Users</span>
                </a>
                <ul>
                    <li class="<?= (current_url() == base_url('index.php/user') || current_url() == base_url('index.php/') ) ? 'active' : ''; ?>">
                        <a href="<?= route_to('user'); ?>" title="User Data">
                            <span class="nav-link-text">User Data</span>
                        </a>
                    </li>
                    <li class="<?= (current_url() == base_url('index.php/user/add')) ? 'active' : ''; ?>">
                        <a href="<?= route_to('user.add'); ?>"  title="Add Users">
                            <span class="nav-link-text">Add Users</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
</aside>