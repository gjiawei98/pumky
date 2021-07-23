<nav class="shortcut-menu d-none d-sm-block">
    <input type="checkbox" class="menu-open" name="menu-open" id="menu_open">
    <label for="menu_open" class="menu-open-button ">
        <span class="app-shortcut-icon d-block"></span>
    </label>
    <a href="javascript:void(0)" class="menu-item btn waves-effect waves-themed" data-toggle="tooltip" data-placement="left" title="" data-original-title="Scroll Top">
        <i class="fal fa-arrow-up"></i>
    </a>
    <form method="POST" id="logoutForm" action="{{ route('logout') }}" class="menu-item btn waves-effect waves-themed" data-toggle="tooltip" data-placement="left" title="" data-original-title="Logout">
        @csrf
        <a href="#" class="menu-item btn waves-effect waves-themed" data-toggle="tooltip" data-placement="left" title="" data-original-title="Logout" onclick="document.getElementById('logoutForm').submit();"><i class="fal fa-sign-out"></i></a>
    </form>
   
    <a href="./Analytics Dashboard - Application Intel - SmartAdmin v4.5.1_files/intel_analytics_dashboard.html" class="menu-item btn waves-effect waves-themed" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="" data-original-title="Full Screen">
        <i class="fal fa-expand"></i>
    </a>
    <a href="./Analytics Dashboard - Application Intel - SmartAdmin v4.5.1_files/intel_analytics_dashboard.html" class="menu-item btn waves-effect waves-themed" data-action="app-print" data-toggle="tooltip" data-placement="left" title="" data-original-title="Print page">
        <i class="fal fa-print"></i>
    </a>
    <a href="./Analytics Dashboard - Application Intel - SmartAdmin v4.5.1_files/intel_analytics_dashboard.html" class="menu-item btn waves-effect waves-themed" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="" data-original-title="Voice command">
        <i class="fal fa-microphone"></i>
    </a>
</nav>