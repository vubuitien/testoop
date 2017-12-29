<?php 
	include('crawler.php');
	require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Crawler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
	$test = new ClawlerVNN;
	$test->showvnn();
	$test->show_dl();
  $test->savedbvnn();
  $test->get_info_vnnet();
?>
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Crawler</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="vnx.php">Vnexpress</a></li>
        <li class="active"><a href="vnn.php">Vietnamnet</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="form-group">
	<form action="" method="post">
		  <label>Nhập link:</label>
		  <input type="text" class="form-control" name="getlink">
		  <br>
		  <button class="btn btn-success" type="submit" name="gettlink">GET</button>
		  <br>	
	</form>
</div>
<div class="form-group">
	<form action="" method="post">
			  <label for="usr">Title</label>
			  <input type="text" class="form-control" name="savetitvnn" value="<?php echo $test->tits_n ?>">
			  <label for="usr">Content</label>
			  <textarea rows="5" class="form-control" name="saveconvnn"><?php echo $test->contents_n ?></textarea>
			  <br>
			  <button class="btn btn-primary" type="submit" name="savevnn">Lưu data</button>
	</form>
</div>
	<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($test->show as $key) { ?>
      	<tr>
	        <td><?= $key['id']?></td>
	        <td><?= $key['title']?></td>
	        <td><?= $key['content']?></td>
      	</tr>
      <?php } ?>    
    </tbody>
  </table>
</div>
</body>
</html>