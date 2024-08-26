<?php
require_once BASE_PATH . "view/layout/header.php";
?>
<title>login Todo8</title>
</head>

<body>



  <section class="bg-gray-50 dark:bg-gray-900">
     <div  id="msg-auth"  class=" pt-10 px-16 w-full">

     </div>


    <div class="w-7xl flex flex-col items-center justify-center px-6 md:h-screen">

      <a href="<?= BASE_URL ?>auth.php" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class="w-8 h-8 mr-2" src="<?= BASE_URL ?>assets/uploads/number-8.png" alt="logo" />
        Todo 8
      </a>


      <div class="flex w-[1200px] items-center justify-center">

        <!-- //// login ///// -->
        <div
          class="w-full mx-8 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              Login to your account
            </h1>
            <form class="space-y-4 md:space-y-6" action="<?= BASE_URL ?>auth.php" method="POST">
              <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                  email</label>
                <input type="email" name="emailLogin" id="emailLogin"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="name@company.com" autocomplete="off" required="" />
              </div>
              <div>
                <label for="password"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="passwordLogin" id="passwordLogin" placeholder="••••••••"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  autocomplete="new-password" required="" />
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="remember" aria-describedby="remember" type="checkbox"
                      class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                  </div>
                </div>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Forgot
                  password?</a>
              </div>
              <button type="submit" name="login"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Login
              </button>
            </form>
          </div>
        </div>

        <!-- //// sign in ///// -->
        <div
          class="w-full mx-8 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              Sign in to your account
            </h1>
            <form class="space-y-4 md:space-y-6" action="<?= BASE_URL ?>auth.php" method="POST">
              <div>
                <label for="usernamesign" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                  username</label>
                <input type="text" name="usernamesign" id="usernamesign"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="username" autocomplete="off" required="" />
              </div>
              <div>
                <label for="emailsign" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                  email</label>
                <input type="email" name="emailsign" id="emailsign"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="name@company.com" autocomplete="off" required="" />
              </div>
              <div>
                <label for="passwordsign"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="passwordsign" id="passwordsign" placeholder="••••••••"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  autocomplete="new-password" required="" />
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="remember" aria-describedby="remember" type="checkbox"
                      class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                      required="" />
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                  </div>
                </div>
              </div>
              <button type="submit" name="signin"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Sign in
              </button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
<script src="<?= BASE_URL ?>assets/js/auth.js"></script>
</body>

</html>