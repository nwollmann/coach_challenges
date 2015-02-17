<?php 
//ini_set('display_errors',1); 
//error_reporting(E_ALL);
class LessonAccess {
	const HOST = 'localhost';
	const DATABASE = 'virtualchemclass';
	const USERNAME = 'ChemData';
	const PASSWORD = '479zXScPR9LbEHAU';

	private static function connect(){
		$DBH = new PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE, self::USERNAME, self::PASSWORD);
		return $DBH;
	}

	public static function getQuestionId($lesson, $form, $values){
		$DBH = self::connect();
		$STH = $DBH->prepare("SELECT * FROM questions WHERE lessonid = $lesson");
		$STH->execute();
		$count = 1;
		while($row = $STH->fetch()){
			$count++;
			if($row['form'] == $form && $row['params'] == $values)
				return $row['questionid'];
		}
		print("Trying with a count of ".$count."<br>");
		$DBH = null;
		$DBH = self::connect();
		$STH = $DBH->prepare("INSERT INTO `questions`(`questionid`, `lessonid`, `form`, `params`) VALUES ($count,$lesson,$form,'$values')");
		$STH->execute();
		$DBH = null;
		print(mysql_error());
		return $count;
	}

	//create 
	public static function getUserRow($userid){
		$DBH = self::connect();
		$STH = $DBH->prepare("SELECT * FROM $users WHERE userid = $userid");
		$STH->execute();
		while($row = $STH->fetch()){
			return $row;
		}
		$STH = $DBH->prepare("INSERT INTO $users (userid) VALUES ($userid)");
		$STH->execute();
		return getUserRow($userid, $lessonTable);
	}

	public static function execute($statement){
		$DBH = self::connect();
		$STH = $DBH->prepare($statement);
		$STH->execute();
		return $STH;
	}

}

?>