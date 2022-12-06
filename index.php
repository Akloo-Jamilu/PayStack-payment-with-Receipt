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
<div class="main">

<div class="container">
    <div class="booking-content">
        <div class="booking-image">
            <img class="booking-img" src="images/abi.jpg" alt="Booking Image">
        </div>
        <div class="booking-form">
            <form action="pay.php" method="post">
                <h2>Make Your Payment</h2>
                <div class="form-group form-input">
                    <input type="text" name="first_name" value="" required/>
                    <label for="name" class="form-label">First Name</label>
                </div>
                <div class="form-group form-input">
                    <input type="text" name="last_name"  value="" required/>
                    <label for="name" class="form-label">Lastn Name</label>
                </div>
                <div class="form-group form-input">
                    <input type="email" name="email"  value="" required/>
                    <label for="name" class="form-label">Email</label>
                </div>
                <div class="form-group form-input">
                    <input type="tel" name="phone" value="" required />
                    <label for="phone" class="form-label">phone number</label>
                </div>
               
               
                
                <div class="form-submit">
                    <input type="submit" value="Pay" class="submit" id="submit" name="submit" />
                   
                </div>
            </form>
        </div>
    </div>
</div>

</div>
    
        <!-- <div class="container">
            <form action=" pay.php" method="POST">
                <label for=" ">First Name</label>
                <input type="text" name="first_name" placeholder="First Name">

                <label for=" ">Last Name</label>
                <input type="text" name="last_name" placeholder="Last Name">

                <label for=" ">Phone Number</label>
                <input type="tel" name="phone_number" placeholder="Phone Number">

                <label for=" ">Email Address</label>
                <input type="email" name="first_name" placeholder="Mail">

                <button type="submit" > SUBMIT</button>
            </form>  
        </div>   -->
    
</body>
</html>