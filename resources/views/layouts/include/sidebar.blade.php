<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a title="Landing Page" href="#" aria-expanded="false"><span class=" fa fa-home" aria-hidden="true"></span> <span class="mini-click-non">Home</span></a>
                            <a title="Landing Page" href="#" aria-expanded="false"><span class="fa fa-address-card" aria-hidden="true"></span> <span class="mini-click-non">All User</span></a>
                            <a title="Landing Page" href="#" aria-expanded="false"><span class="fa fa-bell-slash" aria-hidden="true"></span> <span class="mini-click-non">Add Country</span></a>
                            <a title="Landing Page" href="#" aria-expanded="false"><span class="fa fa-book" aria-hidden="true"></span> <span class="mini-click-non">Block Blogs</span></a>
                            <a title="Landing Page" href="{{ route('testing')}}" aria-expanded="false"><span class="fa fa-book" aria-hidden="true"></span> <span class="mini-click-non">Testing</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </nav>
    </div>