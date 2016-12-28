<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EnergyCAP Reports Viewer</title>

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="container">

    <div id="app">

        <app></app>

    </div>

    <script src="/js/app.js"></script>

</body>
</html>