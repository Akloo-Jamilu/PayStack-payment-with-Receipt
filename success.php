<?php 

session_start();

require_once 'db.php';
if(!$_GET['successfullypaid']){
    header('location:index.php');
    exit;
}else{
    $reference = $_GET["successfullypaid"];
}
$first_name = $_SESSION['first_name'] ;
$last_name = $_SESSION['last_name'] ;
$email = $_SESSION['email'];
 $phone = $_SESSION['phone'];
 $amount = $_SESSION['amount'];
 $product_name = $_SESSION['Meal Payment'];


//insert into DB after payment



$sql = "INSERT INTO customers (first_name, last_name, email, phone, product_name, amount, reference )
            VALUES (:first_name, :last_name, :email, :phone, :product_name, :amount, :reference ) ";

$statement = $pdo ->prepare($sql);
$statement->execute([
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':email' => $email,
    ':phone'=> $phone,
    ':product_name' => $product_name,
    ':amount' => $amount,
    ':reference' => $reference
]);
if($statement->execute() ){
    echo "<script>alert('Your payment was successfull ') </script>" ;

    session_unset();
    session_destroy();
}else{
    die("Sorry somthing went wrong!");
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayStack</title>
    <link rel="stylesheet" href="css/pay.css">
    
</head>
<body>
    <style>
       
    </style>
    
        <div class="container">
            <h2>Payment successfull</h2>
            <table>
                <tr>
                    <th>Payment Sumary</th>
                </tr>
                <tr>
                    <td>First Name :  <?php echo $first_name ?> </td>
                </tr>
                <tr>
                    <td>Last  Name :  <?php echo $last_name ?></td>
                </tr>
                <tr>
                    <td>Email :  J<?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Phone : <?php echo $phone ?></td>
                </tr>
                <tr>
                    <td>Price :  <?php echo $amount ?></td>
                </tr>
                <tr>
                    <td>Product Name :  <?php echo $product_name ?></td>
                </tr>
                <tr>
                    <td>Reference :  <?php echo $reference ?></td>
                </tr>
                <tr>
                    <td><a href="#"  >Download</a></td>
                </tr>
            </table>
        </div>  <!-- end of container class -->
    
</body>
</html>