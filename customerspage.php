<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgnbank";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
}

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Sorry! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('MONEY TRANSACTED SUCESSFULLY!');
                                     window.location='transferhistorypage.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    
<style>
*{
        margin: 0;
  padding: 0;
    }
    header {
    padding: 40px;
    background: linear-gradient(#008cff69,white);
    /* background-color: rgb(17, 124, 143); */
    background: url(sky01.jpg) no-repeat center center;
    
            } 
        header h1 {
    text-align: center;
    font-size: 40px;
    color: wheat; 
    text-shadow: 2px 2px #0a0808;
        }
         nav {
    /* background-color: #333; */
    overflow: hidden;
    /* background: linear-gradient(#ccccff,white); */
    background-color: black;
        } 
        nav a {
    text-decoration:none;
    padding: 20px;
    text-align: left; 
    float: left;
    color: white;
        }
        body{
    background: url(sky04.jpg) no-repeat center center;
  background-size: cover;
  
}
.th1{
    text-align:center;
    padding-top:30px;
}






.th{
    text-align:center;
}


table, th, td {
  border: 2px solid black;
  height: 42px;

}

table {
  width: 100%;
}
.tentry{
    text-align:center;
}
.kets{
  background:#ccccff;  
}



#icon{
    height: 50px;
    width:50px ;
    padding-right: 10px;
    padding-bottom: 10px;   
}
.trans{
display: flex;
align-items: center;
text-align:center;
}
.fy{
    text-align:center;
    margin-bottom:60px;
}
.sig{
   
}
</style>
</head>
<body>
<header>
       
        <h1> WELCOME TO THE GRIP NATIONAL BANK</h1>
        </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="listcustomerspage.php">Our Customers</a>
        <a href="transfermoneypage.php">Transfer Money</a>
        <a href="transferhistorypage.php">Transfer History</a>
        <a href="contactpage.php">Contact Me</a>
        <a href="aboutpage.php">About</a>        
    </nav>
   

   <div class="container">
        <h2 class="th1" style="color : black;">Transaction</h2>
            <?php
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "tgnbank";
           
               $conn = mysqli_connect($servername, $username, $password, $dbname);
           
               if(!$conn){
                   die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
               }
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table>
                <tr style="color : black;" >
                    <th class="th">Sr.no.</th>
                    <th class="th">Customers Name</th>
                    <th class="th">E-mail</th>
                    <th class="th">Account No.</th>
                    <th class="th">Address</th>
                    <th class="th">Balance</th>
                
                </tr>
                <tr style="color : black;">
                    <td class="tentry"><?php echo $rows['id'] ?></td>
                    <td class="tentry"><?php echo $rows['name'] ?></td>
                    <td class="tentry"><?php echo $rows['email'] ?></td>
                    <td class="tentry"><?php echo $rows['acc_no'] ?></td>
                    <td class="tentry"><?php echo $rows['address'] ?></td>
                    <td class="tentry"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <div class="fy">
        <a class="trans" style="color : black;"><b>Transfer To:</b></a>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tgnbank";
            
                $conn = mysqli_connect($servername, $username, $password, $dbname);
            
                if(!$conn){
                    die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
                }
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            </div>
            </select>
            <div class="fy">
     
        <br>
        <br>

            <a class="trans" style="color : black;"><b>Amount:</b></a>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                <button class="btn btn-outline-dark" name="submit" type="submit" id="myBtn" >Proceed</button>
            </div>
        </form>
    </div> 
</body>
</html>