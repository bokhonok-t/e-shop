<? 
 define('HOST', 'localhost'); 		//сервер
 define('USER', 'root'); 			//пользователь
 define('PASSWORD', ''); 			//пароль
 define('NAME_BD', 'shop');		//база
 $connect = mysql_connect(HOST, USER, PASSWORD)or die(mysql_error( ));
 mysql_select_db(NAME_BD, $connect) or die (mysql_error());	
 mysql_query('SET names "utf8"');
?>