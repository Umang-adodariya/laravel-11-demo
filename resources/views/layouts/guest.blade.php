<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template">
    <head>
        @include('layouts.admin.head')
    </head>
    <body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="{{route('login')}}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                </span>
                                <span class="app-brand-text demo text-body fw-bold ms-1">Admin Login</span>
                            </a>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
