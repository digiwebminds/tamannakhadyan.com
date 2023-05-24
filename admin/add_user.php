<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add User</title>
    <script src="../include/js/add_user.js"></script>
</head>
<body>
    <?php
include "../include/navbar.php";
    ?>
<section class="bg-gray-400">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Add Customers
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="dor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D.O.Registration </label>
                      <input type="date" name="dor" id="dor" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Father's Name</label>
                      <input type="text" name="fname" id="fname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                      <input type="textarea" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                      <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone No.</label>
                      <input type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                      <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="guarname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Guaranter Name</label>
                      <input type="text" name="guarname" id="guarname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="guarfaname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Guaranter Father Name</label>
                      <input type="text" name="guarfaname" id="guarfaname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="guaraddress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                      <input type="textarea" name="guaraddress" id="guaraddress" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="guarcity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                      <input type="text" name="guarcity" id="guarcity" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>
                  <div>
                      <label for="guarphone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone No.</label>
                      <input type="number" name="guarphone" id="guarphone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>                  
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>       
                  <div>
                      <label for="documents" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documents</label>
                      <input type="textarea" name="documents" id="documents" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                  </div>           
                  <button type="submit" class="w-full text-white bg-blue-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">Add Customer</button>
              </form>
          </div>
      </div>
  </div>
</section>
</body>
</html>