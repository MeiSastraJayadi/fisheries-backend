<!DOCTYPE html>

<html lang="en">
    <head>
        @yield('header')

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="/plugins/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

        <link rel="stylesheet" href="/plugins/adminlte/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="/plugins/adminlte/plugins/summernote/summernote-bs4.min.css">

        <script nonce="e5f5615e-7b13-48f6-8c06-6f44ce727af4">(function(w,d){!function(bt,bu,bv,bw){bt[bv]=bt[bv]||{};bt[bv].executed=[];bt.zaraz={deferred:[],listeners:[]};bt.zaraz.q=[];bt.zaraz._f=function(bx){return function(){var by=Array.prototype.slice.call(arguments);bt.zaraz.q.push({m:bx,a:by})}};for(const bz of["track","set","debug"])bt.zaraz[bz]=bt.zaraz._f(bz);bt.zaraz.init=()=>{var bA=bu.getElementsByTagName(bw)[0],bB=bu.createElement(bw),bC=bu.getElementsByTagName("title")[0];bC&&(bt[bv].t=bu.getElementsByTagName("title")[0].text);bt[bv].x=Math.random();bt[bv].w=bt.screen.width;bt[bv].h=bt.screen.height;bt[bv].j=bt.innerHeight;bt[bv].e=bt.innerWidth;bt[bv].l=bt.location.href;bt[bv].r=bu.referrer;bt[bv].k=bt.screen.colorDepth;bt[bv].n=bu.characterSet;bt[bv].o=(new Date).getTimezoneOffset();if(bt.dataLayer)for(const bG of Object.entries(Object.entries(dataLayer).reduce(((bH,bI)=>({...bH[1],...bI[1]})),{})))zaraz.set(bG[0],bG[1],{scope:"page"});bt[bv].q=[];for(;bt.zaraz.q.length;){const bJ=bt.zaraz.q.shift();bt[bv].q.push(bJ)}bB.defer=!0;for(const bK of[localStorage,sessionStorage])Object.keys(bK||{}).filter((bM=>bM.startsWith("_zaraz_"))).forEach((bL=>{try{bt[bv]["z_"+bL.slice(7)]=JSON.parse(bK.getItem(bL))}catch{bt[bv]["z_"+bL.slice(7)]=bK.getItem(bL)}}));bB.referrerPolicy="origin";bB.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bt[bv])));bA.parentNode.insertBefore(bB,bA)};["complete","interactive"].includes(bu.readyState)?zaraz.init():bt.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="/plugins/adminlte/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <style>
            .sidebar-dark-primary > .nav-item > .nav-link.active {
                background-color: #999;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="return confirm('Yakin ingin logout')" class="nav-link">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('assets/fisheries.png') }}" class="brand-image elevation-3" style="opacity: .8; border-radius: 1vmin;">
                    <span class="brand-text font-weight-light">Fisheries</span>
                </a>

                <div class="sidebar">

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a style="color: #fff;" href="{{ route('home') }}" class="nav-link {{ str_contains(Request::path(), 'user') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="color: #fff;" href="{{ route('machine') }}" class="nav-link {{ str_contains(Request::path(), 'machine') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Machine
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="color: #fff;" href="{{ route('machine-logs') }}" class="nav-link {{ str_contains(Request::path(), 'logs') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Machine Logs
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper mt-3">
                @yield('content')
            </div>


            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>


            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    Fisheries
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>

        <script src="/plugins/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="/plugins/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/plugins/adminlte/dist/js/adminlte.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        @yield('script')
    </body>
</html>
