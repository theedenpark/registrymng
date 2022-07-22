<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>

    <link rel="shortcut icon" href="/assets/logo/logo.svg" type="image/x-icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/4e57ae290c.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- BootStrap -->
    <link href="/bootstrap/css/mdb.min.css" rel="stylesheet" />

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="/invoice_assets/style.css">
    
    <!-- JQuery  -->
    <script src="/js/jquery.js"></script>
    
    <!-- No Index  -->
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">

    {{-- Highlight  --}}
    <script src="/invoice_assets/jquery.min.js"></script>
    <script src="https://johannburkard.de/resources/Johann/jquery.highlight-4.js"></script>
    
</head>

<body>
    
    @yield("body")
    
</body>


<!-- MDB -->
<script type="text/javascript" src="/bootstrap/js/mdb.min.js"></script>

<!-- Custom  -->
<script src="/invoice_assets/script.js"></script>
<script src="/invoice_assets/newBill.js"></script>
<script src="/invoice_assets/login.js"></script>
<script src="/invoice_assets/dependent.js"></script>

</html>
