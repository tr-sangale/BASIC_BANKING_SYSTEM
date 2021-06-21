<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
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






#tejas {
    
    background:url(image.jpg);
    background-position: center; 
}
#icon{
    height: 50px; 
    width:50px ;
    padding-right: 10px;
    padding-bottom: 10px;   
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
.dsa{
    margin-bottom:50px;
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
        <a href="trasnfermoney.php">Transfer Money</a>
        <a href="transferhistorypage.php">Transfer History</a>
        <a href="contactpage.php">Contact Me</a>
        <a href="aboutpage.php">About</a>        
    </nav>


<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tgnbank";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>


<div class="container">
        <h2 class="th1" style="color : black;">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="dsa">
                    <table>
                        <thead style="color : black;"  class="kets">
                            <tr>
                            <th  class="th">Sr.No.</th>
                            <th  class="th">Customers Name</th>
                            <th  class="th">E-mail</th>
                            <th  class="th">Account No.</th>
                            <th  class="th">Address</th>
                            <th  class="th">Balance</th>
                            <th  class="th">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                    <td class="tentry"><?php echo $rows['id'] ?></td>
                    <td class="tentry"><?php echo $rows['name'] ?></td>
                    <td class="tentry"><?php echo $rows['email'] ?></td>
                    <td class="tentry"><?php echo $rows['acc_no'] ?></td>
                    <td class="tentry"><?php echo $rows['address'] ?></td>
                    <td class="tentry"><?php echo $rows['balance'] ?></td>
                        <td class="tentry"><a href="customerspage.php?id= <?php echo $rows['id'] ;?>"> <button class="btn btn-outline-dark btn"><b>View and Transact</b></button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>

         <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->

         
</body>
</html>