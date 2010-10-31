<?

    // require common code
    require_once("includes/common.php"); 

    // escape username and password for safety
    $message = mysql_real_escape_string($_POST["message"]);
    $sex = mysql_real_escape_string($_POST["sex"]);
    $class = mysql_real_escape_string($_POST["class"]);

    // Test if input is valid
    if ($message == "")
        apologize("Please enter a message.");
    
    if ($sex == "")
        apologize("Please provide your sex.");
    
    if ($class == "")
        apologize("Please provide your class information.");
    
    // prepare SQL
    $sql = "INSERT INTO moderator (message, sex, class) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($mysqli);
    $stmt->prepare($sql);
    $stmt->bind_param("sss", $message, $sex, $class);
    
    // execute query
    $success = $stmt->execute();

    // if insert failed, there is already a user with that username
    
    if ($success)
    {
        // grab uid
        $uid = $stmt->insert_id;
        
        // cache uid in session
        $_SESSION["uid"] = $uid;

        // redirect to confirmation page
        redirect("success.php");
    }
    
    // else apologize
    apologize("We're sorry. There was an error during submission. Please try again in a few minutes.");

?>
