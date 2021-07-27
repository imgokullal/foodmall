<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$sql="SELECT name,email,phone,pincode,picture FROM shopreg WHERE email='$username' OR phone='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
$row = $result->fetch_assoc();
}
else {
  echo "0 results";
}
?>
<html>
    <head>
        <title>
            Profile
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/foodmall/css/userprofile.css">
    </head>
    <body id="profile-body">
        <?php include ('../components/shopheader.php'); ?>
        <div id="profile-container">
        <img src="<?php echo $row['picture']; ?>" id="profile-image">
          <div id="profile-details">
           <br>
            <table id="profile-table">
              <tr id="profile-row">
                <td id="profile-td">
                
                  <label id="profile-label"> Name</label><br>
                <div id="profile-item"><p id="profile-text"><?php print($row['name']); ?></p></div>
                
                </td>
                <td id="profile-td">
                  
                  <label id="profile-label">Mobile NO</label> <br>
                  <div id="profile-item"><p id="profile-text"><?php print($row['phone']); ?></p></div>
                
                </td>
              </tr>
              <tr id="profile-row">
                <td id="profile-td">
                  
                  <label id="profile-label"> Email</label><br>
                  <div id="profile-item"><p id="profile-text"><?php print($row['email']); ?></p></div>
                
                </td>
                <td id="profile-td">
                  
                  <label id="profile-label">Pincode</label><br>
                  <div id="profile-item"><p id="profile-text"><?php print($row['pincode']); ?></p></div>
                
                </td>
              </tr>
            </table>
            <hr>
            <div id="change-links">
            <a href="http://localhost/foodmall/components/shopchangepincode.php" id="change-pincode">change pincode </a>
            <a href="http://localhost/foodmall/components/shopchangepassword.php"id="change-password">Change Password</a>
            </div>
        
          </div>
        
        </div>
        <?php include ('../components/footer.php'); ?>

    </body>
</html>