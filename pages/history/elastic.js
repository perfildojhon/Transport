const $navigation_agent = document.getElementById('navigation');

isVisible = false;

function ModifyNavigator() {
  //
  if (isVisible) {
    //
    $navigation_agent.style.display = "none";
  } else {
    //
    $navigation_agent.style.display = "block";
  }
}

function ChangePopupState() {
  ModifyNavigator();
  if (isVisible) {
    //
    isVisible = false;
  } else {
    //
    isVisible = true;
  }
  console.log("A visibilidade foi trocada para", isVisible);
}
