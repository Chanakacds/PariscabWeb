<?php
//die(var_dump($_POST));
// $conn =  mysqli_connect("localhost", "root", "", "myguests");
// mysqli_select_db($conn, "myguests") or die("Cannot connect to database");
$qc_data = "";
$qc_from = " ";
$qc_to = " ";
//$qc_to2 = "";
//$qc_passengers1 = "";
//$price = "";
//$finalvalue = "";

$time="";
$date="";

$qc_to = "";
$qc_passengers = "";
$price = "";
// $conn = mysqli_connect("localhost", "root", "","myguests");
// 	mysqli_select_db($conn,"myguests") or die("Cannot connect to database");

    if (array_key_exists('qc_to', $_REQUEST)) {
        $qc_from = $_REQUEST['qc_from'];
        $qc_to = $_REQUEST['qc_to'];
        
       $qc_passengers =  $_REQUEST['qc_passengers'];
    }


//$dropoff =  $_REQUEST['dropoff'];
//$e=23;
//$date =$_REQUEST['myDate'];
//$time = $_REQUEST['appt-time'];


//$passengers = $children + $adults;
if($qc_passengers<3)
	$qc_passengers = 3;

$sql = "Select * from pricelist Where Passenger='$qc_passengers' and ((Location1 ='$qc_from'and Location2 ='$qc_to')or(Location1 = '$qc_to'and Location2='$qc_from'))";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
        	{
		$price = $row["Price"];		
       //echo "€" . $price.".00";
      
    }
	//$sql2="INSERT INTO final_cal (pickup, dropoff,date,time,price,Passanger) VALUES ('$pickup','$dropoff','$date','$time','$price','$passengers')";
	  // mysqli_query($conn, $sql2);
	  // header("location: form.php");
}
    
 else {
   // echo "0 results";
}

$qc_from = "";
$qc_to = "";
$qc_passengers = "";
$price = "";


if (array_key_exists('qc_to', $_REQUEST)) {

    $qc_from = $_REQUEST['qc_from'];
    $qc_to = $_REQUEST['qc_to'];
    $qc_passengers =  $_REQUEST['qc_passengers'];
    $date =$_REQUEST['myDate'];
     $time = $_REQUEST['time'];
   

    //$dropoff =  $_REQUEST['dropoff'];
    $e = 23;
    //$date =$_REQUEST['myDate'];
    //$time = $_REQUEST['appt-time'];


    //$passengers = $children + $adults;
    $qcp = $qc_passengers;
    if ($qcp < 3)
        $qcp = 3;

    $sql = "Select * from pricelist Where Passenger='$qcp' and ((Location1 ='$qc_from'and Location2 ='$qc_to')or(Location1 = '$qc_to'and Location2='$qc_from'))";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $price = $row["Price"];
            // echo "€" . $price.".00";
           
        }
        //$sql2="INSERT INTO final_cal (pickup, dropoff,date,time,price,Passanger) VALUES ('$pickup','$dropoff','$date','$time','$price','$passengers')";
        // mysqli_query($conn, $sql2);
        // header("location: form.php");
    } else {
        //  echo "0 results";
        $price = 0;
    }
}








?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Paris Private Cabs Booking</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="assets/css/tab-menu.css">
        <link rel="stylesheet" href="assets/css/booking.css">
        <link rel="import" href="index.html">

        <script src="https://kit.fontawesome.com/853d977552.js" crossorigin="anonymous"></script>


    </head>

    <body>
        <header>
            <nav class="navbar navbar-light navbar-expand-md fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav mx-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html" style="color: rgba(255,255,255,0.9);">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="booking.php" style="color: rgba(255,255,255,0.9);">Book Now</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color: rgba(255,255,255,0.9);">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto lag-nav social-nav">
                            <li class="nav-item" role="presentation" href="#">
                                <a class="nav-link social facebook" href="#"></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link social instagram" href="#"></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link social twitter" href="#"></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto lag-nav">
                            <li class="nav-item" role="presentation" href="#">
                                <a class="nav-link active en-lang" href="#"></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link es-lang" href="#"></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link it-lang" href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section class="booknow">
            <div class="booknow-div">
                <div class="title">
                    <span class="border"> Book Now </span>
                </div>
            </div>
            <div class="booking-form">
                <div class="traval-location-div">
                    <!-- <h3 class="loaction-h3">
                        <?php echo ""   . $qc_from . ""; ?> to
                        <?php echo ""   . $qc_to . ""; ?>
                    </h3> -->

                </div>
                <form action="email.php" method="post">
                    <input name="from" type="hidden" value="<?php echo " "  . $qc_from. " "; ?>" />
                    <input name="to" type="hidden" value="<?php echo " "  . $qc_to. " "; ?>" />
                    <h2>Billing Information</h2>
                    <div class="form-row">
                        <div class="col">
                            <label class="lable-form" for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                        </div>
                        <div class="col">
                            <label class="lable-form" for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="lable-form" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col">
                            <label class="lable-form" for="phoneno">Phone No</label>
                            <input type="tel" name="phone" class="form-control" id="phoneNo" placeholder="Phone No" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-row">
                                <div class="col">

                                    <label for="pickfrom" class="lable-form ">Pickup</label>
                                    <div class="form-select form-select-booking">
                                        <select name="qc_from" class="custom-select s-select select-from select-booking" value=<?php echo "" . $qc_from . ""; ?> required>
                                                 
                                    <option value="" selected><strong>From</strong></option>
                                    <option value=<?php echo ""   . $qc_from . ""; ?>selected><strong><?php echo ""   . $qc_from . ""; ?></strong></option>
                                    <option value="CDG Airport">CDG Airport</option>
                                    <option value="Beauvais Airport">Beauvais Airport</option>
                                    <option value="Orly Airport">Orly Airport</option>
                                    <option value="Paris">Paris or Paris train stations</option>
                                    <option value="Disneyland">Disneyland (Any Hotel / Address)</option>
                                    <option value="LA DEFENSE">LA DEFENSE</option>
                                    <option value="VERSAILLES">VERSAILLES</option>
                                    <option value="Parc Asterix">Parc Asterix</option>
                    
                                </select>

                                    </div>

                                </div>
                                <div class="col">
                                    <label for="dropoffto" class="lable-form">Dropoff</label>
                                    <div class="form-select form-select-booking">
                                        <select class="custom-select s-select select-to select-booking" name="qc_to" value=required>
                    
                                    <option value="0" selected> To </option>
                                    <option value="0" selected> <?php echo " "  . $qc_to. " "; ?> </option>
                                    <option value="CDG Airport">CDG Airport</option>
                                    <option value="Beauvais Airport">Beauvais Airport</option>
                                    <option value="Orly Airport">Orly Airport</option>
                                    <option value="Paris">Paris or Paris train stations</option>
                                    <option value="Disneyland">Disneyland (Any Hotel / Address)</option>
                                    <option value="LA DEFENSE">LA DEFENSE</option>
                                    <option value="VERSAILLES">VERSAILLES</option>
                                    <option value="Parc Asterix">Parc Asterix</option>
                    
                                </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-row">
                                <div class="col">
                                    <label for="pickupdate" class="lable-form">Pickup Date</label>
                                    <input type="date" name="date" id="inputdate" class="form-control" value=<?php echo "" . $date . ""; ?> required>
                                </div>
                                <div class="col">
                                    <label for="pickuptime" class="lable-form">Pickup Time</label>
                                    <input type="time" name="time" id="inputtime" class="form-control" value=<?php echo "" . $time . ""; ?> required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <label class="lable-form" for="ordernote">Order Note (Optional)</label>
                        <textarea class="form-control" id="ordernote" rows="3" name="note" placeholder="Note about your order, e.g.: special note for delivery."></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="lable-form" for="passangers">Passangers</label>
                            <input name="passengers" type="text" class="form-control" value="<?php echo " ". $qc_passengers; ?>
                      
                        " readonly />
                        </div>
                        <div class="col">
                            <label class="lable-form" for="luggages">Luggages (Optional)</label>
                            <input name="luggages" type="number" class="form-control" placeholder="">
                        </div>
                    </div>
                    <h2 class="orderview-h2">Order Review</h2>
                    <div class="orderReview">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Bill</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">Reservation</td>
                                    <td><span id="price-amount amount"><?php echo "€" . $price .  ".00"; ?>

                                        <span class="currencySymbol"></span></span>
                                    </td>
                                </tr>
                                <script>
                                    function executeQuickCalc() {
                                        if ($(qc_from).val() == "" || $(qc_to).val() == "" || $(qc_passengers).val() == "") {} else {
                                            var url = "price.php";
                                            $("#price-amount amount").html('<img src="reservations/loading.gif" height="15">').show();
                                            $.post(url, {
                                                qc_passengers: $("#qc_passengers").val(),
                                                qc_from: $("#qc_from").val(),
                                                qc_to: $("#qc_to").val()
                                            }, function(data) {
                                                $("#price-amount amount").html(data).show();
                                            });
                                        }
                                    }
                                </script>
                                <tr>
                                    <td colspan="2"><strong>Sub Total</strong></td>
                                    <td><span id="price-amount amount"><strong><?php echo "€" . $price .   ".00"; ?>
                                            <span class="currencySymbol"></span></strong>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <td colspan="2"><strong>Total</strong></td>
                                    <td><span class="price-amount amount"><strong><?php echo "€" . $price .   ".00"; ?>
                                            <?php // echo "" .  $finalvalue.".00";
                                            ?><span class="currencySymbol"></span></strong>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label terms-label" for="customCheck1">I have read and agree to the
                            website <span class="terms">terms and conditions. </span> </label>
                        </div>
                        <center>
                            <button class="btn btn-primary place-order-btn" name="submit" type="submit">Place Order</button>
                        </center>
                    </div>
                </form>

        </section>

        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Services</h3>
                            <ul>
                                <li><a href="#">Web design</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Hosting</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>About</h3>
                            <ul>
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3>Company Name</h3>
                            <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                        </div>
                        <div class="col item social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </footer>
        </div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>


    </body>

    </html>