<!doctype html>
<html>
<head>
	<title>HGB1 server</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="../hgb1.png" rel="shortcut icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300i,400,700" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body style="font-family: Raleway, sans-serif">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="assets/imgs/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Bootstrap
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/phpmyadmin">phpmyadmin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Statistik</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="ssss">
    <?php
  		echo "";
  		$path = ".";
  		$dh = opendir($path);
  		$li = "<table class='table table-responsive'><thead class='thead-dark'><tr><th>Title</th><th>File Type</th><th>Last time modified</th><th>Operations</th></tr></thead><tbody>";
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
          $sEntrie = "<tr><td>".ucfirst($file)."</td><td>".getFileType(filetype($file))."</td><td>".date ("F d Y H:i:s.", filemtime($file))."</td><td><a href='$path/$file'><i class='fa fa-external-link' aria-hidden='true'></i></a></td></tr>";
          array_push($aList, $sEntrie);
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
  </div>

  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/code.js"></script>
</body>
</html>
