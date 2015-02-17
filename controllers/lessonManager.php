<?php 
require_once("xajax_core/xajax.inc.php");
require_once("model/pdoUtility.php");
require_once("model/dataAccess.php");
require_once("model/lessonDataAccess.php");

foreach (glob("views/chemistry/lessons/*.php") as $filename){
	require_once($filename);
}

class LessonManager{

	public static function checkAnswer($answer){

	}

	//for now this is a placeholder
	public static function masteryLevel($lesson){
		//$row = LessonAccess::getUserRow($_SESSION['userid']);
		//$history = decbin($row['history'.$lesson]);

		//$score = 0;
		//foreach($mastery as $result){
		//	if($result == 1) $score++;
		//}
		return 4;
	}

	public static function generateQuestion(){
		//take the mastery level
		$mastery = LessonManager::masteryLevel($_SESSION['lessionid']);
		//call out to the current lesson
		$_SESSION['lesson_object']->generate($mastery);
		//return if necessary (?)
	}

}

?>