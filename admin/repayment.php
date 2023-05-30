<?php 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repayments</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../include/js/repayment.js"></script>
    <style>
  .modal {
    display: none;
  }

  .modal-overlay {
    opacity: 0.5;
    z-index: -1;
  }

  .modal-header {
    border-color: #ddd;
  }
</style>


</head>

<body>
    <?php
    include "../include/navbar.php";
    ?>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-2">
            <!--      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Enter</h2> -->
            <form action="" method="POST">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 relative">
                        <input type="number" name="search-loanid" id="search-loanid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Loan ID" required>
                        <button type="submit" id="loanidsearchbutton" class="text-white absolute right-1 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div id="loaninfo"></div>




    <!-- model code -->

    <!-- <button id="openModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Open Modal</button> -->

<!-- <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
  <div class="modal-content bg-white text-gray-800 rounded shadow-lg w-1/2">
    <div class="modal-header flex justify-between px-4 py-3 border-b">
      <h3 class="font-bold">Modal Title</h3>
      <span class="close cursor-pointer">&times;</span>
    </div>
    <div class="modal-body p-4">
      <div>
        <label class="block mb-2">Input 1</label>
        <input type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Enter Input 1">
      </div>
      <div class="mt-4">
        <label class="block mb-2">Input 2</label>
        <input type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Enter Input 2">
      </div>
      <div class="mt-4">
        <label class="block mb-2">Input 3</label>
        <input type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Enter Input 3">
      </div>
      <div class="mt-4">
        <label class="block mb-2">Input 4</label>
        <input type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Enter Input 4">
      </div>
      <div class="mt-4">
        <label class="block mb-2">Input 5</label>
        <input type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Enter Input 5">
      </div>
    </div>
    <div class="modal-footer flex justify-end p-4 border-t">
      <button id="submitButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </div>
  </div>
</div> -->

</body>

</html>