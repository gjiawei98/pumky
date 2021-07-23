<div class="page-logo">
    <a href="./Analytics Dashboard - Application Intel - SmartAdmin v4.5.1_files/intel_analytics_dashboard.html" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
        <img src="{{ asset('img/logo.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo">
        <span class="page-logo-text mr-1">Pumky Store</span>
        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
    </a>
</div>
<!-- BEGIN PRIMARY NAVIGATION -->
<nav id="js-primary-nav" class="primary-nav js-list-filter" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="./Analytics Dashboard - Application Intel - SmartAdmin v4.5.1_files/intel_analytics_dashboard.html" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="info-card">
        <img src="{{ asset('img/avatar-admin.png') }}" class="profile-image rounded-circle" alt="{{Auth::user()->name??""}}">
        <div class="info-card-text">
            <a href="./Analytics Dashboard - Application Intel - SmartAdmin v4.5.1_files/intel_analytics_dashboard.html" class="d-flex align-items-center text-white">
                <span class="text-truncate text-truncate-sm d-inline-block">
                    {{Auth::user()->name??""}}
                </span>
            </a>
            <span class="d-inline-block text-truncate text-truncate-sm">Malaysia</span>
        </div>
        <img src="{{ asset('img/card-backgrounds/cover-1-lg.png') }}" class="cover" alt="cover">
        <a href="javascript:void(0)" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
            <i class="fal fa-angle-down"></i>
        </a>
    </div>
    <ul id="js-nav-menu" class="nav-menu js-nav-built">
        <!-- <li class="active open"> -->
        <li>
            <a href="{{route('home')}}" title="Home" data-filter-tags="Home" aria-expanded="true" class=" waves-effect waves-themed">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Home</span>
            <b class="collapse-sign"></b></a>
            <a href="{{route('sales.index')}}" title="Sale List" data-filter-tags="sales list" aria-expanded="true" class=" waves-effect waves-themed">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Sales List</span>
            <b class="collapse-sign"></b></a>
            <a href="{{route('category.index')}}" title="Cateogry List" data-filter-tags="category list" aria-expanded="true" class=" waves-effect waves-themed">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Category List</span>
            <b class="collapse-sign"></b></a>
            <a href="{{route('product.index')}}" title="Product List" data-filter-tags="product list" aria-expanded="true" class=" waves-effect waves-themed">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Product List</span>
            <b class="collapse-sign"></b></a>
            <a href="{{route('merchant.index')}}" title="Merchant List" data-filter-tags="merchant list" aria-expanded="true" class=" waves-effect waves-themed">
                <i class="fas fa-user"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Merchant List</span>
            <b class="collapse-sign"></b></a>
        </li>
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
<!-- END PRIMARY NAVIGATION -->