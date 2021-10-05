<?php
//
// Try out from the command line using:
//    $ php -e -r 'parse_str("x=10&y=22", $_GET); include "demo2.php";'
// Or, from a browser with the URL:
//    sbsrv1.cs.nuim.ie/fyp/diallo/demo2.php?x=11&y=23
//
// This echoes the request details back in HTML format
// And also saves the request to file: demo2.log
//

$timestamp = date(DATE_RFC2822);
file_put_contents('demo2.log', "Log at: $timestamp".PHP_EOL, FILE_APPEND | LOCK_EX);

if (isset($_SERVER['REQUEST_URI'])) {
   $req = $_SERVER['REQUEST_URI'];
   file_put_contents('demo2.log', $req.PHP_EOL , FILE_APPEND | LOCK_EX);
}

echo("<html><body>");
foreach ($_GET as $key => $value) {
   echo "<p>$key = $value</p>".PHP_EOL;
   file_put_contents('demo2.log', "$key => $value".PHP_EOL , FILE_APPEND | LOCK_EX);
}

$json_str = json_encode($_GET);

echo("<p>json string of request=");
echo($json_str);
echo(PHP_EOL);

echo("</body></html>");

// Convert the json string to a json object for later use...

$json_obj = json_decode($json_str);

// Or you could create a new string with just the value you want, and convert that...

?>
