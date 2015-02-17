<?php 
	//ini_set('display_errors',1); 
 	//error_reporting(E_ALL);
	interface DBConnector{
		const HOST = 'localhost';
		const DATABASE = 'coach_challenges';
		const USERNAME = 'ChallengeData';
		const PASSWORD = '479zXScPR9LbEHAU';
	}

	if(session_status() == PHP_SESSION_NONE) session_start();
	

	class UserAccess implements DBConnector{
		private static function connect(){
			$DBH = new PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE, self::USERNAME, self::PASSWORD);
			return $DBH;
		}

		//add a user to the database with the given username/password/email, a generated salt, and the next available userid
		public static function addUser($username, $password, $email, $name){
			$salt = substr(md5(rand()), 0, 7);
			$password = md5(md5($password).$salt);
			$data = array('username' => $username, 'password' => $password, 'email' => $email, 'salt' => $salt, 'name' => $name);

			
			$DBH = self::connect();
			$STH = $DBH->prepare("INSERT INTO users(username, password, salt, email, name) VALUES (:username, :password, :salt, :email, :name)");
			$STH->execute($data);
			$DBH = null;
		}

		public static function rowFromToken($token){
			$DBH = self::connect();
			$STH = $DBH->prepare("SELECT * FROM users WHERE registrationToken = :token");
			$STH->bindParam(":token", $token);
			$STH->execute();
			while($row = $STH->fetch()){
				return $row;
			}
			return null;
		}

		public static function login($username, $password){
			$DBH = self::connect();
			$STH = $DBH->prepare("Select * FROM users WHERE username = :username");
			$STH->bindParam(":username", $username);
			$STH->execute();
			while($row = $STH->fetch()){
				/*if(md5(md5($password).$row['salt']) == $row['password'] ){
					$_SESSION['userid'] = $row['userid'];
					return true;
				}*/
				if(password_verify($password, $row['password'])){
					$_SESSION['userid'] = $row['userid'];
					return true;
				}

				return false;
			}
			return false;
		}

		//Outdated bit of code which might be useful again at some point in the future
		/*public static function displayUsers(){
			if(session_status() == PHP_SESSION_NONE) session_start();
			$DBH = Self::connect();
			$STH = $DBH->prepare("SELECT * FROM users ORDER BY username");
			$STH->execute();
			$reply = '<tbody><tr><th>Username</th><th>Name</th><th>Email</th><th>Admin</th><th>Update</th><th>Delete</th></tr>';
			$status = UserAccess::status();
			while($row = $STH->fetch()){
				$userid = $row['userid'];
				$line = "<tr><td>".$row['username']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>";
				if($row['admin'] == 0)
					$line = $line.'No</td><td>';
				else
					$line = $line.'Yes</td><td>';

				$line = $line."<button class='btn btn-primary' onclick='updateUser($userid);'>Update</button></td><td>";
				$line = $line."<button class='btn btn-warning' onclick='deleteUser($userid);'>Delete</button>";

				$line = $line."</td></tr>";
				$reply = $reply.$line;
			}
			$reply = $reply."</tbody>";
			return $reply;
		}*/

		//Outdated code - should be updated as soon as possible	
		/*public static function updateUser($name, $email){
			$DBH = Self::connect();

			if(session_status() == PHP_SESSION_NONE) session_start();
			$STH = $DBH->prepare("UPDATE users SET name = :name, email = :email WHERE userid = :id");
			$STH->bindParam(":email", $email);
			$STH->bindParam(":name", $name);
			$STH->bindParam(":id", $_SESSION['userid']);
			$STH->execute();

			$DBH = null;
		}*/

		//Another bit of outdated code which should be fixed as soon as possible
		/*public static function updatePass($password){
			$DBH = Self::connect();

			if(session_status() == PHP_SESSION_NONE) session_start();
			$STH = $DBH->prepare("UPDATE users SET password = md5(:pass) WHERE userid = :id");
			$STH->bindParam(":pass", $password);
			$STH->bindParam(":id", $_SESSION['userid']);
			$STH->execute();

			$DBH = null;
		}*/ 

		//More code to be updated
		/*public static function login($data){
			$DBH = Self::connect();

			$STH = $DBH->prepare("SELECT * FROM users WHERE username = :username AND password = md5(:password)");
			$STH->bindParam(':username', $data['username']);
			$STH->bindParam(':password', $data['password']);
			$STH->execute();

			while($row = $STH->fetch()){
				session_start();
				$_SESSION['userid'] = $row['userid'];
				$DBH = null;
				return true;
			}
			$DBH = null;

			return false;
		}*/

		//Yay some code which doesn't actually need to be updated          
		public static function userExists($username){
			$DBH = self::connect();

			$STH = $DBH->prepare("SELECT * FROM users WHERE username = :username");
			$STH->bindParam(':username', $username);
			$STH->execute();

			while($row = $STH->fetch())
				return true;
			return false;
		}

		//code needs to be fixed
		public static function status(){
			if(!isset($_SESSION['userid'])){
				return 0;
			}else if($_SESSION['userid'] == 0){
				return 0;
			}else{
				return 1;
			}
		}

		//needs to be updated for new user data
		/*public static function currentUser(){
			if(session_status() == PHP_SESSION_NONE) session_start();
			$DBH = Self::connect();

			$STH = $DBH->prepare("SELECT * FROM users WHERE userid = :id");
			$STH->bindParam(":id", $_SESSION['userid']);
			$STH->execute();

			while($row = $STH->fetch()){
				$data = array('name' => $row['name'], 'email' => $row['email'], 'password' => $row['password'], 'username' => $row['username']);
				return $data;
			}
		}*/
	}
	
	//login("test", "test");
?>