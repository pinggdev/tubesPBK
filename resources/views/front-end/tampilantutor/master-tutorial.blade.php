@include('front-end.tampilantutor.header')

<body>
    <div id="app">
        @include('front-end.tampilantutor.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                
            </div>
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('ckeditor')
    <script src="{{ asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.js') }}"></script> --}}
    <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>

</html>