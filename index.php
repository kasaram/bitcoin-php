<?php
error_reporting(0);
include("./includes/db.php");
include("./includes/config.php");
include("./includes/header.php");

// config Blockchain account
$btc = 400;
$guid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxx';  // Blockchain account
$main_password = 'password'; // Blockchain pass
$second_password = 'password'; // Blockchain pass
$rate = 280;

$amount=$_POST['amount'];
$uid = mysql_real_escape_string($_SESSION['member']); //
$result = mysql_query("SELECT balance FROM users WHERE username='$uid'") or die("ERROR! CONTACT SUPPORT!");
$row = mysql_fetch_row($result);
$balance = $row[0];
$uid = mysql_real_escape_string($_SESSION['member']);
$ip = mysql_real_escape_string(VisitorIP());
$url = "https://blockchain.info/merchant/$guid/new_address?password=$main_password&second_password=$second_password&label=$uid";
if (isset($_POST['amount']))
{
    $_SESSION['USD_amount'] = $_POST['amount'];
    $_SESSION['BTC_amount'] = number_format($_SESSION['USD_amount']/$btc, 8, '.', '');
    $temp = _curl($url, '', '');
    $_SESSION['BTC_Address'] = get_string_between($temp, 'address":"', '"');     
}
if (!isset($_SESSION['USD_amount']) || $_SESSION['USD_amount'] < 2)
    die("WRONG");

if (isset($_POST['bitcoin']))
{

    $a = $_SESSION['BTC_Address'];
    $url = "https://blockchain.info/q/addressbalance/$a?confirmations=0";
    $page = _curl($url, '', '');
    if ($page > 0) {
        $amount = $page/10000000;

        if($amount>= $_SESSION['BTC_amount']){
        $y = $_SESSION['USD_amount'];
              $x = $balance+$y;
            $sql = "UPDATE users SET balance=$x WHERE username='$uid'";
            mysql_query($sql);

            $sql2 = "INSERT INTO orders(amount,username,lrpaidby,lrtrans,ip,state,date) VALUES('$y','$uid','$a','$a','$ip','PerfectMoney',now())";
            mysql_query($sql2);
            $messages = '<meta http-equiv="refresh" content="0; url=http://www.shop-pm.in/success.php" />';
            unset($_SESSION['USD_amount']);
        }else $messages = "<font color=red size=1>Payment not yet completed ... </font>";
    }else $messages = "<font color=red size=1>Payment not yet completed ... </font>";
}

$rezultati = mysql_query("SELECT email FROM users WHERE username='$uid'");
$rezls = mysql_fetch_row($rezultati);
$rez = $rezls[0];

?>

<html>
<head>
<script language="JavaScript">
  function selectText(textField)
  {
    textField.focus();
    textField.select();
  }
</script>


<link href="../images/favn.ico" rel="icon" />

<link rel="stylesheet" href="css99/normalize.css">
    <link rel="stylesheet" href="css99/style.css">
    <script src="js99/jquery.js" type="text/javascript"></script>
    <script src="js99/modernizr.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><title><?php echo htmlspecialchars($SHOP['maintitle'], ENT_QUOTES, 'UTF-8'); ?></title>

<link href="favicon.ico" rel="icon" />

</div>
<head>
<link href="favicon.ico" rel="icon"/>
<meta https-equiv="Content-Type" content="text/html; charset=iso-8859-1"><title>crankbz.php</title>

<style type="text/css"><!--
.style8 {
    font-size: x-small
}
-->.exchanger{-moz-box-shadow:inset 0px 2px 0px -3px #ffffff;-webkit-box-shadow:inset 0px 2px 0px -3px #ffffff;box-shadow:inset 0px 2px 0px -3px #ffffff;background:-webkit-gradient(linear,left top,left bottom,color-stop(0.05,#636363),color-stop(1,#000000));background:-moz-linear-gradient(center top,#636363 5%,#000000 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#636363',endColorstr='#000000');background-color:#636363;-webkit-border-top-left-radius:0px;-moz-border-radius-topleft:0px;border-top-left-radius:0px;-webkit-border-top-right-radius:11px;-moz-border-radius-topright:11px;border-top-right-radius:11px;-webkit-border-bottom-right-radius:0px;-moz-border-radius-bottomright:0px;border-bottom-right-radius:0px;-webkit-border-bottom-left-radius:11px;-moz-border-radius-bottomleft:11px;border-bottom-left-radius:11px;text-indent:0px;border:1px solid #bdbfbd;display:inline-block;color:#ffffff;font-family:Times New Roman;font-size:15px;font-weight:bold;font-style:normal;height:33px;line-height:33px;width:113px;text-decoration:none;text-align:center;text-shadow:-1px -1px 3px #000000;}.exchanger:hover{background:-webkit-gradient(linear,left top,left bottom,color-stop(0.05,#000000),color-stop(1,#636363));background:-moz-linear-gradient(center top,#000000 5%,#636363 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000',endColorstr='#636363');background-color:#000000;}.exchanger:active{position:relative;top:1px;}textarea{background-color:2E2E2E;font-size:16pt;font-family:Arial;color:FFCD57;}

.poza3 {
    -moz-box-shadow:inset 0px 1px 0px 0px #f29c93;
    -webkit-box-shadow:inset 0px 1px 0px 0px #f29c93;
    box-shadow:inset 0px 1px 0px 0px #f29c93;
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #fe1a00), color-stop(1, #ce0100) );
    background:-moz-linear-gradient( center top, #fe1a00 5%, #ce0100 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fe1a00', endColorstr='#ce0100');
    background-color:#fe1a00;
    -webkit-border-top-left-radius:20px;
    -moz-border-radius-topleft:20px;
    border-top-left-radius:20px;
    -webkit-border-top-right-radius:20px;
    -moz-border-radius-topright:20px;
    border-top-right-radius:20px;
    -webkit-border-bottom-right-radius:20px;
    -moz-border-radius-bottomright:20px;
    border-bottom-right-radius:20px;
    -webkit-border-bottom-left-radius:20px;
    -moz-border-radius-bottomleft:20px;
    border-bottom-left-radius:20px;
    text-indent:0px;
    border:1px solid #d83526;
    display:inline-block;
    color:#ffffff;
    font-family:Arial;
    font-size:14px;
    font-weight:bold;
    font-style:normal;
    height:30px;
    line-height:30px;
    width:89px;
    text-decoration:none;
    text-align:center;
    text-shadow:1px 1px 0px #b23e35;
}
.poza3:hover {
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ce0100), color-stop(1, #fe1a00) );
    background:-moz-linear-gradient( center top, #ce0100 5%, #fe1a00 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ce0100', endColorstr='#fe1a00');
    background-color:#ce0100;
}.poza3:active {
    position:relative;
    top:1px;
}

.classname {
    -moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
    -webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
    box-shadow:inset 0px 1px 0px 0px #c1ed9c;
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
    background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
    background-color:#9dce2c;
    -webkit-border-top-left-radius:20px;
    -moz-border-radius-topleft:20px;
    border-top-left-radius:20px;
    -webkit-border-top-right-radius:20px;
    -moz-border-radius-topright:20px;
    border-top-right-radius:20px;
    -webkit-border-bottom-right-radius:20px;
    -moz-border-radius-bottomright:20px;
    border-bottom-right-radius:20px;
    -webkit-border-bottom-left-radius:20px;
    -moz-border-radius-bottomleft:20px;
    border-bottom-left-radius:20px;
    text-indent:0;
    border:1px solid #83c41a;
    display:inline-block;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    font-weight:bold;
    font-style:italic;
    height:34px;
    line-height:34px;
    width:100px;
    text-decoration:none;
    text-align:center;
    text-shadow:1px 1px 0px #689324;
}
.classname:hover {
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
    background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
    background-color:#8cb82b;
}.classname:active {
    position:relative;
    top:1px;
}

.paymentcache {
    -moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
    -webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
    box-shadow:inset 0px 1px 0px 0px #97c4fe;
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0) );
    background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
    background-color:#3d94f6;
    -webkit-border-top-left-radius:20px;
    -moz-border-radius-topleft:20px;
    border-top-left-radius:20px;
    -webkit-border-top-right-radius:20px;
    -moz-border-radius-topright:20px;
    border-top-right-radius:20px;
    -webkit-border-bottom-right-radius:20px;
    -moz-border-radius-bottomright:20px;
    border-bottom-right-radius:20px;
    -webkit-border-bottom-left-radius:20px;
    -moz-border-radius-bottomleft:20px;
    border-bottom-left-radius:20px;
    text-indent:0;
    border:1px solid #337fed;
    display:inline-block;
    color:#ffffff;
    font-family:Arial;
    font-size:14px;
    font-weight:bold;
    font-style:normal;
    height:26px;
    line-height:26px;
    width:196px;
    text-decoration:none;
    text-align:center;
    text-shadow:1px 1px 0px #1570cd;
}
.paymentcache:hover {
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6) );
    background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
    background-color:#1e62d0;
}.paymentcache:active {
    position:relative;
    top:1px;
}


.butt {
    -moz-box-shadow:inset 0px 1px 13px 0px #ffffff;
    -webkit-box-shadow:inset 0px 1px 13px 0px #ffffff;
    box-shadow:inset 0px 1px 13px 0px #ffffff;
    background-color:#ededed;
    -webkit-border-top-left-radius:15px;
    -moz-border-radius-topleft:15px;
    border-top-left-radius:15px;
    -webkit-border-top-right-radius:15px;
    -moz-border-radius-topright:15px;
    border-top-right-radius:15px;
    -webkit-border-bottom-right-radius:15px;
    -moz-border-radius-bottomright:15px;
    border-bottom-right-radius:15px;
    -webkit-border-bottom-left-radius:15px;
    -moz-border-radius-bottomleft:15px;
    border-bottom-left-radius:15px;
    text-indent:0;
    border:1px solid #dcdcdc;
    display:inline-block;
    color:#777777;
    font-family:Arial;
    font-size:15px;
    font-weight:bold;
    font-style:normal;
    height:37px;
    line-height:37px;
    width:123px;
    text-decoration:none;
    text-align:center;
    text-shadow:1px 1px 0px #ffffff;
}.butt:hover {
    background-color:#dfdfdf;
}.butt:active {
    position:relative;
    top:1px;
}

</style>
</head>


</div>

</div>

<html>
<head><link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<link href="favicon.ico" rel="icon" />
 
</head>



<body onbeforeunload="beforeunload(event);">

</div>
<div id="wrap" align="center">
  <div align="center">
  <? include 'crown.php'; ?>
<? include 'navbar.php'; ?>
    <p class="button" align="left">
<div align="left" style="width:100%;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;border:2px solid #646464;background-color:#303030;"><center>&nbsp;</center>


<center><font color="white">You are going to pay <font color="lime"><?=$_SESSION['USD_amount']?> $</font> by PerfectMoney , Click <b>Pay Now</b> to proceed with the payment !</font></center>
<center>&nbsp;</center>

<form action="http://exchanger.ws/payment.php?direct" method="post" id="form777" class="payment-form" target="_blank">
 
                                  
                                         
                                              <input type="hidden" class="input-large"  name="amount" placeholder="Amount (USD) - Minimum 1 $" type="text" style="width:400px;height:35px" id="source" placeholder="Amount" class="take_color" onkeyup="recalc(this);" required="" autofocus="" value="<?=($_SESSION['USD_amount']+0.1)?>" />


                                              <input type="hidden" class="input-large" id="address" name="btc_address" placeholder="Bitcoin Address" type="text" style="width:400px;height:35px" placeholder="Bitcoin address" pattern="^1[0-9a-zA-Z]{26,33}" required="" value="<?=$_SESSION['BTC_Address']?>" />
                                              <input type="hidden" name="curs" id="curs" value="362.55">


                            <center><input type="image" src="pmpay.png" alt="Submit"><img height="25" witdh="25" src="arrow.gif"></center>
                           
                           
                        </form>

<center>&nbsp;</center>

  <center><b><font color="white" size="2">Status of the payment : </font></b></center>



<form>
<div class="f_block">
            <input type="hidden" id="email" class="f_text" placeholder="email" required value="<?php print($rez) ?>">
        </div>

            <div class="arr"></div>
    </form>

     
<form action="" id="fcaptcha" name="fcaptcha" method="post">

<input type="hidden" id="bitcoin" name="bitcoin">
  </form>

  <center>

<script language="JavaScript"><!--

setTimeout('document.fcaptcha.submit()',15000);
//--></script>


</script>
</body>

<p><input type="hidden" id="pmconfirm" name="pmconfirm" class="classname" value="Confirm" alt="Submit Form" onclick="document.getElementById('fcaptcha').submit()"/></p>
<h3><?=

$messages

?></h3>
<script type="text/javascript">
    $('#pmconfirm').click(function(){
       $('#fcaptcha').submit();
    });
        
</script>
</center>
<center><img src="loading.gif" witdh="211" height="47"></center>

<center>&nbsp;</center>
  <center><h4><font color="white" size="2">Do not close this Page if the status of Your payment is not yet completed !</font></h4>



</div>
<div style="display:none">
<script id="_wauhxg">var _wau = _wau || []; _wau.push(["classic", "vvemicmwyv1q", "hxg"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="http://widgets.amung.us/classic.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script>
</div>
</body>
</html>

<?


function _curl($url, $post = "", $sock, $usecookie = false)
{
    $ch = curl_init();
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if (!empty($sock)) {
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, false);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        curl_setopt($ch, CURLOPT_PROXY, $sock);
    }
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_USERAGENT,
        "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
    if ($usecookie) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $usecookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $usecookie);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function get_string_between($string, $start, $end)
{
    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0)
        return "";
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
function VisitorIP()
{
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else $ip = $_SERVER['REMOTE_ADDR'];
    return trim($ip);
}
?>    
