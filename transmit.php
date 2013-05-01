<?php
include('auth.php');

ini_set( 'default_charset', 'UTF-8' );

session_start();
$freq = $_POST['freq'];
$power = $_POST['power'];
$message = $_POST['message'];
$pnumber = $_SESSION['pnumber'];
$date=date( 'F jS, Y g:i:s a e' );

function makeTheText()
{
    global $pnumber;
    echo 'Sending Text</br>';
   // shell_exec('/Users/soltrain/Documents/DalianARG/xt.sh $pnumber' . "> /dev/null 2>/dev/null &" );
   // $PID = shell_exec("nohup /Users/soltrain/Documents/DalianARG/text.sh $pnumber > /dev/null & echo $!");
   //$PID = shell_exec("/Users/soltrain/Documents/DalianARG/text.sh 13478711794  2>&1");
    $PID = shell_exec("/Users/soltrain/Sites/DalianARG/text.sh $pnumber > /dev/null 2>/dev/null & ");
    
}

function makeTheCall()
{
    global $pnumber;
    echo 'Making Call</br>';
    $PID = shell_exec("/Users/soltrain/Sites/DalianARG/call.sh $pnumber > /dev/null 2>/dev/null & ");
  /* code to call from php rather than from the script  
    global $pnumber;
    $pnumber = "+86" . $pnumber; 
    echo $pnumber;
    // Include the Twilio PHP library
    require '/Users/soltrain/Sites/twilio-php/Services/Twilio.php';
    // Twilio REST API version
    $version = "2010-04-01"; 
    // Set our Account SID and AuthToken
    $sid = 'AC6d1e6f7497f9f28b227762c9c4656280';
    $token = '479b4c1e185f75db874e83035f9ba470';
    // A phone number you have previously validated with Twilio
    $twilionumber = '4157499876';
    // Instantiate a new Twilio Rest Client
    $client = new Services_Twilio($sid, $token, $version);


    try 
    {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            $twilionumber, // The number of the phone initiating the call
            $pnumber, // The number of the phone receiving call
            'http://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
            );
        echo 'Started call: ' . $call->sid;
    } 
    catch (Exception $e) 
    {
        echo 'Error: ' . $e->getMessage();
    }

*/
}


if ($freq <= 0 OR $power <= 0)
{
    echo "Frequency and Power must be integers greater than 0</br>";
    echo "<meta http-equiv='refresh' content='3; control.html' />";
    die;
}

if ( empty($message) )
{
    echo "Message to transmit cannot be empty: 无字";
    echo "<meta http-equiv='refresh' content='3; control.html' />";
    die;
}

if ($message == "magic")
{
    echo "Doing Magic Stuff.</br>";
    $fp = fopen("correctentries.txt", "a") or die('ERROR:Could not open file!');
    $savestring = "$pnumber, $date\n";
    fwrite($fp, $savestring);
    fclose($fp);
    makeTheText();
    makeTheCall();

}

else
{
    echo "No magic here.";
    $fp = fopen("failedentries.txt", "a") or die('ERROR:Could not open file!');
    $savestring = "$pnumber, $message, $date \n";
    fwrite($fp, $savestring);
    fclose($fp);
}

echo "Freq: $freq <br/> Power: $power <br/> Message: $message";
echo "<br/> User Phone number: $pnumber";
echo "<h1>Your data has been transmitted sucessfully</h1>";

?>