<?
	session_start();
	define("moonstudio", true);
	include '../engine/config.php';

	$button = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['button']))));

	if($button == '1') $_SESSION['clickotziv'] += 1;
	else if($button == '0') $_SESSION['clickotziv'] -= 1;

	if($_SESSION['clickotziv'] < 0) return false;

	$sql = "SELECT * FROM `otziv` ORDER BY `id` DESC";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;

    if($rows > 0)
    {
    	$start = $_SESSION['clickotziv'];
    	$end = $start + 1;

        if($start > 0)
    	{
    		$leftarrow = '<img data-id="0" class="otziv-arrow" src="'.$realdir.'/assets/img/left-arrow.png">';
    	}
		else {
			$leftarrow = '<div></div>';
		}

        if($rows > $end)
    	{
    		$rightarrow = '<img data-id="1" class="otziv-arrow" src="'.$realdir.'/assets/img/right-arrow.png">';
    	}

    	$result->data_seek($start);
        $otziv = $result->fetch_assoc();

        $data =
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
            '.$leftarrow.'
            <div class="otziv-text">
                <p>'.$otziv['text'].'</p>
            </div>
            '.$rightarrow.'
        </div>';
    }

    echo $data;
?>
