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

    // 간편 전자서명 요청정보 객체
    $RequestESign = new RequestESign();

    // 고객센터 전화번호, 카카오톡 인증메시지 중 "고객센터" 항목에 표시
    $RequestESign->CallCenterNum = '1600-8536';

    // 인증요청 만료시간(초), 인증요청 만료시간(초) 내에 미인증시, 만료 상태로 처리됨
  	$RequestESign->Expires_in = 60;

    // 수신자 생년월일, 형식 : YYYYMMDD
  	$RequestESign->ReceiverBirthDay = '19900108';

    // 수신자 휴대폰번호
  	$RequestESign->ReceiverHP = '01043245117';

    // 수신자 성명
  	$RequestESign->ReceiverName = '정요한';

    // 별칭코드, 이용기관이 생성한 별칭코드 (파트너 사이트에서 확인가능)
    // 카카오톡 인증메시지 중 "요청기관" 항목에 표시
    // 별칭코드 미 기재시 이용기관의 이용기관명이 "요청기관" 항목에 표시
  	$RequestESign->SubClientID = '';

    // 인증요청 메시지 부가내용, 카카오톡 인증메시지 중 상단에 표시
  	$RequestESign->TMSMessage = 'TMSMessage0423';

    // 인증요청 메시지 제목, 카카오톡 인증메시지 중 "요청구분" 항목에 표시
  	$RequestESign->TMSTitle = 'TMSTitle 0423';

    // 전자서명할 토큰 원문
    $RequestESign->Token = "TMS Token 0423 ";

    // 은행계좌 실명확인 생략여부
    // true : 은행계좌 실명확인 절차를 생략
    // false : 은행계좌 실명확인 절차를 진행
    // 카카오톡 인증메시지를 수신한 사용자가 카카오인증 비회원일 경우, 카카오인증 회원등록 절차를 거쳐 은행계좌 실명확인 절차를 밟은 다음 전자서명 가능
  	$RequestESign->isAllowSimpleRegistYN = false;

    // 수신자 실명확인 여부
    // true : 카카오페이가 본인인증을 통해 확보한 사용자 실명과 ReceiverName 값을 비교
    // false : 카카오페이가 본인인증을 통해 확보한 사용자 실명과 RecevierName 값을 비교하지 않음.
  	$RequestESign->isVerifyNameYN = false;

    // PayLoad, 이용기관이 생성한 payload(메모) 값
    $RequestESign->PayLoad = 'Payload123';

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
