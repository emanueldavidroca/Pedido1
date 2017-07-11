 <?php 
	class conexion
	{
		
		public function conectar()
		{
			$link = new PDO ("mysql:host=localhost;dbname=ventas","root","");
			$link->exec("SET CHARACTER SET utf8");
			return $link;
		}
	}
 ?>