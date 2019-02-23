<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a id='sidebar-toggle' class="sidebar-toggle" @click.prevent="toggleSidebar" href="">
                    <i class="ti-menu"></i>
                </a>
            </li>
            <!--li class="search-box">
                <a class="search-toggle no-pdd-right" href="#">
                    <i class="search-icon ti-search pdd-right-10"></i>
                    <i class="search-icon-close ti-close pdd-right-10"></i>
                </a>
            </li>
            <li-- class="search-input">
                <input class="form-control" type="text" placeholder="Search...">
            </li-->
        </ul>
        <ul class="nav-right">
            
            <li>
                <a target="_blank" href="{{ asset('') }}">
                    Visit Site <i class="ti-new-window"></i>
                </a>
            </li>
            <li  :class="{ show: displayProfileHeaderMenu, 'dropdown' : true }">
                <a href="" @click.prevent="clickOnProfileHeaderLink" data-toggle="dropdown" 
                class="dropdown-toggle no-after peers fxw-nw ai-c lh-1">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="{{ auth()->user()->avatar }}" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-grey-900">
                            {{ Auth::guard('admin')->user()->full_name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li>
                        <a href="{{ route('admin.admin-user.detail') }}"
                            class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-settings mR-10"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('admin.logout') }}"
                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-power-off mR-10"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

