
<?php
session_start();

require_once('../controller/usersController.php');

if(isset($_POST['submit'])){
  $loginUser = new UsersController();
  $loginUser->auth();
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
<body class="bg-gradient-to-r from-cyan-300 to-blue-500 w-full h-screen font-sans">
<!-- navbra -->
<nav
        class="flex items-center justify-between flex-wrap bg-gray-700 py-4 lg:px-12 shadow border-solid border-t-2 bg-gray-700 border-blue-700">
        <div class="flex justify-between lg:w-auto w-full lg:border-b-0 pl-6 pr-2  pb-5 lg:pb-0">
            <div class="flex items-center flex-shrink-0  mr-16">
                <span class="font-semibold text-white text-xl tracking-tight"><a href="home.php">TaskBoard</a></span>
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
    
        <div class="menu w-full lg:block flex-grow lg:flex lg:items-center lg:w-auto lg:px-3 px-8 mobile-menu">
        <div class="text-md font-bold text-indigo-100 lg:flex-grow">
        <a href="login.php"
                   class="block mt-4 lg:inline-block  lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                   Create Tasks
                </a>
        </div>
            <!-- This is an example component -->
  
            <div class="flex ">

<!-- check if user is logged in -->


    <a href="register.php" class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Sign up</a>
    <a href="login.php" class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">login</a>

            </div>
        </div>
    
    </nav>


  <!--login-->
  <form class=" min-h-screen flex flex-col" method="post">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
    <div class="w-full flex-col border bg-blue-100 bg-opacity-90 px-6 py-14 shadow-md rounded-[4px] " >

      <div class="mb-8 flex justify-center">
       <div class="text-2xl text-black "> Welcome back!</div>
      </div>
      <div class="flex flex-col text-sm rounded-md ">
        <input class="mb-5 rounded-[4px] border p-3 hover:outline-none focus:outline-none hover:border-yellow-500  " type="text" name="Email" placeholder="Email " />
        <input class="border rounded-[4px] p-3 hover:outline-none focus:outline-none hover:border-yellow-500" type="password" name="Password" placeholder="Password" />
      </div>
      <button class="mt-5 w-full border p-2 bg-gradient-to-r from-gray-800 bg-gray-500 text-white hover:bg-slate-400 scale-105 duration-300 rounded-[4px] " value="submit" name="submit" type="submit">Sign in</button>
      <div class="mt-5 flex justify-between text-lg text-black ">
        <div class="mt-5 flex justify-between text-sm   ">
        <a href="login.php">Sign up</a>
    </div>
      </div>
  
    </div>
</form>

<script >
const btn = document.querySelector('button.mobile-menu-button');
const menu = document.querySelector('.mobile-menu');
btn.addEventListener("click", ()=> {
menu.classList.toggle("hidden");
});
</script>


  </body>
  </html>
