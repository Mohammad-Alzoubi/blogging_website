<!-- ========== HEADER ========== bg-white -->
<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered ">
    <div class="navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="{{route('backend.index')}}" aria-label="Front">
            <img class="navbar-brand-logo" src="https://blog.lavishride.com/assets_new/img/lavishride_original_logo.png" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo" src="https://blog.lavishride.com/assets_new/img/lavishride_original_logo.png" alt="Logo" data-hs-theme-appearance="dark">
            <img class="navbar-brand-logo-mini" src="https://blog.lavishride.com/assets_new/img/lavishride_original_logo.png" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo-mini" src="https://blog.lavishride.com/assets_new/img/lavishride_original_logo.png" alt="Logo" data-hs-theme-appearance="dark">
        </a>
        <!-- End Logo -->

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->
        </div>

        <div class="navbar-nav-wrap-content-end">
            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <!-- Notification -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <i class="bi-bell"></i>
                            <span class="btn-status btn-sm-status btn-status-success"></span>
                        </button>
                    </div>
                    <!-- End Notification -->
                </li>


                <li class="nav-item">
                    <!-- Account -->
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img" src="{{asset('backend/assets/img/160x160/img1.jpg')}}" alt="Image Description">
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="{{asset('backend/assets/img/160x160/img1.jpg')}}" alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">{{auth()->user()->name}}</h5>
                                        <p class="card-text text-body">{{auth()->user()->email}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{route('backend.user.profile')}}">My profile</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Sign out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                        </div>
                    </div>
                    <!-- End Account -->
                </li>
            </ul>
            <!-- End Navbar -->
        </div>
    </div>
</header>
<!-- ========== END HEADER ========== -->
