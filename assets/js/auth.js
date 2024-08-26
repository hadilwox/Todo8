const $ = document;

const getUrl = window.location.search;
const urlParams = new URLSearchParams(getUrl);
const valueLogin = urlParams.get("login");
const valueSignin = urlParams.get("signin");
console.log(valueSignin);
const msgAuth = $.getElementById("msg-auth");

const alertFalse =
  '<div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">\n' +
  '  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">\n' +
  '    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>\n' +
  "  </svg>\n" +
  '  <span class="sr-only">Info</span>\n' +
  '  <div class="ms-3 text-sm font-medium">\n' +
  "    There is a problem with your login or registration.\n" +
  "  </div>\n" +
  '  <button onclick="closeAlert()" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">\n' +
  '    <span class="sr-only">Close</span>\n' +
  '    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">\n' +
  '      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>\n' +
  "    </svg>\n" +
  "  </button>\n" +
  "</div>";

if (valueLogin === "false" || valueSignin === "false") {
  let alertElem = document.createElement("div");
  alertElem.innerHTML = alertFalse;
  msgAuth.appendChild(alertElem);
}

const closeAlert = () => {
  $.getElementById("alert-2").classList.add("hidden");
};
