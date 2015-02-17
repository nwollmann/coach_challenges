
<?php 

class Lesson0{
	public function calcMasteryLevel(){
		$row = LessonAccess::getUserRow($_SESSION['userid'], 'lesson_0');
		$mastery = str_split(decbin($row['mastery']));
		$score = 0;
		foreach($mastery as $result){
			if($result == 1) $score++;
		}
		return $score;
	}

	public function test(){
		return "hello world";
	}

	public function generate($mastery){
		//some nice initial setup stuff which should really be elsewhere
		$_SESSION['lesson_name'] = "Mass, Volume, and Density";
		/**
		Question Variance:
			-are you looking for Density, Volume, or Mass?
			-how direct is the information
		*/
		if(isset($_SESSION['question']) && $_SESSION['new']) return;
		//$mastery = Lesson0::calcMasteryLevel();
		$_SESSION['question'] = "Here is a test question for mastery level $mastery.";
		$_SESSION['missing'] = rand(0, 2); //0 = mass, 1 = volume, 2 = density

		//$_SESSION['question'] = "Here is a question for the mastery level of $mastery";
		if($mastery <= 3){
			//most basic question type
			$_SESSION['density'] = rand(1, 3);
			$_SESSION['volume'] = rand(1, 3);
			$_SESSION['mass'] = $_SESSION['density'] * $_SESSION['volume'];
			$_SESSION['question'] = "";

		}else if($mastery <= 7){
			//moderate question type 

		}else{
			//advanced question type


		}
	}
	public function answer($answer){
		$mastery = LessonAccess::getUserRow($_SESSION['userid'], 'lesson_0')['mastery'];
		
		if($answer == $_SESSION['answer']){

		}else{

		}
	}
}

?>