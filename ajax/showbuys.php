<?
	session_start();
	define("moonstudio", true);
	include '../engine/config.php';

	$button = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['button']))));

	if($button == '1') $_SESSION['click'] += 1;
	else if($button == '0') $_SESSION['click'] -= 1;

	if($_SESSION['click'] < 0) return false;

	$sql = "SELECT * FROM `last_buys` ORDER BY `id` DESC";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;

    if($rows > 0)
    {
    	$start = $_SESSION['click'];
    	$end = $start + 5;

    	if($start > 0)
    	{
    		$data .=
    		'<div data-id="0" class="last-arrow">
				<img src="'.$realdir.'/assets/img/left-arrow.png">
			</div>';
    	}

    	for($x = $start; $x < $end; $x++)
    	{
    		$result->data_seek($x);
            $pokupki = $result->fetch_assoc();

            if(empty($pokupki['name'])) break;

            $data .=
			'<div class="last-buyer">
				<img src="https://mc-heads.net/avatar/'.$pokupki['name'].'">
				<p class="nickname-buyer">'.$pokupki['name'].'</p>
				<p>'.$pokupki['tovarname'].'</p>
				<p>'.(get_timeago($pokupki['date'])).'</p>
			</div>';
    	}

    	if($rows > $end)
    	{
    		$data .=
    		'<div data-id="1" class="last-arrow">
				<img src="'.$realdir.'/assets/img/right-arrow.png">
			</div>';
    	}
    }

    echo $data;
?>
