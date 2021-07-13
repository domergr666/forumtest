<?
	session_start();
	define("moonstudio", true);
	include '../engine/config.php';

	$server = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['server']))));



	$sql = "SELECT * FROM `category`";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;

	for($x = 0; $x < $rows; $x++)
	{
		$result->data_seek($x);
    	$category = $result->fetch_assoc();

    	$categoryname = $category['name'];

    	$sqll = "SELECT * FROM `tovari` WHERE `category` = '{$categoryname}' AND `server` = '{$server}'";
		$resultt = $mysqli->query($sqll);
		$rowss = $resultt->num_rows;
		if($rowss > 0)
		{
			$data .= '<option value="0" disabled>' .$categoryname. '</option>';

			for($i = 0; $i < $rowss; $i++)
		    {
			    $resultt->data_seek($i);
    			$tovar = $resultt->fetch_assoc();
    			$data .= '<option value="' .$tovar['id']. '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$tovar['name']. ' - ' .$tovar['price']. ' руб.</option>';
			}
		}
	}

	echo '<option value="0">Выберите товар</option>'. $data;
?>