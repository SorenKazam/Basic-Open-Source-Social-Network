console.log("main.js loaded! Have fun using JavaScript!");

/* DEBUG */
const debugMode = true;
const debbugBox = document.getElementById("debugBox");

if (debugMode) {
  debbugBox.style.display = "block";
} else {
  debbugBox.style.display = "none";
}
