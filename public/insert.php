<!DOCTYPE html>
<html>

<head>

<title>Input Data</title>

</head>

<body>
   <center>
    <?php
      // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("GLVServer_MSSQLSERVER2014", "user", "p@ssw0rd", "CBinv");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $PoNumber =  $_REQUEST['PoNumber'];
        $PoDate = $_REQUEST['PoDate'];
        $VendorNo =  $_REQUEST['VendorNo'];
        $vendorname = $_REQUEST['vendorname'];
        $MataUang = $_REQUEST['MataUang'];
        $NilaiDalamRp = $_REQUEST['NilaiDalamRp'];
        $total = $_REQUEST['total'];


        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO vpsk_testc  VALUES ('$PoNumber',
            '$PoDate','$VendorNo','$vendorname','$MataUang', '$NilaiDalamRp', '$Total')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
 
            echo nl2br("\n$PoNumber\n $PoDate\n "
                . "$VendorNo\n $vendorname\n $MataUang\n $NilaiDalamRp\n $total");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    
    ?>
   </center>

</body>