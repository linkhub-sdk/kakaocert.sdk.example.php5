<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>Kakaocert SDK PHP 5.X Example.</title>
	</head>
<?php

    include 'common.php';

    // Kakaocert 이용기관코드
    $clientCode = '020040000050';


    $RequestESign = new RequestESign();
    $RequestESign->writeDate = '20200401';


    try {
        $receiptID = $KakaocertService->requestESign($clientCode, $RequestESign);
    }
    catch(PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>간편 전자서명 요청</legend>
				<ul>

          <?php
            if ( isset($receiptID) ) {
          ?>
            <li>접수아이디 (receiptID) : <?php echo $receiptID ?></li>
          <?php
            } else {
          ?>
            <li>Response.code : <?php echo $code ?> </li>
            <li>Response.message : <?php echo $message ?></li>
          <?php
            }
          ?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
