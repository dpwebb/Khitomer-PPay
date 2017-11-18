<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Receipt From Priority Payout</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Khitomer Consultancy Limited &#8211; Exceptional Service!" name="description" />
<meta content="" name="author" />
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
</head>
<body>

<div class="message-box">
<?php if($response=='approved'){?>
    <p style="color:#29B665;">Thank you!</p>
    <p class="msg-info">Your transaction has been completed</p>
<?php }else{?>
    <p style="color:#32CD32; text-align:center;">Thank you!</p>
    <p class="msg-info">Your transaction will be refunded within 3 business days. Please  contact your bank to confirm, You can contact us at <a href="mailto:returns@khitomer.ca">Returns@khitomer.ca</a> if you have any questions.</p>
<?php }?>
</div>

</body>
</html>
<style type="text/css">
.message-box {
	font-family: 'Merriweather', serif;
	background-color:#FFF;
	width:460px;
	min-height:50px;
	padding:40px 20px 40px 20px;
	margin: 18% auto 0;
	text-align:center;
	border-radius:5px;
	-webkit-box-shadow: 0px 2px 13px 0px rgba(50, 50, 50, 0.52);
	-moz-box-shadow:    0px 2px 13px 0px rgba(50, 50, 50, 0.52);
	box-shadow:         0px 2px 13px 0px rgba(50, 50, 50, 0.52)
}
.message-box p {
	font-family: 'Merriweather', serif;
	text-align:center;
	font-size:24px;
	margin:0px;
	padding:0px;
}
.message-box p a {
	font-family: 'Merriweather', serif;
	font-size:16px;
	color:#1E90FF;
	text-decoration:none;
	cursor:pointer;
}
.message-box p a:hover {
	text-decoration:underline;
}
.message-box p.msg-info {
	margin-top:7px !important;
	font-size:16px;
}
</style>