<?php 
//ini_set('display_errors',1); 
//error_reporting(E_ALL);

LessonManager::generateQuestion();
?>
<div class='container'>
<div class="panel panel-info" STYLE = "width: 100%">
	<div class="panel-body">
		<h1 STYLE="text-align: center"><?php print($_SESSION['lesson_name']); ?> (Practice)</h1>
		<div class="progress progress-striped active">
 			<div class="progress-bar
 				<?php 
 				$mastery = LessonManager::masteryLevel(0);
 				if($mastery < 4) print('progress-bar-danger');
 				else if($mastery < 9) print('progress-bar-warning');
 				else print('progress-bar-success');
 				?>
 			" style="width: <?php print(LessonManager::masteryLevel(0)); ?>0%"></div>
		</div>

		<div id="question" class="jumbotron">
		<h3><?php print($_SESSION['question']); ?></h3>
		</div>

		<div class="form-group">
			<div class="input-group">
			    <span class="input-group-addon">Answer here:</span>
			    <input type="text" class="form-control">
			    <span class="input-group-btn">
			    	<button class="btn btn-default" type="button">Submit</button>
			    </span>
			</div>
		</div>
	</div>
</div>
</div>