const inputFolder = $("input#folderName");
const inputTask = $("#taskName");
const btnDelete = $(".delete-item");
const modal = $("#popup-modal");

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined
        ? true
        : decodeURIComponent(sParameterName[1]);
    }
  }
  return false;
};

let folderId = getUrlParameter("folderId");
// console.log(urlParams.has('order'));

$(document).ready(function () {
  // click add for folder
  $("#btnAddFolder").click(function () {
    AddFolderajax();
  });

  // Enter add for folder
  $("#folderName").on("keydown", function (event) {
    if (event.originalEvent.key == "Enter") {
      AddFolderajax();
    }
  });

  // click add for task
  $("#btnAddTask").click(function () {
    AddTaskAjax();
  });

  // Enter add for task
  $("#taskName").on("keydown", function (event) {
    if (event.originalEvent.key == "Enter") {
      AddTaskAjax();
    }
  });
});

// add task with ajax

function AddTaskAjax() {
  $.ajax({
    url: "library/lib-ajaxHandler.php",
    method: "post",
    data: { action: "addTask", folderId: folderId, taskName: inputTask.val() },
    success: function (res) {
      console.log(res);

      if (res == 0) {
        invalidAction();
      } else if (res == 1) {
        smallName();
      } else {
        let newTask =
          '<div class="task flex flex-row items-center justify-between px-4 py-3 my-3 bg-gray-700 shadow-xl rounded-md"> <div> <p class="text-gray-100 font-medium text-lg">' +
          inputTask.val() +
          '</p> </div> <div class="icons flex flex-row gap-3"> <a href="?status=' +
          res +
          '" class="tick rounded-full bg-green-600 p-1.5 hover:bg-green-800"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-white font-bold"> <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd"></path> </svg> </a> <a href="?deleteT=' +
          res +
          '" class="trash rounded-full bg-red-600 p-1.5 hover:bg-red-800"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white"> <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path> </svg> </a> </div> </div>';

        $(newTask).appendTo("#allTasks");
      }
      emptyInput();
      location.reload(true);
    },
  });
}

// add folder with ajax

function AddFolderajax() {
  $.ajax({
    url: "library/lib-ajaxHandler.php",
    method: "post",
    data: { action: "addFolder", folderName: inputFolder.val() },
    success: function (res) {
      if (res == 0) {
        invalidAction();
      } else if (res == 1) {
        smallName();
      } else {
        let newFolder2 =
          '<li> <div class="w-full py-2 px-4 my-3 flex gap-2 hover:bg-gray-700 rounded-md transition-all justify-between items-center"> <a href="?folderId=' +
          res +
          '" class="flex flex-row gap-2 justify-start items-center"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-100">"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" /> </svg> <span class="font-bold text-xl text-gray-100"> ' +
          inputFolder.val() +
          '</span> </a> <span data-id="' +
          res +
          '" class="delete-item cursor-pointer block rounded-full border-red-500 border p-1.5 group hover:bg-red-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-red-500 group-hover:text-white"> <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /> </svg> </span> </div> </li>';

        // let newFolder =
        //   '<li> <div class="w-full py-2 px-4 my-3 flex gap-2 hover:bg-gray-700 rounded-md transition-all justify-between items-center"> <a href="?folderId=' +
        //   res +
        //   '" class="flex flex-row gap-2 justify-start items-center"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-100"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"></path> </svg> <span class="font-bold text-xl text-gray-100">' +
        //   inputFolder.val() +
        //   '</span> </a> <a href="?deleteId=' +
        //   res +
        //   '" class="block rounded-full border-red-500 border p-1.5 group hover:bg-red-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-red-500 group-hover:text-white"> <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path> </svg> </a> </div> </li>';

        $(newFolder2).appendTo("#allFolder");
      }
      emptyInput();
      location.reload(true);
    },
  });
}

function deleteFolder() {
  let dataId = "";
  btnDelete.click(function () {
    dataId = $(this).attr("data-id");
    modal.removeClass("hidden");
    modal.addClass("flex");

    $("#delete-btn").click(function () {
      $(this).attr("href", "http://localhost/Todo8/?deleteId=" + dataId);
    });
  });

  $(".close-modal").click(function () {
    modal.removeClass("flex");
    modal.addClass("hidden");
  });
}

function deleteTask() {
  let dataId = "";
  $(".delete-task-btn").click(function () {
    dataId = $(this).attr("data-id");
    $(".text-modal").html("Are you sure you want to delete this task ?");
    modal.removeClass("hidden");
    modal.addClass("flex");

    $("#delete-btn").click(function () {
      $(this).attr("href", "http://localhost/Todo8/?deleteT=" + dataId);
    });
  });
}

function emptyInput() {
  $(inputFolder).val("");
  $(inputTask).val("");
}

function invalidAction() {
  alert("Invalid Action");
}

function smallName() {
  alert("Your Name is too small");
}

function dropProfile() {
  $("#clickDropProfile").click(function () {

    $(".dropProfile").toggleClass("hidden");

  })
}

dropProfile()
deleteTask();
deleteFolder();
//href="?deleteT=<?= $tItem->id ?>"
