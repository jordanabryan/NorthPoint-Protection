<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--[if !mso]><!-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!--<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Nunito:200|Parisienne');
	</style>
	<!--[if (gte mso 9)|(IE)]>
	<style type="text/css">
		table {border-collapse: collapse;}
	</style>
	<![endif]-->
</head>
<body>

<center class="wrapper header" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;color:#fff;padding:0;">
	<!--[if (gte mso 9)|(IE)]>
	<table cellspacing="0" cellpadding="0" border="0" width="480" align="center" class="header" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;background-color:#121110;padding-top:10px;padding-bottom:2px;padding-right:0;padding-left:0;" >
		<tr>
			<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
	<![endif]-->
	<table cellspacing="0" cellpadding="0" border="0" class="outer" align="center" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;margin:0 auto;width:100%;max-width:480px;">
		<tr>
			<td class="one-column">
				<img style='width:100%;width:200px;margin:0;display:block;height:auto;' src='http://northpoint-protection.lime-house-studio.co.uk/images/logo.png' alt='NorthPoint Protection' />
			</td>
		</tr>
	</table>
	<!--[if (gte mso 9)|(IE)]>
	</td>
	</tr>
	</table>
	<![endif]-->
</center>

<center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#ffffff;">
	<!--[if (gte mso 9)|(IE)]>
	<table cellspacing="0" cellpadding="0" border="0" width="480" align="center"  style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;color:#333333;background-color:#ffffff;" >
		<tr>
			<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
	<![endif]-->
	<table cellspacing="0" cellpadding="0" border="0" class="outer" align="center" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;color:#333333;margin:0 auto;width:100%;max-width:480px;padding:0 10px;">
		<tr>
			<td class="inner" style="padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;"></td>
		</tr>
		<tr>
			<td class="inner contents" colspan="2" style="font-size:14px;text-align:left;font-family:'Nunito', Helvetica, Arial, sans-serif;">
				<p style="margin: 10px 0 8px 0;font-weight: bold;font-size:18px;">Hello {{ $content->receiver }}</p>
				<p style="margin: 10px 0 8px 0;font-weight: bold;font-size:18px;">Thank you for contacting NorthPoint Protection</p>
        		<p style="margin: 10px 0 8px 0;font-size:16px;">{{ $content->message }}</p>
		    </td>
		</tr>
		<tr>
			<td class="inner" style="padding-top:20px;padding-bottom:10px;padding-right:10px;padding-left:10px;"></td>
		</tr>
	</table>
	<!--[if (gte mso 9)|(IE)]>
	</td>
	</tr>
	</table>
	<![endif]-->
</center>

<center class="wrapper footer" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:20px 0;background-color: #eee;color: #000;">
	<!--[if (gte mso 9)|(IE)]>
	<table cellspacing="0" cellpadding="0" border="0" width="480" align="center" class="footer" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;background-color:#3b3734;padding-top:20px;padding-bottom:0;padding-right:0;padding-left:0;">
		<tr>
			<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
	<![endif]-->
	<table cellspacing="0" cellpadding="0" border="0" class="outer" align="center" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;margin:0 auto;width:100%;max-width:480px;padding:0 10px;">
		<tr>
			<td colspan='2' class="inner contents" style="padding:5px 0;font-family:'Nunito', Helvetica, Arial, sans-serif;">
				<p style='margin: 0 0 10px 0;font-size:18px;font-weight:bold;'>{{ $content->service['title'] }}</p>
			</td>
		</tr>
		<tr>
			<td colspan='2' class="inner contents" style="font-family:'Nunito', Helvetica, Arial, sans-serif;">
				<p style='margin: 0 0 10px 0;font-size:16px;'>{{ $content->service['content'] }}</p>
			</td>
		</tr>

		<tr>
			<td class="inner contents">
				<div style='height:200px;overflow:hidden;'>
					<img style='width:100%;margin:0 auto;display:block;' src="{{ asset($content->service['image']) }}" />
				</div>
			</td>
		</tr>
	</table>
	<!--[if (gte mso 9)|(IE)]>
	</td>
	</tr>
	</table>
	<![endif]-->
</center>

<center class="wrapper footer" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:20px 0;background-color: #333;color: #fff;">
	<!--[if (gte mso 9)|(IE)]>
	<table cellspacing="0" cellpadding="0" border="0" width="480" align="center" class="footer" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;background-color:#3b3734;padding-top:20px;padding-bottom:0;padding-right:0;padding-left:0;">
		<tr>
			<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
	<![endif]-->
	<table cellspacing="0" cellpadding="0" border="0" class="outer" align="center" style="border-spacing:0;font-family:'Nunito', Helvetica, Arial, sans-serif;margin:0 auto;width:100%;max-width:480px;padding:0 10px;">
		<tr>
			<td class="inner contents" style="padding:5px 0;font-family:'Nunito', Helvetica, Arial, sans-serif;">
				<p style='margin: 0 0 10px 0;font-size:14px;'>Bacon ipsum dolor amet cow cupim pig burgdoggen tongue, drumstick chuck boudin ham meatball bresaola andouille filet mignon pork loin picanha. Kevin capicola sirloin alcatra, cupim bresaola tongue pork chop fatback burgdoggen hamburger tenderloin beef pork belly biltong.</p>
				<p style='margin: 0 0 0 0;font-size:14px;'>Copyright 2019 NorthPoint Protection</p>
				<p style='margin: 0;font-size:14px;'>Developed by Lime House Studio</p>
			</td>
		</tr>
	</table>
	<!--[if (gte mso 9)|(IE)]>
	</td>
	</tr>
	</table>
	<![endif]-->
</center>

</body>
</html>