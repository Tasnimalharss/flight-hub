    @include('layouts.header')
    <div class="page">
        @auth
        @include('layouts.sidebar')
        <div class="page-wrapper">
            @include('layouts.navbar')
            @endauth

            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">Flight Hub</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <p> v1.0.0</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('layouts.footer')

