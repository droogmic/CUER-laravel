<!-- resources/views/welcome.blade.php -->

<!-- resources/views/layouts/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Intro Section -->
    <section id="intro" class="even-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>CUER System</h1>
                    <p><strong>Usage Instructions: </strong>Select a list from the dropdown.</p>
                    <a class="btn btn-default page-scroll" href="#about">About</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="odd-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>About Section</h1>
                    <p>This is a CUER system for managing inventory. It was developed by Michael Drooglever (md635).</p>
                    <a href="https://goo.gl/forms/kg1bskrUQ5ZllM632">Feedback</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('nav_content')

    <ul class="nav navbar-nav">
        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden">
            <a class="page-scroll" href="#page-top"></a>
        </li>
        <li>
            <a class="page-scroll" href="#about">About</a>
        </li>
        <li role="separator" class="divider"></li>
    </ul>

@endsection
