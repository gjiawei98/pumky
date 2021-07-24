<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>     
        <title>
            PUMKY STORE
        </title>
        <meta name="description" content="Analytics Dashboard">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/allExtra.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/notifications/sweetalert2/sweetalert2.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/notifications/toastr/toastr.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/datagrid/datatables/datatables.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/page-invoice.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css.map') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css.map') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/statistics/chartjs/chartjs.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/fa-solid.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/statistics/chartjs/chartjs.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/skins/skin-master.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/select2/select2.bundle.css.map') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="https://www.gotbootstrap.com/themes/smartadmin/4.5.1/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://www.gotbootstrap.com/themes/smartadmin/4.5.1/img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="https://www.gotbootstrap.com/themes/smartadmin/4.5.1/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/dropzone/dropzone.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/summernote/summernote.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/summernote/summernote.css.map') }}">
        
        <!-- New ADD FROM JW-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css"/>
        
        @if(Session::get('color_theme'))
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/themes/cust-theme-'.Session::get('color_theme').'.css') }}">
        @endif
    
        <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
    
    </head>    
    <body class="mod-bg-1 mod-nav-link desktop chrome webkit pace-done blur">
        <div class="pace  pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("%c✔ Heads up! Theme settings is empty or does not exist, loading default settings...", "color: #ed1c24");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);

            }
            else if (themeSettings.themeURL && document.getElementById('mytheme'))
            {
                document.getElementById('mytheme').href = themeSettings.themeURL;
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|footer|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    @include('estore_layouts.sidebar')
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    @include('estore_layouts.header')
                    <!-- END Page Header -->

                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        @yield('content')
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    @include('estore_layouts.footer')
                    <!-- END Page Footer -->

                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->
                    <p id="js-color-profile" class="d-none">
                        <span class="color-primary-50"></span>
                        <span class="color-primary-100"></span>
                        <span class="color-primary-200"></span>
                        <span class="color-primary-300"></span>
                        <span class="color-primary-400"></span>
                        <span class="color-primary-500"></span>
                        <span class="color-primary-600"></span>
                        <span class="color-primary-700"></span>
                        <span class="color-primary-800"></span>
                        <span class="color-primary-900"></span>
                        <span class="color-info-50"></span>
                        <span class="color-info-100"></span>
                        <span class="color-info-200"></span>
                        <span class="color-info-300"></span>
                        <span class="color-info-400"></span>
                        <span class="color-info-500"></span>
                        <span class="color-info-600"></span>
                        <span class="color-info-700"></span>
                        <span class="color-info-800"></span>
                        <span class="color-info-900"></span>
                        <span class="color-danger-50"></span>
                        <span class="color-danger-100"></span>
                        <span class="color-danger-200"></span>
                        <span class="color-danger-300"></span>
                        <span class="color-danger-400"></span>
                        <span class="color-danger-500"></span>
                        <span class="color-danger-600"></span>
                        <span class="color-danger-700"></span>
                        <span class="color-danger-800"></span>
                        <span class="color-danger-900"></span>
                        <span class="color-warning-50"></span>
                        <span class="color-warning-100"></span>
                        <span class="color-warning-200"></span>
                        <span class="color-warning-300"></span>
                        <span class="color-warning-400"></span>
                        <span class="color-warning-500"></span>
                        <span class="color-warning-600"></span>
                        <span class="color-warning-700"></span>
                        <span class="color-warning-800"></span>
                        <span class="color-warning-900"></span>
                        <span class="color-success-50"></span>
                        <span class="color-success-100"></span>
                        <span class="color-success-200"></span>
                        <span class="color-success-300"></span>
                        <span class="color-success-400"></span>
                        <span class="color-success-500"></span>
                        <span class="color-success-600"></span>
                        <span class="color-success-700"></span>
                        <span class="color-success-800"></span>
                        <span class="color-success-900"></span>
                        <span class="color-fusion-50"></span>
                        <span class="color-fusion-100"></span>
                        <span class="color-fusion-200"></span>
                        <span class="color-fusion-300"></span>
                        <span class="color-fusion-400"></span>
                        <span class="color-fusion-500"></span>
                        <span class="color-fusion-600"></span>
                        <span class="color-fusion-700"></span>
                        <span class="color-fusion-800"></span>
                        <span class="color-fusion-900"></span>
                    </p>
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
        @include('estore_layouts.menu')
        <!-- END Quick Menu -->
        <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-141754477-1', 'auto');
            ga('send', 'pageview');

        </script>

        <script type="text/javascript">
            /* Activate smart panels */
            // $('#js-page-content').smartPanel();
        </script>
        <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->
        <script src="{{ asset('js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('js/app.bundle.js') }}"></script>
        <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('js/notifications/sweetalert2/sweetalert2.bundle.js') }}"></script>
        <script src="{{ asset('js/notifications/toastr/toastr.js') }}"></script>
        <script src="{{ asset('js/datagrid/datatables/datatables.export.js') }}"></script>
        <script src="{{ asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
        <script src="{{ asset('js/formplugins/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
        <script src="{{ asset('js/formplugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('js/formplugins/bootstrap-colorpicker/bootstrap-colorpicker.js') }}"></script>
        <script src="{{ asset('js/statistics/chartjs/chartjs.bundle.js') }}"></script>

        <script src="{{ asset('js/datetime-moment.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/multiselect.min.js') }}"></script>
        <script src="{{ asset('js/xlsx.full.min.js') }}"></script>
        <script src="{{ asset('dist/inputmask.js') }}"></script>
        <script src="{{ asset('dist/inputmask.min.js') }}"></script>
        <script src="{{ asset('dist/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('dist/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('js/formplugins/dropzone/dropzone.js') }}"></script>
        <script src="{{ asset('js/formplugins/summernote/summernote.js') }}"></script>
        <script src="{{ asset('js/statistics/chartjs/chartjs.bundle.js') }}"></script>
        <script src="{{ asset('js/statistics/flot/flot.bundle.js') }}"></script>
        
        <script src="{{ asset('js/analytics.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('js/formplugins/select2/select2.bundle.js') }}"></script>
        <script>
            $(document).ready(function()
            {
                //$('#js-page-content').smartPanel(); 

                /*calendar */
                var todayDate = moment().startOf('day');
                var YM = todayDate.format('YYYY-MM');   
                var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                var TODAY = todayDate.format('YYYY-MM-DD');
                var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
                var year = todayDate.format('Y');
            });

            @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            @endif


            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
            @endif


            @if(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}");
            @endif


            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif

            $.validator.addClassRules("autocomplete_sku", {
            required: true,
            });

            $.validator.addClassRules("qty", {
                required: true,
                noDecimal: true,
                number: true,
            });

            $.validator.addClassRules("amount", {
                required: true,
                number: true,
                currency: true,
            });
            $.validator.addClassRules("amount_disc", {
                number: true,
                currency: true,
            });

            $.validator.addClassRules("prod_d_cost_qty", {
                required: true,
                number: true,
            });
            $.validator.addClassRules("acc_no", {
                required: true,
                number: true,
            });

            $.validator.addMethod('allowBonus', function (value, el, param) {
                return value >= param;
            }, "Not Allow Bonus");

            $.validator.addMethod("noDecimal", function(value, element) {
                return !(value % 1);
            }, "No decimal numbers");

            $.validator.addMethod("mobile_number", function (value, element) {
                return this.optional(element) || /^(01)[0-9]{8,9}$/.test(value);
            }, "Please insert correct mobile number");

            $.validator.addMethod("stockqty", function (value, element, params) {
                return this.optional(element) || value <= $(element).data('current_qty');
            }, "Stock is Insufficient");

            $.validator.addMethod('lessThanEqual', function(value, element, param) {
                if (this.optional(element)) return true;
                var i = parseInt(value);
                var j = parseInt($(param).val());
                return i <= j;
            }, "The deposit amount can't less than minimum deposit amount!");

            var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }
        </script>
        @stack('scripts')
    <!-- END Body -->

<div class="jqvmap-label" style="display: none;"></div></body></html>