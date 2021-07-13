<?
	if(!defined("moonstudio")) return header("Location: /");


//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
$sql = "SELECT * FROM `servers`";
$result = $mysqli->query($sql);

$rows = $result->num_rows;
if($rows == 0) exit('Серверов не добавлен. Задонатить невозможно.');
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
$sql = "SELECT * FROM `tovari`";
$result = $mysqli->query($sql);

$rows = $result->num_rows;
if($rows == 0) exit('Товаров нет. Задонатить невозможно.');
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
$sql = "SELECT * FROM `category`";
$result = $mysqli->query($sql);

$rows = $result->num_rows;
if($rows == 0) exit('Категорию нет');
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=$realdir?>/assets/img/logo1.png">
    <title><? echo $title; ?></title>
    <!-- CSS -->
	<link rel="stylesheet" href="<?=$realdir?>/assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="<?=$realdir?>/assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="<?=$realdir?>/assets/css/fonts.css">
	<link rel="stylesheet" href="<?=$realdir?>/assets/css/style.css">
	<link rel="stylesheet" href="<?=$realdir?>/assets/css/responsive.css">
    <!-- CSS -->
</head>
<body class="main-page">

<div class="container">
	<div class="header">

		<input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i class="fas fa-bars"></i>
        </label>

		<div class="logo">
			<!--<p class="logo-text">Logo<font color="#cd5b5b">Type</font></p>-->
			<a href="/"> <img class="logo-img" src="<?=$realdir?>/assets/img/logo.png" alt=""> </a>
			<p class="slogan">играй в свое наслаждение</p>
		</div>
		<ul class="main-menu">
			<label for="chk" class="hide-menu-btn">
				<i class="fas fa-times"></i>
			</label>
			<li><a href="/">Главная</a></li>
			<li><a href="/">Что можно купить?</a></li>
			<li><a href="/">Мы Вконтакте</a></li>
			<li><a href="/">Информация о сервере</a></li>
			<li><a href="<? echo $config['VkGroup']; ?>"><i class="icon-social fab fa-vk"></i></a></li>
			<li><a href="<? echo $config['Youtube']; ?>"><i class="icon-social fab fa-youtube"></i></a></li>
		</ul>
	</div>

	<div class="row mobile-row">
		<form class="main-form" method="post" id="donateform">
			<div class="notify-action">
				<p class="notify-text"><? echo $config['Notify']; ?></p>
			</div>
			<p class="buy-donate">Покупка <font class="red-text">доната</font></p>
			<p class="select-text">Выберите свой игровой сервер</p>
			<?
				$sql = "SELECT * FROM `servers`";
				$result = $mysqli->query($sql);

				$rows = $result->num_rows;
			?>
			<div class="enter-server"
			<?
				if($rows == 1) echo 'style="grid-template-columns: 1fr;"';
				if($rows == 2) echo 'style="grid-template-columns: 1fr 1fr;"';
				if($rows > 2) echo 'style="grid-template-columns: 1fr 1fr 1fr;"';
			?>>
			<?
				if($rows > 0)
				{
					for($x; $x < $rows; $x++)
					{
						$result->data_seek($x);
	    				$servers = $result->fetch_assoc();

	    				if($x == 0) $checked = ' checked';
	    				else $checked = '';


	    				if($x == 0) $gettovars = $servers['name'];

						if($x > 2) {
							$fixstyle = 'style="margin-top: 15px;"';
						}
						else {
							$fixstyle = "";
						}

	    				echo
	    				'
	    				<input class="radio-server" name="server" type="radio" value="'.$servers['name'].'" id="'.$servers['name'].'"'.$checked.'>
						<label '.$fixstyle.' id="changeserver" data-server="'.$servers['name'].'" for="'.$servers['name'].'">'.$servers['name'].'</label>
						';
					}
				}
			?>
			</div>
			<input class="name-input" type="text" name="name" placeholder="Введите ваш NickName">
			<select class="form-select" name="tovar" id="showtovars">
				<option selected disabled value="0">Выберите товар</option>
			</select>
			<input class="name-input" type="text" name="promo" placeholder="Промо-код">
			<button class="form-btn" type="submit">Оплатить / Доплатить</button>
			<p class="privacy">Нажимая на кнопку, вы соглашаетесь<br> с <a href="#">правилами сервера</a></p>
		</form>

		<div class="last-buys">
			<div class="notify-action">
				<p class="notify-text">Последние покупки игроков</p>
			</div>
			<div class="last-list" id="lastbuys">
				<?
			        $_SESSION['click'] = 0;

			        $sql = "SELECT * FROM `last_buys` ORDER BY `id` DESC LIMIT 5";
			        $result = $mysqli->query($sql);

			        $rows = $result->num_rows;

			        if($rows > 0)
			        {
			            for($x = 0;$x < $rows;$x++)
			            {
			                $result->data_seek($x);
			                $pokupki = $result->fetch_assoc();
			                echo
			                '<div class="last-buyer">
								<img src="https://mc-heads.net/avatar/'.$pokupki['name'].'">
								<p class="nickname-buyer">'.$pokupki['name'].'</p>
								<p>'.$pokupki['tovarname'].'</p>
								<p>'.(get_timeago($pokupki['date'])).'</p>
							</div>';
			            }
			        }
					else echo '<h3 class="no-buyers">Пока нет покупателей</h3>';


			        $sql = "SELECT * FROM `last_buys` ORDER BY `id` DESC";
			        $result = $mysqli->query($sql);

			        $rows = $result->num_rows;

			        if($rows > 5)
			        {
			            echo
			            '<div data-id="1" class="last-arrow">
							<img src="'.$realdir.'/assets/img/right-arrow.png">
						</div>';
			        }
			    ?>
			</div>
		</div>

		<div class="otziv" id="otziv">
			<?
				$_SESSION['clickotziv'] = 0;

				$sql = "SELECT * FROM `otziv` ORDER BY `id` DESC LIMIT 1";
				$result = $mysqli->query($sql);

				$rows = $result->num_rows;

				if($rows > 0)
				{
					$result->data_seek(0);
					$otziv = $result->fetch_assoc();

					$sql = "SELECT * FROM `otziv` ORDER BY `id` DESC";
					$result = $mysqli->query($sql);
					$rows = $result->num_rows;
					if($rows > 1) $arrow = '<img data-id="1" class="otziv-arrow" src="'.$realdir.'/assets/img/right-arrow.png">';

					echo
					'<div class="otziv-title">
					    <img src="'.$realdir.'/assets/img/otziv-text.png">
					</div>
					<div class="otziv-info">
					    <img class="otziv-head" src="https://mc-heads.net/avatar/'.$otziv['name'].'" alt="">
					    <p class="otziv-owner">Игровой Nick: '.$otziv['name'].'</p>
					    <p class="likes-text">Оценка пользователя</p>
					    <img class="otziv-stars" src="'.$realdir.'/assets/img/star'.$otziv['stars'].'.png">
					</div>
					<div class="otziv-text-area">
						<div></div>
					    <div class="otziv-text">
					        <p>'.$otziv['text'].'</p>
					    </div>
						'.$arrow.'
					</div>';
				}
			?>
		</div>
	</div>

	<div class="footer">
		<img class="logo-footer" src="<?=$realdir?>/assets/img/logo.png" alt="">
		<p class="copyright"><?=$config['ServerName'];?> 2019 © <br> Любое копирование материала запрещено</p>
	</div>
</div>

<!-- JS -->
<script type="text/javascript" src="<?=$realdir?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$realdir?>/assets/js/jquery.form.min.js"></script>
<script type="text/javascript" src="<?=$realdir?>/assets/js/sweetalert.min.js"></script>
<script>
$('#donateform').ajaxForm({
    url: '<?=$realdir?>/ajax/donate.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        switch(data.status) {
            case 'error':
                swal(data.title,  data.message,  data.status);
                break;
            case 'info':
            	swal(data.title,  data.message,  data.status);
            	setTimeout(function () {
            		location.href = data.url;
            	}, 3000);
            	break;
            case 'success':
                location.href = data.url;
                break;
        }
    },
});
$(document).on( 'click', '.last-arrow', function() {
	var buttonID = $(this).data("id");
	var lastbuys = $('#lastbuys');
    $.ajax({
        url: '<?=$realdir?>/ajax/showbuys.php',
        type: 'POST',
        dataType: "text",
        data: {button: buttonID},
        success: function(data){
        	lastbuys.empty();
            lastbuys.append(data);
        }
    });
});
$(document).on( 'click', '.otziv-arrow', function() {
	var buttonID = $(this).data("id");
	var otziv = $('#otziv');
    $.ajax({
        url: '<?=$realdir?>/ajax/otziv.php',
        type: 'POST',
        dataType: "text",
        data: {button: buttonID},
        success: function(data){
        	otziv.empty();
            otziv.append(data);
        }
    });
});

$(document).ready(function() {
    var servername = '<? echo $gettovars; ?>';
	var showtovars = $('#showtovars');
    $.ajax({
        url: '<?=$realdir?>/ajax/showtovars.php',
        type: 'POST',
        dataType: "text",
        data: {server: servername},
        success: function(data){
        	showtovars.empty();
            showtovars.append(data);
        }
    });
});

$(document).on( 'click', '#changeserver', function() {
	var servername = $(this).data("server");
	var showtovars = $('#showtovars');
    $.ajax({
        url: '<?=$realdir?>/ajax/showtovars.php',
        type: 'POST',
        dataType: "text",
        data: {server: servername},
        success: function(data){
        	showtovars.empty();
            showtovars.append(data);
        }
    });
});
</script>
<!-- JS -->
</body>
</html>
