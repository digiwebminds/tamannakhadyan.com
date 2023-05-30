<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
</body>
</html>
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
// echo "hello";

if (isset($_POST['roi']) && isset($_POST['principal'])) {
    $roi = $_POST['roi'];
    $principal = $_POST['principal'];
    $installment = $principal * ($roi / 100);
    echo $installment;
}


if (isset($_POST['loanid'])) {

$loanid = $_POST['loanid'];
$sql = "select c.name,c.fname,c.city,c.phone,c.photo,l.principle,l.dor,l.loan_type,l.installment,l.roi from customers as c 
JOIN loans as l on c.id=l.customer_id where l.id=$loanid";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
  <tbody>
  <tr class="border-b border-gray-200 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Name </th>
        <td class="px-6 py-4 border border-gray-700">'. $row['name'].'
        </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Father Name </th>
        <td class="px-6 py-4 border border-gray-700">'. $row['fname'].'
        </td>
        </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> City </th>
      <td class="px-6 py-4 border border-gray-700">'. $row['city'].'
      </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Principle Amount </th>
      <td class="px-6 py-4 border border-gray-700">'. $row['principle'].'
        </td>
      </tr>
      <tr class="border-b border-gray-200 dark:border-gray-700">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border border-gray-700"> Installment Amount </th>
      <td class="px-6 py-4 border border-gray-700">'. $row['installment'].'
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
      <td class="px-6 py-4 border border-gray-700"><button id="repaybutton" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Pay Installment</button>
      </td>
      </tr>
      </tbody>
      </table>
</div>';
    }
  }else {
    echo '<div class="flex p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Loan Not Found!</span> Enter Correct LoanID !
    </div>
  </div>';
  }
}
  ?>