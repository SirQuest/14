<?php 
/**
 * Clase de conexion a la base de datos con la funcion segun Cesar Cancino
 */
session_start();
class Conectar
{
	
	public static function con()
	{
		$conexion=mysqli_connect("localhost","root","");
		mysql_query("SET NAMES 'utf8'");
		mysqli_select_db($conexion,"registro_de_usuarios");
		return $conexion;
	}
	public static function corta_palabra($palabra,$num){
		$largo=strlen($palabra); //me indica el largo de la cadena
		$cadena=substr($palabra,0,$num); //Permite mostrar cierta contidad de texto
		return $cadena;
	}
}
//*********************************************

class Trabajo{
	private $cat=array();
	private $noticias=array();
	private $post=array();
	private $comentarios=array();
	private $ultimas=array();

	public function logueo(){
		$user=$_POST["user"];
		$pass_js=$_POST["pass"];
		$pass_php=md5($_POST["pass"]);
	}

	public function get_categorias(){
		$sql="SELECT * FROM categorias ORDER BY categoria ASC";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res)){
			$this->cat[]=$reg;
		}
		return $this->cat;
	}
	public function get_paginacion_noticias($inicio,$c){
		//$sql="SELECT * FROM noticia ORDER BY id_noticia DESC limit $inicio,10";

		$sql="SELECT * FROM noticia where id_categorias=$c ORDER BY id_noticia DESC limit $inicio,10";
		//echo $sql;
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res)){
			$this->noticias[]=$reg;
		}
		return $this->noticias;
	}
	public function total_comentarios($id_noticia){
		$sql="SELECT count(*) as cuantos FROM comentarios where id_noticia=$id_noticia";
		$res=mysqli_query(Conectar::con(),$sql);
		if($reg=mysqli_fetch_array($res)){
			$total=$reg["cuantos"];
		}
		return $total;
	}
	public function get_post_por_id(){
		$sql="SELECT * FROM noticia where id_noticia=".$_GET["id"];
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res)){
			$this->post[]=$reg;
		}
		return $this->post;
	}
	public function insertar_comentaarios(){
		//print_r($_POST);
		$sql="INSERT INTO comentarios values (null,'".strip_tags($_POST["nom"])."','".strip_tags($_POST["correo"])."','".strip_tags($_POST["web"])."','".strip_tags($_POST["mensaje"])."',NOW(),'".strip_tags($_POST["id_noticia"])."')";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>alert('El comentario ha sido ingresado correctamente. Gracias por escribir en mi web...'); window.location='".$_POST["url"]."';</script>";
		//echo $sql;
	}
	public function get_comentarios($id){
		$sql="SELECT * FROM comentarios where id_noticia=$id ORDER BY id_comentario DESC";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res)){
			$this->comentarios[]=$reg;
		}
		return $this->comentarios;
	}
	public function get_ultimas_10_noticias(){
		$sql="SELECT * FROM noticia ORDER BY id_noticia DESC limit 10";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res)){
			$this->ultimas[]=$reg;
		}
		return $this->ultimas;
	}
}
?>