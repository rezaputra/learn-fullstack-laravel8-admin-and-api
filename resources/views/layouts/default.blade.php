<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>

        @stack('before-style')
        @include('includes.style')
        @stack('after-style')

    </head>
    <body class="sb-nav-fixed">

        @include('includes.navbar')

        <div id="layoutSidenav">

            @include('includes.sidebar')

            <div id="layoutSidenav_content">

                <main>

                    @yield('content')

                </main>

                @include('includes.footer')

            </div>
        </div>

        @stack('before-script')
        @include('includes.script')
        @stack('after-script')

    </body>
</html>
