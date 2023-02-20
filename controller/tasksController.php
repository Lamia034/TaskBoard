<?php 
require_once '../model/tasks.php';
require_once '../database/DB.php';
require_once '../app/classes/session.php';

class TaskController{

	public function getAllTasks(){
		$tasks = task::getAll();
		return $tasks;
	}

	public function getOneTask(){
		if(isset($_POST['TaskId'])){
			$data = array(
				'TaskId' => $_POST['TaskId']
			);
			$task = task::getTask($data);
			return $task;
		}
	}
	

	public function getTasksByUser(){
		if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
			$UserId = $_SESSION['UserId'];
			$tasks = task::getTasksByUser($UserId);
			return $tasks;
		}
	}
	
	public function addTask() {
		if (isset($_POST['add'])) {
			$UserId = $_SESSION['UserId'];
			$taskNames = $_POST['TaskName'];
			$taskStatuses = $_POST['TaskStatus'];
			$taskDeadlines = $_POST['TaskDeadline'];
	
			for ($i = 0; $i < count($taskNames); $i++) {
				$taskName = $taskNames[$i];
				$taskStatus = $taskStatuses[$i][0];
				$taskDeadline = $taskDeadlines[$i];
	
				if (!empty($taskName) && !empty($taskDeadline) && !empty($taskStatus) && ($taskStatus == 'ToDo' || $taskStatus == 'Doing' || $taskStatus == 'Done')) {
					$data = array(
						'UserId' => $UserId,
						'TaskName' => $taskName,
						'TaskStatus' => $taskStatus,
						'TaskDeadline' => $taskDeadline
					);
					$result = task::add($data);
					if($result === true){
						session::set('success','task added');
						Redirect::to('profil.php');
					}else{
						echo $result;
					}
				}
			}
		}
	}
	
	


	public function updateTask(){
	
			if(isset($_POST['update'])){
				$taskStatus = $_POST['TaskStatus'];
				$taskName = $_POST['TaskName'];
				$taskDeadline = $_POST['TaskDeadline'];
				$taskId = $_POST['TaskId'];

				if (!empty($taskName) && !empty($taskDeadline) && !empty($taskStatus) && !empty($taskId) && ($taskStatus == 'ToDo' || $taskStatus == 'Doing' || $taskStatus == 'Done')) {
					$data = array(
						'TaskName' => $taskName,
						'TaskStatus' => $taskStatus,
						'TaskDeadline' => $taskDeadline,
						'TaskId' => $taskId
						
					);
		


				 $result = Task::update($data);
				if($result === 'ok'){

				 session::set('success','modified');
				  Redirect::to('profil.php');
				 }else{
				echo $result;
			}
		}
	}
}

	
	public function deleteTask(){
		if(isset($_POST['TaskId'])){
			$data['TaskId'] = $_POST['TaskId'];
			$result = task::delete($data);
			if($result === 'ok'){
				session::set('success','task deleted');
				// Redirect::to('home.php');
			}else{
				echo $result;
			}
		}
	}



	
	public function searchTask() {
		if(isset($_POST['search']) && isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
			$searchTerm = $_POST['search'];
			$UserId = $_SESSION['UserId'];
			$tasks = Task::search($searchTerm, $UserId);
			if(!empty($tasks)){
			   return $tasks;
			}
		}
	}
	


	}
	
	
	






?>