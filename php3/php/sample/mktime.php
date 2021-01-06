<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php
		ini_set('data.timezone','Asia/seoul');
		
		$startTime = mktime(13, 1, 10, 12, 31, 2020);
		$endTime = mktime(13, 5, 10, 12, 31, 2020);
	
		if ( $startTime <= time() && $endTime > time() ){
			echo "지금은 수업시간입니다.";
		} else {
			echo "지금은 점심시간입니다.";
		}
	?>
	
</body>
</html>