<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon"  href="/assets/img/icon.ico">
    
    <?php
        // Check if the current file is "login-admin.php"
        $currentFile = basename($_SERVER['PHP_SELF']);
        $bodyClass = ($currentFile == 'login-admin.php') ? 'bg-basecolor' : '';

        // Output the body tag with the appropriate class
        echo '<body id="page-top" class="' . $bodyClass . '">';
        ?>
    <title><?= $model['title'] ?></title>
</head>
<body>

