<?php

$amount = 5000;
$sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $sanitizer ['first_name'];
$last_name = $sanitizer ['last_name'];
$email = $sanitizer ['email'];
$phone = $sanitizer ['phone'];
$product_name = "Meal Payment";

if (empty($first_name) || empty($last_name) || empty($email) || empty($phone)){
  header('location:index.php?error');
}
else{
  session_start();
  $_SESSION['first_name'] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['Meal Payment'] = $product_name;
  $_SESSION['amount'] = $amount;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayStack Integration</title>
    <link rel="stylesheet" href="css/pay.css">
    
</head>
<body>
<div class="container">
<h2> Hi <?php echo $email ?></h2>
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button> 
</form>
</div>
</body>
</html> 
<script>
  function payWithPaystack(){
    const api = 'pk_test_2eeeb3aed4d4d330c6456650c93f7987a89f077c';
    var handler = PaystackPop.setup({
      key: api,
      email: '<?php echo $email ?>',
      amount: <?php echo $amount ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1),  //generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname : "<?php echo $first_name?>";
      lastname : "<?php echo $last_name?>";
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $first_name ?>",
                variable_name: "<?php echo $last_name ?>",
                value: "<?php echo $phone ?>",
            }
         ]
      },
      callback: function(response){
          const reference = response.reference;
          window.location.href = 'success.php'+reference;
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
