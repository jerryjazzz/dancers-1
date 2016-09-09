<?php
	namespace config;
	use mysqli;
	class Db extends Config {
		private $connection ;
		function __construct() {
			$this->open_connection() ; // сразу подключает к бд
		}
		private function open_connection() {
			$this->connection = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS,$this->DB_NAME);
			if(!$this->connection) {
				die("Ошибка в подключении к БД:". mysql_error() ) ;
			}
			$this->connection->query("set names utf8");
			}

		function refValues($arr){ // без этого метода работает не на всех версиях!
			if (strnatcmp(phpversion(),'5.3') >= 0) { //Если версия PHP >=5.3 (в младших версиях все проще)
					$refs = array();
					foreach($arr as $key => $value) {
							$refs[$key] = &$arr[$key]; //Массиву $refs присваиваются ссылки на значения массива $arr
					}
					return $refs; //Массиву $arr присваиваются значения массива $refs
			}
			return $arr; //Возвращается массив $arr
		}

		public function sql($query,$array) {
			if(!($stmt = $this->connection->prepare($query))){
            	trigger_error('Mysqli Ошибка: <b>'.$this->connection->error.'('.$this->connection->errno.')</b>!',E_USER_ERROR);
        	}
			if(is_array($array))
          		call_user_func_array(array($stmt,'bind_param'),$this->refValues($array));
			if(!$stmt->execute())
           		trigger_error('Not run execute: <b>'.$stmt->error.'('.$stmt->errno.')</b>!', E_USER_ERROR);
			$result = $stmt->get_result();

        	$stmt->close();

			return $result ;
		}
		public function last_id(){
			return $this->connection->insert_id;
		}
		public function toRow($res){
			$row = $res->fetch_assoc();
			return $row;
		}
		public function toArray($res){
			while($row = $res->fetch_assoc()) {
				$all_row[] = $row ;
			}
			return $all_row;
		}
	}
	$db = new db() ;


?>