<!-- resources/views/layouts/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    

    <!-- New Form -->
    <section id="new-form" class="even-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-offset-1 col-md-9 col-lg-offset-2 col-lg-8">
                    @include($type.'.includes.create')
                </div>
            </div>
        </div>
    </section>
    
    <!-- Current List -->
    <section id="current-list" class="odd-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @include($type.'.includes.index')
                </div>
            </div>
        </div>
    </section>
            
@endsection

@section('nav_content')

@endsection