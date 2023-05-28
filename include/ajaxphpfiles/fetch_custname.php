<?php

// include "../connect.php";

// if(isset($_POST['customer_id'])){

//     $cust_id = $_POST['customer_id'];

//     $sql = "select name from customers where id=$cust_id";
//     $result = mysqli_query($conn,$sql);
//     $row = mysqli_fetch_assoc($result);
//     $name = $row['name'];
//     echo $name;
//     // echo json_encode($name);
// }


?>

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

if (isset($_POST['roi']) && isset($_POST['principal'])){
    $roi = $_POST['roi'];
    $principal = $_POST['principal'];
    $installment = $principal * ($roi/100);
    echo $installment;
}
?>

