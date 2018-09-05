<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <?php $path = \Illuminate\Support\Facades\Request::getPathInfo();

                ?>
                @if ($auth->can('admin-dashboard'))

                        <li class="sidebar-item {{($path==='/admin/dashboard')?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                @endif
                    @if ($auth->can('users.index'))

                        <li class="sidebar-item {{ \App\SystemFile::getActiveClass('admin.user.list',true) }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.index') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Users</span></a></li>



                    @endif
                    <li class="sidebar-item {{ \App\SystemFile::getActiveClass('admin.roles.list',true) }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('roles.index') }}" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Roles</span></a></li>
                    <li class="sidebar-item {{ \App\SystemFile::getActiveClass('admin.pages.list',true) }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pages.index') }}" aria-expanded="false"><i class="mdi mdi-google-pages"></i><span class="hide-menu">Pages</span></a></li>



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
