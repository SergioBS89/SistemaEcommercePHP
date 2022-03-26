<?php

session_destroy();

$staticRute = StaticRute::rute();



echo '<script>
	
	localStorage.removeItem("username");
	localStorage.clear();
	window.location = "'.$staticRute.'";

</script>';