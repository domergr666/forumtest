<?php
if(!defined("moonstudio")) return header("Location: /");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title><? echo $title; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?=$realdir?>/adminpanel/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=$realdir?>/adminpanel/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=$realdir?>/adminpanel/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=$realdir?>/adminpanel/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=$realdir?>/adminpanel/css/theme.css" rel="stylesheet" media="all">
    <!-- Jquery JS-->
    <script src="<?=$realdir?>/adminpanel/vendor/jquery-3.2.1.min.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?=$realdir?>/assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="post" id="alogin">
                                <div class="form-group">
                                    <label>Ник</label>
                                    <input class="au-input au-input--full" type="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input class="au-input au-input--full" type="password" name="password" required>
                                </div>
                                <button class="au-btn-red au-btn--block au-btn--redneon m-b-20" type="submit">Войти</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script>
$('#alogin').ajaxForm({
    url: '<?=$realdir?>/adminpanel/ajax/login.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        switch(data.status) {
            case 'error':
                swal(data.title,  data.message,  data.status);
                break;
            case 'success':
                location.href = '<?=$realdir?>/admin';
                break;
        }

    },
});
</script>

<!-- Bootstrap JS-->
    <script src="<?=$realdir?>/adminpanel/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=$realdir?>/adminpanel/vendor/slick/slick.min.js">
    </script>
    <script src="<?=$realdir?>/adminpanel/vendor/wow/wow.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/animsition/animsition.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=$realdir?>/adminpanel/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=$realdir?>/adminpanel/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=$realdir?>/adminpanel/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?=$realdir?>/adminpanel/js/main.js"></script>

</body>
</html>
