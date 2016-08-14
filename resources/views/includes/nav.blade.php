<!-- resources/views/includes/nav.blade.php -->

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand page-scroll" href="{{ url('/') }}">
                <img src="{{ URL::asset('assets/img/CUER_logo_black.png') }}" alt="CUER" height="26">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            
            @yield('nav_content')
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('invitem')}}">Inventory Items</a></li>
                <li><a href="{{ url('invtype')}}">Inventory Types</a></li>
                <li><a href="{{ url('invlist')}}">Inventory Lists</a></li>
                <li><a href="{{ url('task')}}">Task List</a></li>
                <li><a href="{{ url('test')}}">Testing</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
