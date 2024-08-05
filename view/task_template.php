<?php
global $task;
echo implode('-', $task) . ' , ' . rand(0, 99);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/input.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
        },
      },
    };
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

  <title><?= SITE_NAME ?></title>
</head>

<body class="bg-gray-900">
  <section class="max-w-6xl mx-auto flex flex-col items-center justify-center bg-gray-800">
    <!-- start header -->
    <div class="header max-h-16 w-full bg-slate-700 py-4 px-7 flex flex-row justify-between">
      <div class="dashboard">
        <h1 class="text-gray-100 font-black text-2xl">Todo8</h1>
      </div>
      <div class="profile flex flex-row-reverse items-center gap-2">
        <div class="w-12">
          <img class="w-full" src="../assets/uploads/user1.png" alt="" />
        </div>
        <div>
          <span class="text-gray-100">Hadi Hashemi</span>
        </div>
        <div>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6 text-gray-100 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </span>
        </div>
      </div>
      <!-- start dropProfile -->
      <div class="hidden dropProfile w-52 fixed top-[4.75rem] right-52 text-center bg-gray-800 rounded-md py-2 px-6">
        <ul>
          <li class="text-gray-100 my-3"><a href="#">Change Password</a></li>
          <li class="text-blue-800 my-3"><a href="#">Log Out</a></li>
        </ul>
      </div>
      <!-- end dropProfile -->
    </div>
    <!-- end header -->

    <div class="body w-full">
      <!-- start folders -->
      <div class="folders w-80 bg-slate-900 px-5 py-3 absolute min-h-screen top-16">
        <ul>
          <!-- start item folder -->
          <a href="#">
            <li class="py-2 px-4 my-3 flex gap-2 hover:bg-gray-700 rounded-md transition-all">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-gray-100">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
              </svg>

              <span class="font-bold text-xl text-gray-100">All</span>
            </li>
          </a>
          <!-- end item folder -->
        </ul>
      </div>
      <!-- end folders -->

      <!-- start tasks -->
      <div class="tasks pl-80 min-h-screen">
        <div class="bodyTask py-5 px-10">
          <div class="addTask">
            <!-- start input -->

            <label for="Task_Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
              Name</label>
            <div class="flex flex-row gap-5">
              <input type="text" id="Task_Name"
                class="max-w-2xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Do Something" required />
              <button type="submit"
                class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add
              </button>
            </div>
            <!-- end input -->
          </div>
          <div class="showTasks mt-10">
            <!-- start one task -->
            <div
              class="task flex flex-row items-center justify-between px-4 py-3 my-3 bg-gray-700 shadow-xl rounded-md">
              <div>
                <p class="text-gray-100 font-medium text-lg">
                  Do My Home Work
                </p>
              </div>
              <div class="icons flex flex-row gap-3">
                <a href="#" class="tick rounded-full bg-green-600 p-1.5 hover:bg-green-800">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5 text-white font-bold">
                    <path fill-rule="evenodd"
                      d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                      clip-rule="evenodd" />
                  </svg>
                </a>

                <a href="#" class="trash rounded-full bg-red-600 p-1.5 hover:bg-red-800">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>
                </a>
              </div>
            </div>
            <!-- end one task -->
            <div
              class="task flex flex-row items-center justify-between px-4 py-3 my-3 bg-gray-900 shadow-xl rounded-md">
              <div>
                <p class="text-gray-100 font-medium text-lg line-through">
                  Go Gym
                </p>
              </div>
              <div class="icons flex flex-row gap-3">
                <a href="#" class="remove rounded-full bg-red-600 p-1.5 hover:bg-red-800">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>
                </a>

                <a href="#" class="trash rounded-full bg-red-600 p-1.5 hover:bg-red-800">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end tasks -->
    </div>
  </section>
</body>

</html>