<?PHP
date_default_timezone_set('Asia/Taipei');
//----以下設定資料必須要修改，否則程式無法正常運作-----------------開始
$dbnametxt="database_name";  //---------資料庫的名稱，將"xxx"更改，範例"able"
$dbusertxt="database_user";   //----------資料的庫帳號，將"xxx"更改，範例"able
$dbpwdtxt="password";   //----------資料庫的密碼，將"xxx"更改，範例"able"

$db=mysql_connect("db:3306",$dbusertxt,$dbpwdtxt);
$dblink=mysql_select_db($dbnametxt,$db);
mysql_query("SET NAMES 'UTF8'");

?>