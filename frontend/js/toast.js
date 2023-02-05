let toast = "";

function makeToast() {
  toast += `<div class="absolute flex justify-center w-36 h-10 bg-red-500">
    <h4>Your error message</h4>
    </div > `;
  console.log("running toast");
  displayToast();
  function displayToast() {
    return setTimeout(() => {
      document.getElementById("id").style.display = "block";
    }, 2000);
  }
}

makeToast();
