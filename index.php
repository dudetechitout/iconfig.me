<?php

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

$query = $_GET['q'];

$user = array(
	'ip' 		=> $_SERVER['REMOTE_ADDR'],
	'host' 		=> (isset($_SERVER['REMOTE_ADDR']) ? gethostbyaddr($_SERVER['REMOTE_ADDR']) : ""),
	'port' 		=> $_SERVER['REMOTE_PORT'],
	'ua' 		=> $_SERVER['HTTP_USER_AGENT'],
	'lang' 		=> $_SERVER['HTTP_ACCEPT_LANGUAGE'],
	'mime' 		=> $_SERVER['HTTP_ACCEPT'],
	'encoding' 	=> $_SERVER['HTTP_ACCEPT_ENCODING'],
	'charset' 	=> $_SERVER['HTTP_ACCEPT_CHARSET'],
	'connection' => $_SERVER['HTTP_CONNECTION'],
	'cache' 	=> $_SERVER['HTTP_CACHE_CONTROL'],
	'referer' 	=> $_SERVER['HTTP_REFERER'],
	'real_ip' 	=> $_SERVER['HTTP_X_REAL_IP'],
	'forwarded' 	=> $_SERVER['HTTP_X_FORWARDED_FOR'],
	'dnt' 		=> $_SERVER['HTTP_DNT'],
	'method'	=> $_SERVER['REQUEST_METHOD'],
	'remote_host' => $_SERVER['REMOTE_HOST']
);

if(isset($query)) {
	switch($query) {
		case "all":
			header("Content-Type: text/plain");
			foreach($user as $key => $value) {
				echo $key . ': ' . $value . "\n";
			}
			die();
		case "all.json":
			header('Content-Type: application/json; charset=utf-8');
			die(json_encode($user, JSON_FORCE_OBJECT));
		default:
			if(isset($user["{$query}"])) { die($user["{$query}"]); }
	}
}

if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/^(curl)/i', $_SERVER['HTTP_USER_AGENT'])) {
	die($user["ip"]);
}

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="content-style-type" content="text/css">
    <meta http-equiv="content-script-type" content="text/javascript">
    <meta http-equiv="content-language" content="en">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="description" content="Get my IP Address">
    <meta name="keywords" content="ip address iconfig iconfig.me">
    <meta name="author" content="">
    <link rel="shortcut icon" href="https://iconfig.me/favicon.ico">
    <link rel="canonical" href="https://dudetechitout.com/">
    <title>What Is My IP Address? - iconfig.me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/style.css" rel="stylesheet" type="text/css">
    <link href="/css" rel="stylesheet">
</head>

<body>
	
    <style>#forkongithub a{background:#000;color:#fff;text-decoration:none;font-family:arial,sans-serif;text-align:center;font-weight:bold;padding:5px 40px;font-size:1rem;line-height:2rem;position:relative;transition:0.5s;}#forkongithub a:hover{background:#c11;color:#fff;}#forkongithub a::before,#forkongithub a::after{content:"";width:100%;display:block;position:absolute;top:1px;left:0;height:1px;background:#fff;}#forkongithub a::after{bottom:1px;top:auto;}@media screen and (min-width:800px){#forkongithub{position:fixed;display:block;top:0;right:0;width:200px;overflow:hidden;height:200px;z-index:9999;}#forkongithub a{width:200px;position:absolute;top:60px;right:-60px;transform:rotate(45deg);-webkit-transform:rotate(45deg);-ms-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);box-shadow:4px 4px 10px rgba(0,0,0,0.8);}}</style><span id="forkongithub"><a href="https://github.com/dudetechitout/iconfig.me">Fork me on GitHub</a></span>
    <div id="try_container">
            <div class="try">
                    Brought to you by <a href="https://dudetechitout.com/?source=iconfig" target="_blank">dudetechitout.com</a>. Need a hosts file to protect you from big tech - <a href="https://canihazprivacy.com/?source=iconfig" target="_blank">canihazprivacy.com</a>?
                </div>
    </div>

<div id="container" class="clearfix">
    <div id="header">
        <table>
            <tbody><tr>
                <td>
                    <h1><a href="http://iconfig.me/">What Is My IP Address? - iconfig.me</a></h1>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div id="plungins">
                        <div class="plungin" id="button_facebook">
                            <!---facebook like button---->
                        </div>

                        <div class="plungin" id="button_twitter">
                            <!---twitter like button---->
                        </div>

                        <div class="plungin" id="button_plusone">
                           <!---google plus button---->
                        </div>
                    </div>
                </td>
            </tr>
        </tbody></table>
    </div>
    <div id="info_area">
        <h2>Your Connection</h2>
        <table id="info_table" summary="info">
            <tbody><tr>
                <td class="info_table_label">IP Address</td>
                <td id="ip_address_cell"><strong id="ip_address"><?php echo $user['ip']; ?></strong></td>
            </tr>
            <tr>
                <td class="info_table_label">User Agent</td>
                <td><?php echo $user['ua']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">Language</td>
                <td><?php echo $user['lang']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">Referer</td>
                <td><?php echo $user['referer']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">Method</td>
                <td><?php echo $user['method']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">Encoding</td>
                <td><?php echo $user['encoding']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">MIME Type</td>
                <td><?php echo $user['mime']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">Charset</td>
                <td><?php echo $user['charset']; ?></td>
            </tr>
            <tr>
                <td class="info_table_label">X-Forwarded-For</td>
                <td><?php echo $user['forwarded']; ?></td>
            </tr>
        </tbody></table>
    </div>
    <!--<div id="middle"></div>-->
    <div id="cli_wrap">
        <h2>Command Line Interface</h2>
        <table id="cli_table" summary="cli">
            <tbody><tr>
                <td class="cli_command">$ curl iconfig.me</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['ip']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/ip</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['ip']; ?></td>
            </tr>
			<tr>
                <td class="cli_command">$ curl iconfig.me/host</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['host']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/ua</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['ua']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/lang</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['lang']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/encoding</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['encoding']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/mime</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['mime']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/charset</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['charset']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/forwarded</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo $user['forwarded']; ?></td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/all</td>
                <td class="cli_arrow">⇒</td>
                <td>
                    <?php
						foreach($user as $key => $value) {
							echo $key . ': ' . $value . "<br/>";
						}
					?>
                </td>
            </tr>
            <tr>
                <td class="cli_command">$ curl iconfig.me/all.json</td>
                <td class="cli_arrow">⇒</td>
                <td><?php echo json_encode($user, JSON_FORCE_OBJECT); ?></td>
            </tr>
        </tbody></table>
    </div>
    <div id="footer">© <?php echo date("Y"); ?> iconfig.me</div>
</div><div style="position: static !important;"></div>
</body></html>
