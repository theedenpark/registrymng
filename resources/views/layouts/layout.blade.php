<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>

    <link rel="shortcut icon" href="assets/logo/logo.svg" type="image/x-icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- BootStrap -->
    <link href="/bootstrap/css/mdb.min.css" rel="stylesheet" />
    
    <!-- Custom CSS  -->
    @if(session('theme') == 1)
        <link rel="stylesheet" href="/css/style.css">
    @elseif(session('theme') == 2)
        <link rel="stylesheet" href="/css/styleDark.css">
    @else
        <link rel="stylesheet" href="/css/style.css">
    @endif
    <link rel="stylesheet" href="/css/responsive.css">

    <link rel="stylesheet" href="/css/calculator.css">

    <script src="https://kit.fontawesome.com/4e57ae290c.js" crossorigin="anonymous"></script>
    
    <!-- JQuery  -->
    <script src="/js/jquery.js"></script>
    
    <!-- Data Table CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="/js/jszip.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="/ckeditor/ckeditor.js"></script>
    
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    
</head>

<body>
    
    @yield("body")
    
</body>

<!-- MDB -->
<script type="text/javascript" src="/bootstrap/js/mdb.min.js"></script>
<script src="/js/formSubmit.js"></script>
<script src="/js/dependentList.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/calculator.js"></script>
</html>
