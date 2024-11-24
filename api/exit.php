<?php
	setcookie('logonid', "", time() - 3600*24*10,'/');
	echo '<script> alert("退出登陆成功！"); window.opener=null;window.close();';
	echo 'window.location.href="../index.html"</script>';

?>