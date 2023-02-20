<?php
session_start();
require_once '../controller/tasksController.php';
// require_once '../alerts.php';
$data = new TaskController();
$tasks = $data->getTasksByUser();

if(isset($_POST['submit'])){
   
    $searchTask = new taskController();
    $searchTask->searchTask();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- font awsome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TaskBoard</title>
</head>

	<!-- navbar -->


	<!--backlog-->
	<!-- component -->

<!-- component -->




<body class="bg-gradient-to-r from-cyan-300 to-blue-500 w-full h-screen font-sans">
<nav class="flex items-center justify-between flex-wrap bg-gray-700 py-4 lg:px-12 shadow border-solid border-t-2 bg-gray-700 border-blue-700">
        <div class="flex justify-between lg:w-auto w-full lg:border-b-0 pl-6 pr-2  pb-5 lg:pb-0">
            <div class="flex items-center flex-shrink-0  mr-16">
                <span class="font-semibold text-white text-xl tracking-tight"> <a href="home.php">TaskBoard</a></span>
            </div>
            <div class="block lg:hidden ">
                <button
                    id="nav"
                    class="flex items-center px-3 py-2 border-2 rounded text-blue-700 border-blue-700 hover:text-blue-700 hover:border-blue-700 mobile-menu-button">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    
        <div class="menu w-full lg:block flex-grow lg:flex lg:items-center lg:w-auto lg:px-3 px-8 mobile-menu hidden">
        <div class="text-md font-bold text-indigo-100 lg:flex-grow">
        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){ ?>
                <a href="profil.php"
                   class="block mt-4 lg:inline-block  lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                   Create Tasks
                </a>
                <?php } else{?>
                    <a href="login.php"
                   class="block mt-4 lg:inline-block  lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                   Create Tasks
                </a>
                <?php } ?>
            </div>
            <!-- This is an example component -->
            <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true): ?>
                <form method="post" action="searchTable.php">
            <div class="relative mx-auto text-gray-600 lg:block hidden">
                <input
                    class="border-2 border-gray-300 bg-white h-10 pl-2 pr-8 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search">
                <button type="submit" name="submit" class="absolute right-0 top-0 mt-3 mr-2">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                         version="1.1" id="Capa_1" x="0px" y="0px"
                         viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                         xml:space="preserve"
                         width="512px" height="512px">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
              </svg>
                </button>
            </div>
                </form>
            <div class="flex ">
   <!-- check if user is logged in -->

    <div class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Welcome, <?php echo $_SESSION['UserName']; ?>!</div>
    <a href="logout.php" class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Logout</a>
<?php else: ?>
    <a href="register.php" class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Sign up</a>
    <a href="login.php" class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">login</a>
<?php endif; ?>
            </div>
        </div>
    
    </nav>




    <!-- component -->

  <div class="grid grid-cols-1 sm:grid-cols-3  justify-between "> 
  
    
                 
<div class="bg-blue w-full p-8 flex justify-center font-sans">
<div class="rounded bg-grey-light w-64 p-2">

  <div class="flex justify-between py-1">
 
  	<h3 class="text-sm">To do</h3>
    <svg class="h-4 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"/></svg>
  </div>
  <div class="text-sm mt-2">
  	<div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
        Assign your work!
	</div>
    <?php $i=0; ?>
    <?php foreach($tasks as $task):?>
        <?php if($task['TaskStatus'] == 'ToDo'){  ?>
            
   <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
       <div class="flex items-center justify-between"><span style="font-weight:bold;"><?php echo $task['TaskName'];?></span ><span style="font-weight:bold;"><?php echo $task['TaskDeadline'];?></span><span class="bg-red-300 p-2 rounded mt-1 border-b  "><?php echo $task['TaskStatus'];?></span></div> 
       <div class="flex items-center justify-between">    
                        <form method="POST" class="me-1" action="update.php">
                        <input type="hidden" name="TaskId" value="<?php echo $task['TaskId'];?>">
                        <button type="submit" name="submit" ><i class="fa-solid fa-pen-to-square"></i></button>
                        <!-- <input type="submit" name="submit" class="btn btn-sm btn-warning"> -->
                        
                    </form>
                    <form method="POST" class="me-1" action="delete.php">
                        <input type="hidden" name="TaskId" value="<?php echo $task['TaskId'];?>">
                        <button ><i class="fa fa-trash"></i></button>
                    </form></div>
	</div>
    <?php $i++; }?>
    <?php endforeach; ?>
 
    <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter"><?php echo " $i Tasks"; ?></div>

    <button class="mt-3 text-grey-dark bg-purple-300 p-2 rounded mt-1 border-b  " onclick="addTask()"><a href="add.php">Add a new task...</a></button>
   


      






  </div>

</div>
 </div>



 
  
<div class="bg-blue w-full p-8 flex justify-center font-sans">
<div class="rounded bg-grey-light w-64 p-2">

  <div class="flex justify-between py-1">
  	<h3 class="text-sm">Doing ..</h3>
    <svg class="h-4 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"/></svg>
  </div>
  <div class="text-sm mt-2">
  	<div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
        Start it!
	</div>
    <?php $i=0; ?>
    <?php foreach($tasks as $task):?>
        <?php if($task['TaskStatus'] == 'Doing'){?>
     <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
       <div class="flex items-center justify-between"><span style="font-weight:bold;"><?php echo $task['TaskName'];?></span ><span style="font-weight:bold;"><?php echo $task['TaskDeadline'];?></span><span class="bg-green-300 p-2 rounded mt-1 border-b  "><?php echo $task['TaskStatus'];?></span></div> 
       <div class="flex items-center justify-between">    
                        <form method="POST" class="me-1" action="update.php">
                        <input type="hidden" name="TaskId" value="<?php echo $task['TaskId'];?>">
                        <button type="submit" name="submit" ><i class="fa-solid fa-pen-to-square"></i></button>
                        <!-- <input type="submit" name="submit" class="btn btn-sm btn-warning"> -->
                        
                    </form>
                    <form method="POST" class="me-1" action="delete.php">
                        <input type="hidden" name="TaskId" value="<?php echo $task['TaskId'];?>">
                        <button ><i class="fa fa-trash"></i></button>
                    </form></div>
	</div>
    <?php $i++; }?>
    <?php endforeach; ?>

    <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter"><?php echo"$i tasks"; ?></div>

 
  </div>
 
</div>
</div>








   
<div class="bg-blue w-full p-8 flex justify-center font-sans">
<div class="rounded bg-grey-light w-64 p-2">

  <div class="flex justify-between py-1">
  	<h3 class="text-sm">Done ..</h3>
    <svg class="h-4 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"/></svg>
  </div>
  <div class="text-sm mt-2">
  	<div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
        Great work!
	</div>
    <?php $i=0; ?>
    <?php foreach($tasks as $task):?>
        <?php if($task['TaskStatus'] == 'Done'){?>

     <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
       <div class="flex items-center justify-between"><span style="font-weight:bold;"><?php echo $task['TaskName'];?></span ><span style="font-weight:bold;"><?php echo $task['TaskDeadline'];?></span><span class="bg-blue-300 p-2 rounded mt-1 border-b  "><?php echo $task['TaskStatus'];?></span></div> 
       <div class="flex items-center justify-between">    
                        <form method="POST" class="me-1" action="update.php">
                        <input type="hidden" name="TaskId" value="<?php echo $task['TaskId'];?>">
                        <button type="submit" name="submit" ><i class="fa-solid fa-pen-to-square"></i></button>
                        <!-- <input type="submit" name="submit" class="btn btn-sm btn-warning"> -->
                        
                    </form>
                    <form method="POST" class="me-1" action="delete.php">
                        <input type="hidden" name="TaskId" value="<?php echo $task['TaskId'];?>">
                        <button ><i class="fa fa-trash"></i></button>
                    </form></div>
	</div>
    <?php $i++; }?>
    <?php endforeach; ?>
 
    <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter"><?php echo " $i Tasks"; ?></div>
    
  </div>
  
</div>
</div>




</div>
<script >
const btn = document.querySelector('button.mobile-menu-button');
const menu = document.querySelector('.mobile-menu');
btn.addEventListener("click", ()=> {
menu.classList.toggle("hidden");
});
</script>
</body>
</html>