<?php
include "../connect.php";

if (isset($_POST['customer_id'])) {
  $cust_id = $_POST['customer_id'];

  // Prepare the query using a parameterized statement
  $sql = "SELECT name FROM customers WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $cust_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $name = $row['name'];
    // echo json_encode($name);
  } else {
    echo 'Customer not found';
  }

  $stmt->close();
}

if(isset($_POST['principal'])){
  if(isset($_POST['roi'])){
    $roi = $_POST['roi'];
    $principal = $_POST['principal'];
    $installment = $principal * ($roi / 100);
    echo $installment;
  }
  if(isset($_POST['installment'])){
    $installment = $_POST['installment'];
    $principal = $_POST['principal'];
    $roi = ($installment/$principal)*100;
    echo $roi;
  }
}


if (isset($_POST['loanid'])) {

  $loanid = $_POST['loanid'];
  $sql = "select l.id,c.name,c.fname,c.city,c.phone,c.photo,l.principle,l.dor,l.loan_type,l.installment,l.roi from customers as c 
JOIN loans as l on c.id=l.customer_id where l.id=$loanid";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $loan_type = $row['loan_type'];
      echo '<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
  <table class="w-full text-sm text-left font-bold text-gray-500 dark:text-gray-900">
  <tbody>
  <tr class="border-b border-gray-200 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Name </th>
        <td class="px-6 py-4 border border-gray-700">' . $row['name'] . '
        </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Father Name </th>
        <td class="px-6 py-4 border border-gray-700">' . $row['fname'] . '
        </td>
        </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> City </th>
      <td class="px-6 py-4 border border-gray-700">' . $row['city'] . '
      </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Principle Amount </th>
      <td class="px-6 py-4 border border-gray-700">' . $row['principle'] . '
        </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Installment Amount </th>
      <td class="px-6 py-4 border border-gray-700">' . $row['installment'] . '
      </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Total Installment Till Today </th>
      <td class="px-6 py-4 border border-gray-700">change Here
      </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Paid Installments </th>
      <td class="px-6 py-4 border border-gray-700">change Here
      </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> UnPaid Installments </th>
      <td class="px-6 py-4 border border-gray-700">change Here
      </td>
      </tr>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Repay </th>
      <td class="px-6 py-4 border border-gray-700">
      <button id="openModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pay Installment</button>
      </td>
      </tr>
      </tbody>
      </table>
</div>';




      /// repayment modal below
      echo '<div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
<div class="modal-content bg-white text-gray-800 rounded shadow-lg w-1/2">
  
<form action="" method="POST">
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 p-4">
                  <div id="repaymentalert"></div>
                  <div>
                      <label for="dorepay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">D.O.Repayment</label>
                      <input type="date" name="dorepay" id="dorepay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                  </div>
                  <div>
                      <label for="loan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan ID</label>
                      <input type="number" name="loan_id" id="loan_id" value="' . $row['id'] . '" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required readonly>
                  </div>
                  <div>
                      <label for="loantype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan Type</label>
                      <input type="text" name="loantype" id="loantype" value="';

      if ($loan_type == 1) {
        echo "CC Loan";
      } elseif ($loan_type == 2) {
        echo "Daily Loan";
      } elseif ($loan_type == 3) {
        echo "Weekly Loan";
      } else {
        echo "Monthly Loan";
      }

      echo '" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required readonly>
                  </div>
                  <div>
                      <label for="install-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Installment Amount</label>
                      <input type="number" name="install-amount" id="install-amount" value="' . $row['installment'] . '" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                  </div>
                  
                  <button type="submit" id="repaysubmitbtnn" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                      Pay Installment
                  </button>
              </div>
          </form>
  
</div>
</div>

';
    }
  } else {
    echo '<div class="flex p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Loan Not Found!</span> Enter Correct LoanID !
    </div>
  </div>';
  }
}





// code to enter repayment details in database 

if (isset($_POST['dorepay']) && isset($_POST['loan_id']) && isset($_POST['installmentamt'])) {
  require_once "../connect.php";
  $dorepay = $_POST['dorepay'];
  $loan_id = $_POST['loan_id'];
  $installmentamt = $_POST['installmentamt'];

  $sql = "INSERT INTO `repayment` (`loan_id`, `DORepayment`, `installment_amount`) VALUES ('$loan_id', '$dorepay', '$installmentamt')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success !</span> Repayment Done Successfully
  </div>';
  }else{
    echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Alert !</span> There is some problem Please try Again !
  </div>';
  }
 
}


//interdependent code of last date of repayment and number of days
if(isset($_POST['dor'])){
  if(isset($_POST['days'])){
    $dor = strtotime($_POST['dor']);
    $days = $_POST['days'] * 86400;
    $ldorloan = $dor + $days;
    echo date("Y-m-d",$ldorloan);
  }
  if(isset($_POST['ldorloan'])){
    $dor = strtotime($_POST['dor']);
    $ldorloan = strtotime($_POST['ldorloan']);
    $days = $ldorloan - $dor;
    echo date("j",$days);
  }
}

//input fields according to loan category select
if(isset($_POST['tol'])){
  if($_POST['tol'] == 1){
    echo '<div class="w-full">
        <label for="principle-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Principle Amount</label>
        <input type="number" name="principle-amount" id="principle-amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
    </div>
    <div class="w-full">
        <label for="roi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate of Interest
        </label>
        <input type="text" name="roi" id="roi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required placeholder="%">
    </div>
    <div class="w-full">
        <label for="installment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Installment Amount
        </label>
        <input type="text" name="installment" id="installment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
    </div>';
  }
  if($_POST['tol'] == 2){
    echo '<div class="w-full">
        <label for="principle-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Principle Amount</label>
        <input type="number" name="principle-amount" id="principle-amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
    </div>
    <div class="w-full">
        <label for="roi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate of Interest
        </label>
        <input type="text" name="roi" id="roi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required placeholder="%">
    </div>
    <div class="w-full">
        <label for="installment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Installment Amount
        </label>
        <input type="text" name="installment" id="installment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
    </div>
    <div class="w-full">
        <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Amount
        </label>
        <input type="text" name="total" id="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
    </div>
    <div class="w-full">
        <label for="days" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days
        </label>
        <input type="text" name="days" id="days" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
    </div>
    <div class="w-full">
        <label for="ldorloan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last date of Repayment</label>
        <input type="date" name="ldorloan" id="ldorloan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
    </div>
    </div>';
  }
}