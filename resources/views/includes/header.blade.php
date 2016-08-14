<!-- resources/views/includes/header.blade.php -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Laravel CUER</title>

<!-- Fonts -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

<!-- Bootstrap Custom CSS -->
<link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">

<!-- Custom Scrolling CSS -->
<link href="{{ asset('assets/css/scrolling-nav.css') }}" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
    body {
        font-family: 'Lato';
    }
    .fa-btn {
        margin-right: 6px;
    }
    a.my-tool-tip, a.my-tool-tip:hover, a.my-tool-tip:visited {
        color: black;
    }
    .form-group.required .control-label:after { 
       content:"*";
       color:red;
    }
    .pagination {
        margin: 0px;
    }
    .delete-button {
        margin-left: 6px;
    }
</style>
