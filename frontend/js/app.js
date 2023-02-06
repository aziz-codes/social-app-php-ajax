let loggedIn = localStorage.getItem("user");
if (!loggedIn) {
  window.location.href = "login.html";
}
console.log("loggin");
const header = document.getElementById("header");

header.innerHTML = `<section class="w-full flex flex-row justify-between px-2 items-center">
        <div>
          <img src="./assets/icon.png" class="h-8 w-8 rounded-full" />
        </div>
        <div class="flex gap-4">
          <a href="#" class="active active:text-sky-500">Home</a>
          <a href="#">Friends</a>
          <a href="#">Messanger</a>
          <a href="#">Settings</a>
        </div>
        <div class="h-9 w-9 rounded-full">
          <img
            class="h-full w-full rounded-full p-0.5 border border-slate-200 cursor-pointer"
            id="avatar"
            onclick="logout();"
          />
        </div>
      </section>`;
