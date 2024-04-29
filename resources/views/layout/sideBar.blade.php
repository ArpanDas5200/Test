<div id="sidebar" class="app-sidebar">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item">
                <a href="{{ url('/dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('logout') }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
                    <span class="menu-text">LogOut</span>
                </a>
            </div>
        </div>
    </div>

</div>
