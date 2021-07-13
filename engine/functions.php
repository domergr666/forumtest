<?
function message($title, $message, $status) {
	echo json_encode(array(
		'title' => $title,
		'message' => $message,
		'status' => $status,
	));
}

function IfAdmin() {
	global $mysqli;

	if($_SESSION['admin'] == true && !empty($_SESSION['name']))
	{
		$sql = "SELECT * FROM `admin` WHERE `name` = '{$_SESSION['name']}'";
		$result = $mysqli->query($sql);

		$rows = $result->num_rows;
		if($rows == 1) return true;
		else return false;
	}
	else return false;
}
function get_timeago( $ptime )
{
    $ptime = strtotime($ptime);

    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'ошибка';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'год',
                30 * 24 * 60 * 60       =>  'месяц',
                24 * 60 * 60            =>  'день',
                60 * 60                 =>  'час',
                60                      =>  'минут',
                1                       =>  'секунд'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ' назад';
        }
    }
}
?>
