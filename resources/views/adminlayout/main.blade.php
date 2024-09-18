<!DOCTYPE html>
<html land="en">

@include('adminpartials.header')

<body>
    <div class="wrapper">
        @include('adminpartials.sidebar')

        <div class="main">
            @include('adminpartials.topbar')
            <main class="content">
                @yield('content')
            </main>

            @include('adminpartials.footer')
        </div>
    </div>

        @include('adminpartials.scripts')
</body>
</html>
