<?php
global $folder, $user, $task, $isFolder, $folderId;
require_once BASE_PATH . "view/layout/header.php";
?>
<title><?= SITE_NAME ?></title>
</head>

<body class="bg-gray-900">
  <!-- Modal for Delete Task Or Floder
start -->

  <div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden bg-slate-950/50 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg dark:bg-gray-700 shadow-xl">
        <button type="button"
          class="close-modal absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="popup-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="p-4 md:p-5 text-center">
          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <h3 class="text-modal mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
            delete this
            floder ?</h3>
          <a id="delete-btn" href="" data-modal-hide="popup-modal"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
            Yes, I'm sure
          </a>
          <button data-modal-hide="popup-modal" type="button"
            class="close-modal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
            cancel</button>
        </div>
      </div>
    </div>
  </div>


  <!-- end modal -->



  <section class="max-w-6xl mx-auto flex flex-col items-center justify-center bg-gray-800">
    <!-- start header -->
    <div class="header max-h-16 w-full bg-slate-700 py-4 px-7 flex flex-row justify-between">
      <div class="dashboard">
        <h1 class="text-gray-100 font-black text-2xl">Todo8</h1>
      </div>
      <div class="profile flex flex-row-reverse items-center gap-2">
        <div class="w-12">
          <img class="w-full" src="assets/uploads/user1.png" alt="Todo8 User" />
        </div>
        <div>
          <span class="text-gray-100"><?= $user->name ?></span>
        </div>
        <div>
          <span id="clickDropProfile">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6 text-gray-100 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </span>
        </div>
      </div>
      <!-- start dropProfile -->
      <div id="dropProfileItem" class="hidden dropProfile w-52 fixed top-[4.75rem] right-52 text-center bg-slate-800 rounded-md py-2 px-6 shadow-gray-900/70 shadow-md">
        <ul>
          <li class="text-red-600 font-semibold my-3"><a href="<?= BASE_URL ?>?logout=true">Log Out</a></li>
        </ul>
      </div>
      <!-- end dropProfile -->
    </div>
    <!-- end header -->

    <div class="body w-full">
      <!-- start folders -->
      <div class="folders w-80 bg-slate-900 px-5 py-3 absolute min-h-screen top-16">
        <!-- start add new folder -->
        <label for="folderName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
          Folder</label>
        <div class="flex items-center gap-2 justify-between">
          <input type="text" id="folderName" placeholder="Folder Name"
            class="block py-2 px-3 w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <button type="button" id="btnAddFolder"
            class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

          </button>

        </div>
        <!-- end add new folder -->

        <ul id="allFolder">
          <!-- start item folder -->
          <li>
            <div
              class="w-full py-2 px-4 my-3 flex gap-2 hover:bg-gray-700 rounded-md transition-all justify-between items-center">
              <a href="<?= BASE_URL ?>" class="flex flex-row gap-2 justify-start items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6 <?= !$isFolder ? 'text-green-600' : 'text-gray-100' ?>">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                </svg>

                <span class="font-bold text-xl <?= !$isFolder ? 'text-green-600' : 'text-gray-100' ?>">All</span>
              </a>
            </div>
          </li>
          <!-- end item folder -->
          <?php foreach ($folder as $item): ?>
            <li>
              <div
                class="w-full py-2 px-4 my-3 flex gap-2 hover:bg-gray-700 rounded-md transition-all justify-between items-center">
                <a href="?folderId=<?= $item->id ?>" class="flex flex-row gap-2 justify-start items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6 <?= isset($_GET['folderId']) && $_GET['folderId'] == $item->id ? 'text-green-600' : 'text-gray-100' ?>">">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                  </svg>

                  <span
                    class="font-bold text-xl <?= isset($_GET['folderId']) && $_GET['folderId'] == $item->id ? 'text-green-600' : 'text-gray-100' ?>"><?= $item->name ?></span>
                </a>
                <span data-id="<?= $item->id ?>"
                  class="delete-item cursor-pointer block rounded-full border-red-500 border p-1.5 group hover:bg-red-500">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-red-500 group-hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>

                </span>
              </div>
            </li>

          <?php endforeach; ?>

        </ul>
      </div>
      <!-- end folders -->

      <!-- start tasks -->
      <div class="tasks pl-80 min-h-screen">
        <div class="bodyTask py-5 px-10">
          <div class="addTask">

            <!-- start input -->

            <?php if (!isset($_GET['folderId'])): ?>
              <div class="text-center mb-5 ">
                <p class="blocktext-lg font-semibold text-gray-900 dark:text-white">choos a folder for add task</p>
              </div>
            <?php endif ?>

            <section class="inputTaskSection <?= !isset($_GET['folderId']) ? 'hidden' : '' ?> ">
              <label for="taskName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                Name</label>
              <div class="flex flex-row gap-5">
                <input type="text" id="taskName"
                  class="max-w-2xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Do Something" required />
                <button type="submit" id="btnAddTask"
                  class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Add
                </button>
              </div>
            </section>

            <!-- end input -->
          </div>
          <div id="allTasks" class="showTasks mt-10">
            <!-- start one task -->

            <?php foreach ($task as $tItem): ?>
              <div
                class="task flex flex-row items-center justify-between px-4 py-3 my-3  <?= $tItem->status == 1 ? 'bg-gray-900' : 'bg-gray-700' ?> shadow-xl rounded-md">
                <div>
                  <p class="text-gray-100 font-medium text-lg <?= $tItem->status == 1 ? 'line-through' : '' ?>">
                    <?= $tItem->title ?>
                  </p>
                </div>
                <div class="icons flex flex-row gap-3">

                  <?php if ($tItem->status == 1) { ?>

                    <a href="?statusId=<?= $tItem->id ?>&statusDone=<?= $tItem->status ?>"
                      class="remove rounded-full bg-red-600 p-1.5 hover:bg-red-800">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                      </svg>
                    </a>

                  <?php } else { ?>

                    <a href="?statusId=<?= $tItem->id ?>&statusDone=<?= $tItem->status ?>"
                      class="tick rounded-full bg-green-600 p-1.5 hover:bg-green-800">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-5 text-white font-bold">
                        <path fill-rule="evenodd"
                          d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                          clip-rule="evenodd" />
                      </svg>
                    </a>

                  <?php } ?>

                  <span data-id="<?= $tItem->id ?>"
                    class="delete-task-btn cursor-pointer trash rounded-full bg-red-600 p-1.5 hover:bg-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="size-5 text-white">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                  </span>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- end one task -->

          </div>
        </div>
        <!-- end tasks -->
      </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/task.js"></script>
</body>

</html>