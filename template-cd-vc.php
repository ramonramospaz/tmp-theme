<?php /* Template Name: CD-VC */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	//include("user/source/perfil-demografico.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location:".$enlace);

		}

		//header("Location: /user/success.php");

	}

?>

<?php get_header(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autoload.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autosave.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php the_content(); ?>
			
	</article>		<div><h2>Calidad del producto (que satisfaga la necesidad basica del cliente)</h2>

<p><label><input type="radio" name="calidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="calidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="calidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="calidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="calidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="calidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="calidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentcal"></label></p>
</div>

<div><h2>Composición quimica o fisica del producto (materiales o elementos de los que esta hecho el producto)</h2>

<p><label><input type="radio" name="composicion" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="composicion" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="composicion" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="composicion" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="composicion" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="composicion" value="6">No aplica</label></p>
<p><label><input type="radio" name="composicion" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentcomp"></label></p></div>

<div><h2>Consistencia del producto (dureza)</h2>

<p><label><input type="radio" name="dureza" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="dureza" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="dureza" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="dureza" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="dureza" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="dureza" value="6">No aplica</label></p>
<p><label><input type="radio" name="dureza" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentdur"></label></p></div>

<div><h2>Durabilidad del producto (vigencia en buen estado)</h2>

<p><label><input type="radio" name="vigencia" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="vigencia" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="vigencia" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="vigencia" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="vigencia" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="vigencia" value="6">No aplica</label></p>
<p><label><input type="radio" name="vigencia" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentvig"></label></p></div>

<div><h2>Peso del producto</h2>

<p><label><input type="radio" name="peso" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="peso" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="peso" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="peso" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="peso" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="peso" value="6">No aplica</label></p>
<p><label><input type="radio" name="peso" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentpeso"></label></p></div>

<div><h2>Tamaño del producto</h2>

<p><label><input type="radio" name="tamano" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="tamano" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="tamano" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="tamano" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="tamano" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="tamano" value="6">No aplica</label></p>
<p><label><input type="radio" name="tamano" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commenttam"></label></p></div>

<div><h2>Contenido neto del producto</h2>

<p><label><input type="radio" name="contenido" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="contenido" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="contenido" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="contenido" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="contenido" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="contenido" value="6">No aplica</label></p>
<p><label><input type="radio" name="contenido" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentcont"></label></p></div>

<div><h2>Sabor del producto (o variedad de sabores)</h2>

<p><label><input type="radio" name="sabor" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="sabor" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="sabor" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="sabor" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="sabor" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="sabor" value="6">No aplica</label></p>
<p><label><input type="radio" name="sabor" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentsab"></label></p></div>

<div><h2>Olor del producto (fragancia, aroma)</h2>

<p><label><input type="radio" name="olor" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="olor" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="olor" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="olor" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="olor" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="olor" value="6">No aplica</label></p>
<p><label><input type="radio" name="olor" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentolor"></label></p></div>

<div><h2>Color del producto (o variedad de colores)</h2>

<p><label><input type="radio" name="color" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="color" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="color" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="color" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="color" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="color" value="6">No aplica</label></p>
<p><label><input type="radio" name="color" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentcolor"></label></p></div>

<div><h2>Forma del producto (contorno o silueta del producto)</h2>

<p><label><input type="radio" name="forma" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="forma" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="forma" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="forma" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="forma" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="forma" value="6">No aplica</label></p>
<p><label><input type="radio" name="forma" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentforma"></label></p></div>

<div><h2>Confortabilidad - comodidad del producto</h2>

<p><label><input type="radio" name="confortabilidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="confortabilidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="confortabilidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="confortabilidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="confortabilidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="confortabilidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="confortabilidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentconf"></label></p></div>

<div><h2>Tecnología aplicada al producto</h2>

<p><label><input type="radio" name="tecnologia" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="tecnologia" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="tecnologia" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="tecnologia" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="tecnologia" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="tecnologia" value="6">No aplica</label></p>
<p><label><input type="radio" name="tecnologia" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commenttecno"></label></p></div>

<div><h2>Practicidad del diseño del producto (práctico para su uso y manipulación)</h2>

<p><label><input type="radio" name="practicidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="practicidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="practicidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="practicidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="practicidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="practicidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="practicidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentprac"></label></p></div>

<div><h2>Vistosidad del diseño (apariencia física del producto)</h2>

<p><label><input type="radio" name="vistosidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="vistosidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="vistosidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="vistosidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="vistosidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="vistosidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="vistosidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentvist"></label></p></div>

<div><h2>Multiplicidad de usos o aplicaciones del producto (versatilidad del producto)</h2>

<p><label><input type="radio" name="multiplicidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="multiplicidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="multiplicidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="multiplicidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="multiplicidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="multiplicidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="multiplicidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentmulti"></label></p></div>

<div><h2>Practicidad y resistencia del envasado del producto (calidad del envase o contenedor del producto)</h2>

<p><label><input type="radio" name="resistencia" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="resistencia" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="resistencia" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="resistencia" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="resistencia" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="resistencia" value="6">No aplica</label></p>
<p><label><input type="radio" name="resistencia" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentresis"></label></p></div>

<div><h2>Funcionalidad de la marca del producto (facil recordación, identificativo del servicio, facil de pronunciar, etc)</h2>

<p><label><input type="radio" name="funcionalidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="funcionalidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentfunc"></label></p></div>

<div><h2>Funcionalidad de la marca del producto (facil recordación, identificativo del servicio, facil de pronunciar, etc)</h2>

<p><label><input type="radio" name="funcionalidad" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="funcionalidad" value="6">No aplica</label></p>
<p><label><input type="radio" name="funcionalidad" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentfunc"></label></p></div>

<div><h2>Descripción e información del etiquetado del producto</h2>

<p><label><input type="radio" name="descripcion" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="descripcion" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="descripcion" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="descripcion" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="descripcion" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="descripcion" value="6">No aplica</label></p>
<p><label><input type="radio" name="descripcion" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentdesc"></label></p></div>

<div><h2>Practicidad del empaque del producto (cobertor o cubierta resistente, de facil transporte y manipulacion)</h2>

<p><label><input type="radio" name="empaque" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="empaque" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="empaque" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="empaque" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="empaque" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="empaque" value="6">No aplica</label></p>
<p><label><input type="radio" name="empaque" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentemp"></label></p></div>

<div><h2>Vistosidad del empaque del producto (diseno del empaque o cobertor del producto)</h2>

<p><label><input type="radio" name="diseno" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="diseno" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="diseno" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="diseno" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="diseno" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="diseno" value="6">No aplica</label></p>
<p><label><input type="radio" name="diseno" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentdis"></label></p></div>

<div><h2>Contenido de productos por bultos de productos</h2>

<p><label><input type="radio" name="contxbulto" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="contxbulto" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="contxbulto" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="contxbulto" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="contxbulto" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="contxbulto" value="6">No aplica</label></p>
<p><label><input type="radio" name="contxbulto" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentcbult"></label></p></div>

<div><h2>Facilidad de transporte y manipulación de bultos de productos</h2>

<p><label><input type="radio" name="facilidadtransporte" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="facilidadtransporte" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="facilidadtransporte" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="facilidadtransporte" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="facilidadtransporte" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="facilidadtransporte" value="6">No aplica</label></p>
<p><label><input type="radio" name="facilidadtransporte" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentftrans"></label></p></div>

<div><h2>Garantias del producto (aval para el consumidor en caso de fallos o irregularidades del producto)</h2>

<p><label><input type="radio" name="garantias" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="garantias" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="garantias" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="garantias" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="garantias" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="garantias" value="6">No aplica</label></p>
<p><label><input type="radio" name="garantias" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentgar"></label></p></div>

<div><h2>Servicios de soporte tecnico (sistemas, procesos, soportes, personal, etc, de soporte tecnico asociado al producto)</h2>

<p><label><input type="radio" name="soporte" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="soporte" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="soporte" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="soporte" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="soporte" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="soporte" value="6">No aplica</label></p>
<p><label><input type="radio" name="soporte" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentsop"></label></p></div>

<div><h2>Servicios de Atencion Postventa (devoluciones y cambios, seguimiento de satisfaccion del cliente, etc.)</h2>

<p><label><input type="radio" name="atencion" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="atencion" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="atencion" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="atencion" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="atencion" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="atencion" value="6">No aplica</label></p>
<p><label><input type="radio" name="atencion" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentate"></label></p></div>

<div><h2>Servicio Call Center / Telemarketing (atencion a reclamos, solicitudes, sugerencias, etc)</h2>

<p><label><input type="radio" name="reclamos" value="1">Absolutamente sin importancia(No influye en la decisión de compra)</label></p>
<p><label><input type="radio" name="reclamos" value="2">Poco importante(influye poco en la decisión de compra)</label></p>
<p><label><input type="radio" name="reclamos" value="3">Ni importante / ni poco importante(medianamente influyente en la compra)</label></p>
<p><label><input type="radio" name="reclamos" value="4">Importante(influye algo en la decisión de compra)</label></p>
<p><label><input type="radio" name="reclamos" value="5">Sumamente importante(influye mucho en la decisión de compra)</label></p>
<p><label><input type="radio" name="reclamos" value="6">No aplica</label></p>
<p><label><input type="radio" name="reclamos" value="7">No sabe</label></p>
<p><label>Comentarios:<input type="text" name="commentrec"></label></p>
			<br class="clear">
			
		</article>
		<!-- /Article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- Article -->
		<article>
			
	</article>		<div><h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
		</article>
		<!-- /Article -->
	
	<?php endif; ?>
	
	</div>
		
</section>
<!-- /Section -->

<?php get_footer(); ?>