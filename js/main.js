function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

const flexAuto = document.getElementById("flex-auto");
const flexInitial = document.getElementById("flex-initial");
flexAuto.addEventListener("click", () => {
  flexInitial.style.display =
    flexInitial.style.display === "none" ? "block" : "none";
});

