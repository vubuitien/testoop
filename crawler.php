<?php 
	require_once('db.php');
	class Crawler
	{
		public $tits_x;
		public $contents_x;
		public $tits_n;
		public $contents_n;
		public $show;
		public $db;
		public $sql;
		public $url;
		public $title;
		public $content;
		public $ch;
		public $ketqua;
		public $link;
		private $host = DB_HOST; 	
		private $dbname = DB_NAME;
		private $username = DB_USERNAME;
		private $pass = DB_PASSWORD;

		function conn(){

			$this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->pass);
		}
		function crawl(){
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$this->url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			$this->ketqua=curl_exec($ch);
			ini_set('display_errors', 'off');
			 
			ini_set('log_errors', 'on');
			ini_set('error_log','php-error.log');
			curl_close($ch);
		}

		function showvnx(){
			$this->conn();
			$this->show = $this->db->query("SELECT * FROM vnx");
			$this->show->execute();
		}


		function showvnn(){
			$this->conn();
			$this->show = $this->db->query("SELECT * FROM vnn");
			$this->show->execute();
		}

		function savevnx(){
			$this->conn();

			$this->sql = "INSERT INTO vnx (title, content) VALUES ('$this->title', '$this->content')";
			$this->db->exec($this->sql);
		}

		function savevnn(){
			$this->conn();

			$this->sql = "INSERT INTO vnn (title, content) VALUES ('$this->title', '$this->content')";
			$this->db->exec($this->sql);
		}

		function get_link(){
			$this->url = $this->link;
			echo $this->crawl();
		}

		function show_dl(){
			if(isset($_POST['getlink'])){
				$this->link = $_POST['getlink'];
				$this->get_link();
			}
		}
		
	}
	
	class ClawlerVNX extends Crawler
	{	
		function get_info_vnx(){
	    	$this->get_link();
		    preg_match('/\<h1 class="title_news_detail mb10".*\>(.*)\<\/h1\>/isU', $this->ketqua, $tit_vnx);
			preg_match('/\<article class="content_detail fck_detail width_common block_ads_connect".*\>(.*)\<\/article\>/isU', $this->ketqua, $content_vnx);
		    $this->tits_x = $tit_vnx[1];
		    $this->contents_x = $content_vnx[1];

		}


		function savedbvnx(){
			if(isset($_POST['save'])){
				$this->title = $_POST['savetit'];
				$this->content = $_POST['savecon'];
				$this->savevnx($title,$content);
				header("Location: ./vnx.php");
			}
		}

		
	}

	class ClawlerVNN extends Crawler
	{	
		function get_info_vnnet(){
	    	$this->get_link();
		    preg_match('/\<h1 class="title".*\>(.*)\<\/h1\>/isU', $this->ketqua, $tit_vnn);
			preg_match('/\<div id="ArticleContent" class="ArticleContent".*\>(.*)\<\/div\>/isU', $this->ketqua, $content_vnn);
		    $this->tits_n = $tit_vnn[1];
		    $this->contents_n = $content_vnn[1];
		}


		function savedbvnn(){
			if(isset($_POST['savevnn'])){
				$this->title = $_POST['savetitvnn'];
				$this->content = $_POST['saveconvnn'];
				$this->savevnn($title,$content);
				header("Location: ./vnn.php");
			}
		}
		
	}
	
?>