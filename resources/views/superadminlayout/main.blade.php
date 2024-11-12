<!DOCTYPE html>
<html land="en">

@include('superadminpartials.header')

<body>
    <div class="wrapper">
        @include('superadminpartials.sidebar')

        <div class="main">
            @include('superadminpartials.topbar')
            <main class="content">
                @yield('content')
            </main>

            @include('superadminpartials.footer')
        </div>
    </div>

        @include('superadminpartials.scripts')
</body>
</html>
