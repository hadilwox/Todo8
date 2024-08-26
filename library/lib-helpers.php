<?php
function getCurrentUrl()
{
  return 1;
}

function diePage($message)
{
  echo "

 <script src='https://cdn.tailwindcss.com'></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style type='text/tailwindcss'>
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>

<div class='top-0 left-0 right-0 bottom-0 flex justify-center items-center w-full h-screen'>
    <p class='px-4 py-3 bg-red-400 text-gray-950 rounded-md border-red-950 shadow-2xl w-fit '>$message</p>
</div>
";
  die();
}

function errorMsg($message)
{
  echo $message;
}

function isAjax()
{
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    return true;
  }
  return false;
}

function dd($data)
{
  echo '<pre class="bg-gray-700/80 text-white m-5 p-5 z-50 rounded-2xl relative	">';
  var_dump($data);
  echo '</pre>';
}