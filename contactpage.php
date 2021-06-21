<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    background: url(sky01.jpg) no-repeat center center;
    
            } 
        header h1 {
    text-align: center;
    font-size: 40px;
    color: wheat; 
    text-shadow: 2px 2px #0a0808;
        }
         nav {
    overflow: hidden;
    background-color:black;
        } 
        nav a {
    text-decoration:none;
    padding: 20px;
    text-align: left; 
    float: left;
    color: white;
        }
.contact-section{
  background: url(sky02.jpg) no-repeat center;
  background-size: cover;
  padding: 40px 0;
}
.contact-section h1{
  text-align: center;
  color: #ddd;
}
.border{
  width: 100px;
  height: 10px;
  background: #34495e; 
  margin: 40px auto;
  margin-top: 10px;
}

.contact-form{
  max-width: 600px;
  margin: auto;
  padding: 0 10px;
  overflow: hidden;
}

.contact-form-text{
  display: block;
  width: 100%;
  box-sizing: border-box;
  margin: 16px 0;
  border: 0;
  background: #111;
  padding: 20px 40px;
  outline: none;
  color: #ddd;
  transition: 0.5s;
}
.contact-form-text:focus{
  box-shadow: 0 0 10px 4px #34495e;
}
textarea.contact-form-text{
  resize: none;
  height: 120px;
}
.contact-form-btn{
  float: right;
  border: 0;
  background: #34495e;
  color: #fff;
  padding: 12px 50px;
  border-radius: 20px;
  cursor: pointer;
  transition: 0.5s;
}
.contact-form-btn:hover{
  background: #2980b9;
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

<div class="contact-section">

  <h1>Contact Us</h1>
  <div class="border"></div>
  <form class="contact-form" action="index.html" method="post">
    <input type="text" class="contact-form-text" placeholder="Your name">
    <input type="email" class="contact-form-text" placeholder="Your email">
    <input type="text" class="contact-form-text" placeholder="Your phone">
    <textarea class="contact-form-text" placeholder="Your message"></textarea>
    <input type="submit" class="contact-form-btn" value="Send">
  </form>
</div>


  </body>
</html>