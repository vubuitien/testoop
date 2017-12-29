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
	$test = new ClawlerVNX;
	$test->showvnx();
	$test->show_dl();
  $test->savedbvnx();
	$test->get_info_vnx();
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
        <li class="active"><a href="vnx.php">Vnexpress</a></li>
        <li><a href="vnn.php">Vietnamnet</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="form-group">
	<form action="" method="POST">
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
			  <input type="text" class="form-control" name="savetit" value="<?php echo $test->tits_x; ?>">
			  <label for="usr">Content</label>
			  <textarea rows="5" class="form-control" name="savecon"><?php echo $test->contents_x; ?></textarea>
			  <br>
			  <button class="btn btn-primary" type="submit" name="save">Lưu data</button>
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