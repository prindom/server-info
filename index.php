<!doctype html>
<html>
<head>
	<title>HGB1 server</title>
	<link href="../hgb1.png" rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="font-family: Raleway, sans-serif">
<div style="display: flex; justify-content: space-between; align-items: center">
    <h1>Here are our sites -- test --</h1>
    <a href="/phpmyadmin">PHPMYADMIN</a>
    <div onclick="goBack()" onmouseenter="goBackHover()" style="display: flex; justify-content: space-between; align-items: center; cursor: pointer" data-toggle="tooltip" data-placement="left" title="there is no going back">
        <i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i>
        <p>Go back</p>
    </div>

</div>

	<?php
		echo "";
		$path = ".";
		$dh = opendir($path);
		$li = "<table class='table'><thead><tr><th>Title</th><th>Editor</th><th>Link</th><th>File Type</th><th>Last time modified</th></tr></thead><tbody>";
		$aList = array();
		$sEntrie = "";
		$i=1;

		function getFileType($sType) {
		    if($sType == "dir") {
		        return "website/directory";
            } else {
		        return $sType;
            }
        }
		while (($file = readdir($dh)) !== false) {
    	if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {

            $sEntrie = "<tr><td>".ucfirst($file)."</td><td>Dominik Prinzensteiner</td><td><a href='$path/$file'>hgb1.damnserver.com/$file</a></td><td>".getFileType(filetype($file))."</td><td>".date ("F d Y H:i:s.", filemtime($file))."</td></tr>";
            array_push($aList, $sEntrie);
            //$li.= "<tr><td>".ucfirst($file)."</td><td>Dominik Prinzensteiner</td><td><a href='$path/$file'>hgb1.damnserver.com/$file</a></td><td>".date ("F d Y H:i:s.", filemtime($file))."</td></tr>";
				$i++;
    	}
		}
		sort($aList);
		for($i = 0; $i < count($aList); $i++){
            $li .= $aList[$i];
    }
		$li .= "</tbody></table>";
		echo $li;
		closedir($dh);
	?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        //$('[data-toggle="tooltip"]').tooltip();
        let array = $("td");
        //console.log(array);
        for (let i = 0; i < array.length; i++) {
            //console.log($(array[i]));
            if($(array[i]).text() == "website/directory") {
                $(array[i]).parent().addClass("success");
            } else if ($(array[i]).text() == "file"){
                $(array[i]).parent().addClass("info");
            }
        }
    });

    function goBackHover() {
        $('[data-toggle="tooltip"]').tooltip();
    }

    function goBack() {
        if (document.URL == "http://hgb1.damnserver.com:81/") {
            console.log("do nothing");
        }else window.history.back();
    }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
