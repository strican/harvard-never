<?

    // require common code
    require_once("includes/common.php"); 

    // escape username and password for safety
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);

    // prepare SQL
    $sql = "SELECT uid FROM users WHERE username=? AND password=?";

    $stmt = mysqli_stmt_init($mysqli);
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    // execute query
    $stmt->execute();
    $stmt->bind_result($uid);
    
    // if we found a row, remember user and redirect to portfolio
    while ($stmt->fetch())
    {
        // cache uid in session
        $_SESSION["uid"] = $uid;

        // redirect to portfolio
        redirect("index.php");
    }

    // else report error
    apologize("Invalid username and/or password!");

?>

