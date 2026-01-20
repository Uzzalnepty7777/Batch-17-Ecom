<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Dashboard</title>
    @include('admin.includes.style')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">
        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')
        <main class="app-main">
        @yield('content')
        </main>
        @include('admin.includes.footer')
    </div>
    @include('admin.includes.script')
</body>

</html>
