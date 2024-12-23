<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="An ecommerce platform offering a wide range of products with fast delivery, secure payment options, and 24/7 customer support.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Dexnovate" />
    <meta name="keywords" content="ecommerce, online shopping, fast delivery, secure payment, customer support">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/assetss/images/brand/favicon.ico">

    <!-- TITLE -->
    <title> {{ config('app.name') }} - @yield('head') </title>
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assetss/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="/assetss/css/style.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="/assetss/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="/assetss/css/icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css">
    <!-- INTERNAL Switcher css -->
    <link href="/assetss/switcher/css/switcher.css" rel="stylesheet">
    <link href="/assetss/switcher/demo.css" rel="stylesheet">
</head>

<body class="app sidebar-mini ltr light-mode">

    <!--{ Pre-loder start }-->
    <div id="global-loader">
        <img src="/assetss/images/loader.gif"  class="loader-img" alt="Loader">
    </div>
    <!--{ Pre-loder end }-->

    <!--{ Switcher Start }-->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="p-4 m-0 lh-1 border-bottom template-customizer-header position-relative py-3 d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="template-customizer-t-panel_header mb-2">Template Customizer</h3>
                    <p class="template-customizer-t-panel_sub_header mb-0">Customize and preview in real time</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="javascript:void(0)" onclick="localStorage.clear();
                    document.querySelector('html').style = '';
                    names() ;
                    resetData() ;" class="text-danger"><i class="fe fe-refresh-ccw fs-17 text-danger"></i></a>
                </div>
            </div>
            <div class="form_holder sidebar-right1 ps ps--active-y">
                <div class="row">
                    <div class="predefined_styles">
                        <div class="swichermainleft">
                            <h4> <i class="ti ti-layout-navbar"></i> Navigation Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex"> <span class="me-auto">Vertical Menu</span>
                                        <label class="switch switch-square">
                                            <input type="radio" name="onoffswitch15" id="myonoffswitch34" class="switch-input" checked>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizontal Click
                                            Menu</span>
                                        <label for="myonoffswitch35" class="switch switch-square">
                                            <input type="radio" name="onoffswitch15" id="myonoffswitch35" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizontal Hover
                                            Menu</span>
                                        <label for="myonoffswitch111" class="switch switch-square">
                                            <input type="radio" name="onoffswitch15" id="myonoffswitch111" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4> <i class="ti ti-directions"></i> LTR and RTL VERSIONS</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex"> <span class="me-auto">LTR Version</span>
                                        <label for="myonoffswitch23" class="switch switch-square">
                                            <input type="radio" name="onoffswitch7" id="myonoffswitch23" class="switch-input" checked="">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">RTL Version</span>
                                        <label for="myonoffswitch24" class="switch switch-square">
                                            <input type="radio" name="onoffswitch7" id="myonoffswitch24" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4> <i class="ti ti-color-swatch"></i> Light Theme Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex"> <span class="me-auto">Light Theme</span>
                                        <label for="myonoffswitch1" class="switch switch-square">
                                            <input type="radio" name="onoffswitch1" id="myonoffswitch1" class="switch-input" checked="">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex"> <span class="me-auto">Light Primary</span>
                                        <div class=""> <input class="w-30p h-30 input-color-picker color-primary-light" value="#0d9c1e" id="colorID" oninput="changePrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id7="transparentcolor" name="lightPrimary"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4> <i class="ti ti-moon-stars"></i> Dark Theme Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Theme</span>
                                        <label for="myonoffswitch2" class="switch switch-square">
                                            <input type="radio" name="onoffswitch1" id="myonoffswitch2" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Primary</span>
                                        <div class=""> <input class="w-30p h-30 input-dark-color-picker color-primary-dark" value="#0d9c1e" id="darkPrimaryColorID" oninput="darkPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Menu Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle lightMenu d-flex"> <span class="me-auto">Light Menu</span>
                                        <label for="myonoffswitch3" class="switch switch-square">
                                            <input type="radio" name="onoffswitch2" id="myonoffswitch3" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle colorMenu d-flex mt-2">
                                        <span class="me-auto">Color Menu</span>
                                        <label for="myonoffswitch4" class="switch switch-square">
                                            <input type="radio" name="onoffswitch2" id="myonoffswitch4" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle darkMenu d-flex mt-2">
                                        <span class="me-auto">Dark Menu</span>
                                        <label for="myonoffswitch5" class="switch switch-square">
                                            <input type="radio" name="onoffswitch2" id="myonoffswitch5" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4> <i class="ti ti-brush"></i> Header Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle lightHeader d-flex">
                                        <span class="me-auto">Light Header</span>
                                        <label for="myonoffswitch6" class="switch switch-square">
                                            <input type="radio" name="onoffswitch3" id="myonoffswitch6" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle  colorHeader d-flex mt-2">
                                        <span class="me-auto">Color Header</span>
                                        <label for="myonoffswitch7" class="switch switch-square">
                                            <input type="radio" name="onoffswitch3" id="myonoffswitch7" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle darkHeader d-flex mt-2">
                                        <span class="me-auto">Dark Header</span>
                                        <label for="myonoffswitch8" class="switch switch-square">
                                            <input type="radio" name="onoffswitch3" id="myonoffswitch8" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swichermainleft">
                            <h4> <i class="ti ti-adjustments-horizontal"></i> Layout Positions</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Fixed</span>
                                        <label for="myonoffswitch11" class="switch switch-square">
                                            <input type="radio" name="onoffswitch5" id="myonoffswitch11" class="switch-input" checked="">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Scrollable</span>
                                        <label for="myonoffswitch12" class="switch switch-square">
                                            <input type="radio" name="onoffswitch5" id="myonoffswitch12" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft leftmenu-styles">
                            <h4> <i class="ti ti-layout-sidebar"></i> Sidemenu layout Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Default Menu</span>
                                        <label for="myonoffswitch13" class="switch switch-square">
                                            <input type="radio" name="onoffswitch6" id="myonoffswitch13" class="switch-input default-menu" checked="">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Icon with Text</span>
                                        <label for="myonoffswitch14" class="switch switch-square">
                                            <input type="radio" name="onoffswitch6" id="myonoffswitch14" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Icon Overlay</span>
                                        <label for="myonoffswitch15" class="switch switch-square">
                                            <input type="radio" name="onoffswitch6" id="myonoffswitch15" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Closed Sidemenu</span>
                                        <label for="myonoffswitch16" class="switch switch-square">
                                            <input type="radio" name="onoffswitch6" id="myonoffswitch16" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Hover Submenu</span>
                                        <label for="myonoffswitch17" class="switch switch-square">
                                            <input type="radio" name="onoffswitch6" id="myonoffswitch17" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Double Menu Style </span>
                                        <label for="doublemenu-switch" class="switch switch-square">
                                            <input type="radio" name="onoffswitch6" id="doublemenu-switch" class="switch-input">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--{ Switcher End }-->
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!--{ app header start }-->
            @include('layouts.app-header')
            <!--{ app header end }-->

            <!--{ app sidebar start }-->
            @include('layouts.sidebar')
            <!--{ app sidebar end }-->

            <!--{ app content start }-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!--{ container start }-->
                    <div class="main-container container-fluid">
                       @yield('content')
                    </div>
                    <!--{ container end }-->
                </div>
            </div>
            <!--{ app content end }-->
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    <div>Copyright © <span id="year"></span> <a href="javascript:void(0)">{{ config('app.name') }}</a>. All rights reserved.</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--{ JQUERY JS }-->
    <script src="/assetss/js/jquery.min.js"></script>
    <!--{ BOOTSTRAP JS }-->
    <script src="/assetss/js/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/assetss/js/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--{ Sticky js }-->
    <script src="/assetss/js/sticky.js"></script>
    <!--{ SIDEBAR JS }-->
    <script src="/assetss/js/plugins/sidebar/sidebar.js"></script>
    <!--{ INTERNAL CHARTJS CHART JS }-->
    <script src="/assetss/js/plugins/chart/Chart.bundle.js"></script>
    <script src="/assetss/js/plugins/chart/utils.js"></script>
    <!--{  INTERNAL Data tables js }-->
    <script src="/assetss/js/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="/assetss/js/plugins/datatable/dataTables.bootstrap5.min.js"></script>
    <!--{ INTERNAL APEXCHART JS }-->
    <script src="/assetss/js/apexcharts.js"></script>
    <!--{ SIDE-MENU JS }-->
    <script src="/assetss/js/plugins/sidemenu/sidemenu.js"></script>
    <!--{ INTERNAL INDEX JS }-->
    <script src="/assetss/js/index1.js"></script>
    <!--{ Color Theme js }-->
    <script src="/assetss/js/themeColors.js"></script>
    <!--{ CUSTOM JS }-->
    <script src="/assetss/js/custom.js"></script>
    <!--{ Custom-switcher }-->
    <script src="/assetss/js/custom-swicher.js"></script>
    <!--{ Switcher js }-->
    <script src="/assetss/switcher/js/switcher.js"></script>
    @include('layouts.message')
</body>
</html>
