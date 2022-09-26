<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Login &mdash; Arfa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <!-- <link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap-override.css">


</head>

<body>
    <?= $this->renderSection('content'); ?>

</body>
<script src="<?= base_url(); ?>/assets/js/login.js"></script>

</html>