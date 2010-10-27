<?

    // require common code
    require_once("includes/common.php"); 

    // escape username and password for safety
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);
    $password2 = mysql_real_escape_string($_POST["password2"]);
    
    // Test if input is valid
    if ($username == "")
        apologize("You need a valid username.");
    
    if ($password == "")
        apologize("You need a password.");
    
    if ($password != $password2)
        apologize("Your passwords do not match.");
    
    // prepare SQL
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($mysqli);
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    
    // execute query
    $success = $stmt->execute();

    // if insert failed, there is already a user with that username
    
    if ($success)
    {
        // grab uid
        $uid = $stmt->insert_id;
        
        // cache uid in session
        $_SESSION["uid"] = $uid;

        // redirect to portfolio
        redirect("index.php");
    }
    
    // else apologize
    apologize("Someone already has that username.");

?>
