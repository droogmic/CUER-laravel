<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
    
<head>
    
    @include('includes.header')
    
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
    @include('includes.nav')
    
    <div class="scrolling-padding"></div>

    @yield('content')

    @include('includes.footer')
    
</body>

</html>