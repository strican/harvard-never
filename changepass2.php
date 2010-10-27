<?

    // require common code
    require_once("includes/common.php"); 

    // escape username and password for safety
    $old = mysql_real_escape_string($_POST["old"]);
    $password = mysql_real_escape_string($_POST["new"]);
    $password2 = mysql_real_escape_string($_POST["new2"]);
    $uid = mysql_real_escape_string($_SESSION["uid"]);
    
    // Get user's old password
    $sql = "SELECT password FROM users WHERE uid=?";
    $stmt = mysqli_stmt_init($mysqli);
    $stmt->prepare($sql);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($true_old);
    $stmt->fetch();
    $true_old = mysql_real_escape_string($true_old);
    
    // Test if input is valid
    if ($old != $true_old)
        apologize("Your password is not correct.");
    
    if ($password == "")
        apologize("You need a new password.");
    
    if ($password != $password2)
        apologize("Your new passwords do not match.");
    
    // prepare SQL
    $sql = "UPDATE users SET password=? WHERE uid=?";
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $password, $uid);
    
    // execute query
    $success = $stmt->execute();

    // if insert failed, there is already a user with that username

    // redirect to portfolio
    if ($success)
        redirect("index.php");
    
    // else apologize
    apologize("Password not updated.");

?>
