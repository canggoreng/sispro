<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <script>
    var navbarStyle = window.config.config.phoenixNavbarStyle;
    if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
    }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <center>
                <div class="">
                    <!-- <div class="avatar avatar-1 "> -->
                    <img class="rounded-circle " width="75" src="{{$user->getfoto()}}" alt="">
                </div>
                <h6 class="mt-2 text-black">{{auth()->user()->name}}</h6>
                <h6 class="mt-2 text-black">Role : <font color="blue">{{auth()->user()->role}}</font>
                </h6>
            </center>

            <!-- ------------------------ -->
            <hr />
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-home"
                            role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="home"></span></span>
                                <span class="nav-link-text">Dashboard</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                                <li class="collapsed-nav-item-title d-none">Dashboard</li>
                                @if(request()->is('dashboard')?'active':'')
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{url('/dashboard')}}" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">
                                                <strong>Dashboard</strong>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/dashboard')}}" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Dashboard</span>
                                        </div>
                                    </a>
                                </li>

                                @endif                                
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- ------------------------ -->
                    <hr />
                    <!-- label-->
                    <p class="navbar-vertical-label">Module Apps</p>
                    <hr class="navbar-vertical-line"><!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-CRM"
                            role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-CRM">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="phone"></span></span><span
                                    class="nav-link-text">CRM</span><span
                                    class="fa-solid fa-circle text-info ms-1 new-page-indicator"
                                    style="font-size: 6px"></span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-CRM">
                                <li class="collapsed-nav-item-title d-none">CRM</li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/analytics.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Analytics</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/deals.html" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Deals</span><span
                                                class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/deal-details.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Deal
                                                details</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/leads.html" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Leads</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/lead-details.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Lead
                                                details</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/reports.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Reports</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/reports-details.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Reports
                                                details</span><span
                                                class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/crm/add-contact.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Add
                                                contact</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </div>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper"><a class="nav-link label-1" href="../apps/chat.html" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="message-square"></span></span><span
                                    class="nav-link-text-wrapper"><span class="nav-link-text">Chat</span></span>
                            </div>
                        </a></div><!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-email"
                            role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-email">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="mail"></span></span><span
                                    class="nav-link-text">Email</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-email">
                                <li class="collapsed-nav-item-title d-none">Email</li>
                                <li class="nav-item"><a class="nav-link" href="../apps/email/inbox.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Inbox</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/email/email-detail.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Email
                                                detail</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="../apps/email/compose.html"
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Compose</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </div>
                    </div><!-- parent pages-->

                    <hr />
                    <!-- ------------------------ -->
                    <p class="navbar-vertical-label">Module Settings & Master</p>

                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-setting"
                            role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-setting">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="settings"></span></span><span
                                    class="nav-link-text">Settings</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-setting">
                                <!-- <li class="collapsed-nav-item-title d-none">Setting
                                    Users</li> -->
                                @if(request()->is('users')?'active':'')
                                <li class="nav-item"><a class="nav-link active" href="{{url('/users')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">
                                                <strong><i class="far fa-user-circle"></i>
                                                        Users</strong>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item"><a class="nav-link" href="{{url('/users')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text"><i
                                                    class="far fa-user-circle"></i> Users</span>
                                        </div>
                                    </a>
                                </li>
                                @endif

                                @if(request()->is('password')?'active':'')
                                <li class="nav-item"><a class="nav-link active" href="{{url('/password')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text"><strong><i class="fas fa-key"></i>
                                                        Password</strong>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item"><a class="nav-link" href="{{url('/password')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text"><i
                                                    class="fas fa-key"></i> Password</span>
                                        </div>
                                    </a>
                                </li>
                                @endif

                                @if(request()->is('profile')?'active':'')
                                <li class="nav-item"><a class="nav-link active" href="{{url('/profile')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text"><strong><i class="fas fa-id-card-alt"></i>
                                                        Profile</strong>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item"><a class="nav-link" href="{{url('/profile')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text"><i
                                                    class="fas fa-id-card-alt"></i> Profile</span>
                                        </div>
                                    </a>
                                </li>
                                @endif


                            </ul>
                        </div>
                    </div>

                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-master_unit"
                            role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-master_unit">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="database"></span></span><span
                                    class="nav-link-text">Master</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-master_unit">
                                @if(request()->is('master_unit')?'active':'')
                                <li class="nav-item"><a class="nav-link active" href="{{url('/master_unit')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text"><strong><i class="fab fa-buffer"></i>
                                                        Master Unit</strong>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item"><a class="nav-link" href="{{url('/master_unit')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text"><i
                                                    class="fab fa-buffer"></i> Master Unit</span>
                                        </div>
                                    </a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>

                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-logs"
                            role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-logs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="refresh-ccw"></span></span><span
                                    class="nav-link-text">Logs</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-logs">
                                @if(request()->is('logs')?'active':'')
                                <li class="nav-item"><a class="nav-link active" href="{{url('/logs')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text"><strong><i class="fas fa-history"></i>
                                                        Log In/Out</strong>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item"><a class="nav-link" href="{{url('/logs')}}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text"><i
                                                    class="fas fa-history"></i> Log In/Out</span>
                                        </div>
                                    </a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>                    

                </li>
            </ul>
            <hr/>
        </div>
    </div>
    <!-- <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span
                class="navbar-vertical-footer-text ms-2">Collapsed View</span>
        </button>
    </div> -->
    <div class="navbar-vertical-footer">
        <button class="btn logout">
            <i class="fa-solid fa-door-open"></i>
            <span class="logout">Log Out</span>
        </button>
    </div>
</nav>