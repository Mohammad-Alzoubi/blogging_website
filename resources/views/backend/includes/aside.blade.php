<aside  class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-dark bg-dark navbar-vertical-aside-initialized">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('backend.index')}}" aria-label="Front">
                <img class="navbar-brand-logo" width="50" src="https://blog.lavishride.com/assets_new/img/lavishride_logo_black.png" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" width="50" src="https://blog.lavishride.com/assets_new/img/lavishride_logo_black.png" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="https://blog.lavishride.com/assets_new/img/lavishride_logo_black.png" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="https://blog.lavishride.com/assets_new/img/lavishride_logo_black.png" alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title=""></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title=""></i>
            </button>
            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <!-- Dashboards    -->
                    <div class="nav-item ">
                        <a class="nav-link {{setActive('backend.index')}}" href="{{route('backend.index')}}" >
                            <i class="bi-house-door nav-icon"></i>
                            <span class="nav-link-title">Dashboards</span>
                        </a>
                    </div>
                    <!-- End Dashboards -->

                    <!-- Start Users -->
                    @if(auth()->user()->can('user.menu'))
                    <span class="dropdown-header mt-4">Administration</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <div class="navbar-nav nav-compact"></div>
                    <div id="navbarVerticalMenuPagesMenu">
                        <!-- Users -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="true" aria-controls="navbarVerticalMenuPagesUsersMenu">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">Users</span>
                            </a>

                            <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse {{setActive('backend.user.index')=='active' || setActive('backend.user.create')=='active'?'show':''}}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link {{setActive('backend.user.index')}}" href="{{route('backend.user.index')}}">All Users</a>
                                <a class="nav-link {{setActive('backend.user.create')}}" href="{{route('backend.user.create')}}">Create User</a>
                            </div>
                        </div>
                        @endif
                        <!-- End Users -->

                        <!-- Start posts -->
                        @if(auth()->user()->can('post.menu'))
                        <span class="dropdown-header mt-4">Posts</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                        <!-- news article -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesEcommerceMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                <i class="bi bi-newspaper nav-icon"></i>
                                <span class="nav-link-title">Articles</span>
                            </a>
                            <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu">
                                @if(auth()->user()->can('post.all'))
                                <a class="nav-link {{setActive('backend.post.index')}}" href="{{route('backend.post.index')}}">All Posts</a>
                                @endif
                                @if(auth()->user()->can('post.create'))
                                <a class="nav-link {{setActive('backend.post.create')}}" href="{{route('backend.post.create')}}">Create Post </a>
                                @endif
                            </div>
                        </div>
                        @endif
                        <!-- End posts -->
                    </div>



                    @if(auth()->user()->can('roles.menu'))
                    <span class="dropdown-header mt-4">Roles And Permission</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <!-- Roles And Permission -->
                    <div class="nav-item">
                        <div class="nav-item">
                            <a class="nav-link {{setActive('backend.permission.index')}}" href="{{ route('backend.permission.index') }}" data-placement="left">
                                <i class="bi-shield-lock nav-icon"></i>
                                <span class="nav-link-title">All Permission</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link {{setActive('backend.index.roles')}}" href="{{ route('backend.index.roles') }}" data-placement="left">
                                <i class="bi-shield-lock nav-icon"></i>
                                <span class="nav-link-title">All Roles</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link {{setActive('backend.add.roles.permission')}}" href="{{ route('backend.add.roles.permission') }}" data-placement="left">
                                <i class="bi-shield-lock nav-icon"></i>
                                <span class="nav-link-title">Roles in Permission</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link {{setActive('backend.index.roles.permission')}}" href="{{ route('backend.index.roles.permission') }}" data-placement="left">
                                <i class="bi-shield-lock nav-icon"></i>
                                <span class="nav-link-title">All Roles in Permission</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Roles And Permission -->
                    @endif
{{--==============================================================--}}
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- End Navbar Vertical -->
