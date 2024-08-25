<div>
   <!-- Sidenav Menu -->
   <div class="app-menu">

    <!-- Sidenav Brand Logo -->
    <a href="/dashboard" class="logo-box">
        <!-- Light Brand Logo -->
        <div class="logo-light">
            <img src="{{ url('assets/images/logo-light.png') }}" class="logo-lg h-6" alt="Light logo">
            <img src="{{ url('assets/images/logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>

        <!-- Dark Brand Logo -->
        <div class="logo-dark">
            <img src="{{ url('assets/images/logo-dark.png') }}" class="logo-lg h-6" alt="Dark logo">
            <img src="{{ url('assets/images/logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="mgc_round_line text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="srcollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_home_3_line"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-title">Apps</li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_folder_2_line"></i></span>
                    <span class="menu-text"> My Porfolio </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('portfolio') }}" class="menu-link">
                            <span class="menu-text">Bonds</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_bank_line"></i></span>
                    <span class="menu-text"> Administrator </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('bonds') }}" class="menu-link">
                            <span class="menu-text">Bonds</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('calendar') }}" class="menu-link">
                            <span class="menu-text">Bond Calender</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_user_2_line"></i></span>
                    <span class="menu-text"> My Account </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('settings') }}" class="menu-link">
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="{{ route('logout') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_exit_line"></i></span>
                    <span class="menu-text"> Log Out </span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
