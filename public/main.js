// Setting Up Variables
let theInput = document.querySelector(".add-task .task");
let tasksCount = document.querySelector(".tasks-count span");
let tasksCompleted = document.querySelector(".tasks-completed span");

// Focus On Input Field
window.onload = function () {
  theInput.focus();
};
  // Calculate All Tasks
  tasksCount.innerHTML = document.querySelectorAll('.tasks-content .unfinished').length;

  // Calculate Completed Tasks
  tasksCompleted.innerHTML = document.querySelectorAll('.tasks-content .finished').length;
