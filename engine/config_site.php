<?

$sitebase = array(
	"MySQL_Host" => "127.0.0.1",
	"MySQL_Login" => "root",
	"MySQL_Password" => "",
	"MySQL_DataBase" => "red",
);

$realdir = '';
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
$mysqli = @new mysqli($sitebase['MySQL_Host'], $sitebase['MySQL_Login'], $sitebase['MySQL_Password'], $sitebase['MySQL_DataBase']);
if($mysqli->connect_errno) return exit("Mysql error");
$mysqli->set_charset("utf8");

$sql = "SELECT * FROM `settings`";
$result = $mysqli->query($sql);

$rows = $result->num_rows;
if($rows == 1)
{
	$result->data_seek(0);
    $settings = $result->fetch_assoc();
}
else exit("Не найден данные в settings");
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
//*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*

$config = array(
	'ServerName' => $settings['ServerName'],

	'Notify' => $settings['Notify'],

	'Discount' => $settings['Discount'],

	'VkGroup' => $settings['VkGroup'],

	'Youtube' => $settings['Youtube'],

	'MerchantID' => $settings['MerchantID'],

	'SecretWord' => $settings['SecretWord'],
);

?>
