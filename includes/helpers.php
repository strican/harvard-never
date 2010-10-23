<?

    /***********************************************************************
     * helpers.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     **********************************************************************/


    /*
     * void
     * apologize($message)
     *
     * Apologizes to user by displaying a page with message.
     */

    function apologize($message)
    {
        // require template
        require_once("apology.php");

        // exit immediately since we're apologizing
        exit;
    }


    /*
     * void
     * dump($variable)
     *
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */

    function dump($variable)
    {
        // dump variable using some quick and dirty (albeit invalid) XHTML
        if (!$variable && !is_numeric($variable))
            print("Variable is empty, null, or not even set.");
        else
            print("<pre>" . print_r($variable, true) . "</pre>");

        // exit immediately so that we can see what we printed
        exit;
    }


    /*
     * void
     * logout()
     *
     * Logs out current user (if any).  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */

    function logout()
    {
        // unset any session variables
        $_SESSION = array();

        // expire cookie
        if (isset($_COOKIE[session_name()]))
        {
            if (preg_match("{^(/~[^/]+/pset7/)}", $_SERVER["REQUEST_URI"], $matches))
                setcookie(session_name(), "", time() - 42000, $matches[1]);
            else
                setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }


    /*
     * stock
     * lookup($symbol)
     *
     * Returns a stock by symbol (case-insensitively) else NULL if not found.
     *
     * Relies on Microsoft for articles and Yahoo for everything else.
     */

    function lookup($symbol)
    {
        // open connection to Yahoo
        if (($fp = @fopen(YAHOO . $symbol, "r")) === FALSE)
            return NULL;

        // download first line of CSV file
        if (($data = fgetcsv($fp)) === FALSE || count($data) == 1)
            return NULL;

        // close connection to Yahoo
        fclose($fp);

        // ensure symbol was found
        if ($data[2] == 0.00)
            return NULL;

        // instantiate a stock object
        $stock = new stock();

        // remember stock's symbol and trades
        $stock->symbol = $data[0];
        $stock->name = $data[1];
        $stock->price = $data[2];
        $stock->time = strtotime($data[3] . " " . $data[4]);
        $stock->change = $data[5];
        $stock->open = $data[6];
        $stock->high = $data[7];
        $stock->low = $data[8];

        // return stock
        return $stock;
    }


    /*
     * void
     * redirect($destination)
     * 
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any XHTML.
     */

    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^http:\/\//", $destination))
            header("Location: " . $destination);

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $host = $_SERVER["HTTP_HOST"];
            header("Location: http://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }

?>

