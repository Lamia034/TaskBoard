let taskIndex = 0;

document.getElementById("add-task-button").addEventListener("click", function() {
  // Incrémenter l'index de la tâche
  taskIndex++;

  // Récupérer les éléments de formulaire existants
  var taskContainer = document.getElementById("task-container");
  var task = taskContainer.getElementsByClassName("task")[0];

  // Créer de nouveaux éléments
  var newTask = task.cloneNode(true);
  newTask.getElementsByTagName("input")[0].name = "TaskName["+ taskIndex +"]";
  newTask.getElementsByTagName("input")[1].name = "TaskStatus["+ taskIndex +"][]";
  newTask.getElementsByTagName("input")[2].name = "TaskStatus["+ taskIndex +"][]";
  newTask.getElementsByTagName("input")[3].name = "TaskStatus["+ taskIndex +"][]";
  newTask.getElementsByTagName("input")[4].name = "TaskDeadline["+ taskIndex +"]";

  // Ajouter les nouveaux éléments au formulaire
  taskContainer.appendChild(newTask);
});
