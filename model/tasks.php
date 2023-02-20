<?php 
require_once '../database/DB.php';
require_once '../app/classes/session.php';
require_once '../app/classes/Redirect.php';

class task {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM tasks ORDER BY TaskDeadline ASC');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}

	static public function getTask($data){
		$TaskId = $data['TaskId'];
		try{
			$query = 'SELECT * FROM tasks WHERE TaskId=:TaskId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":TaskId" => $TaskId));
			$task = $stmt->fetch(PDO::FETCH_OBJ);
			return $task;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	} 


	static public function getTasksByUser($UserId) {
		$stmt = DB::connect()->prepare("SELECT tasks.* FROM tasks JOIN users ON tasks.UserId = users.UserId WHERE users.UserId = :UserId ORDER BY TaskDeadline ASC		");
		$stmt->execute(array(':UserId' => $UserId));
		return $stmt->fetchAll();
		$stmt = null;
	}
	

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO tasks (UserId,TaskName,TaskStatus,TaskDeadline)
			VALUES (:UserId,:TaskName,:TaskStatus,:TaskDeadline)');
		$stmt->bindParam(':UserId',$data['UserId'], PDO::PARAM_INT);
		$stmt->bindParam(':TaskName',$data['TaskName'], PDO::PARAM_STR);
		$stmt->bindParam(':TaskStatus',$data['TaskStatus'], PDO::PARAM_STR);
		$stmt->bindParam(':TaskDeadline',$data['TaskDeadline'], PDO::PARAM_STR);
	
		// $pr = intval($data['RoomPrice']);
		

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE tasks SET TaskName=:TaskName ,TaskStatus=:TaskStatus ,TaskDeadline=:TaskDeadline   WHERE TaskId=:TaskId');
		$stmt->bindParam(':TaskId' , $data['TaskId'], PDO::PARAM_INT );
		$stmt->bindParam(':TaskName',$data['TaskName'], PDO::PARAM_STR);
		$stmt->bindParam(':TaskStatus',$data['TaskStatus'], PDO::PARAM_STR);
		$stmt->bindParam(':TaskDeadline',$data['TaskDeadline'], PDO::PARAM_STR);
		

		// var_dump($data['price']);
		// die();
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt = null;
	}



	static public function delete($data){
		$TaskId = $data['TaskId'];
		try{
			$query = 'DELETE FROM tasks WHERE TaskId=:TaskId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":TaskId" => $TaskId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}




	public static function search($searchTerm,$UserId) {
		$stmt = DB::connect()->prepare("SELECT * FROM tasks JOIN users ON tasks.UserId = users.UserId WHERE TaskName LIKE :searchTerm AND tasks.UserId = :UserId");
		$stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
		$stmt->bindValue(':UserId', $UserId, PDO::PARAM_INT);
		$stmt->execute();
		$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = null;
		return $tasks;
	}
	

	}
	


	
	




