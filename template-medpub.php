<?php /* Template Name: Cuestionario medios publicitarios */

	ob_start();

	$conexion = mysqli_connect("localhost","i1380332_wp1","E@s9P*DJy&63^[0","i1380332_wp1");

	include("config/iniciar-session.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	/* cuestionario actual */
	$query_promocion = mysqli_query("SELECT periodico,impresos,radio,tv,tvcable,internet,redes,pubext,mediosdirectos,mktdirecto,matemp FROM wp_tmp_ipromocion WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."'");
		if(mysqli_num_rows($query_promocion) > 0){
			
			 

		}
	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		$query_redireccion = mysqli_query($conexion, "SELECT enlace FROM wp_tmp_redireccion WHERE servicio_id = '".$_SESSION['tmp_id_servicio']."' AND tproducto LIKE '%".$_SESSION['tmp_t_producto']."%' AND tconsumidor LIKE '%".$_SESSION['tmp_t_consumidor']."%' AND cuestionario_id  = '".$_POST['idc']."'");

		if(mysqli_num_rows($query_redireccion) > 0){

			$row_redireccion = mysqli_fetch_assoc($query_redireccion);

			$enlace = $row_redireccion["enlace"];

			header("Location:".$enlace);

		}

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
		
			<form method="post" id="irelacionespublicas">

<p>Evalúe el grado de importancia que tienen para competir en el mercado y tener una PROMOCIÓN EFECTIVA, cada uno de los items de RELACIONES PUBLICAS mostrados a continuación (en los casos que aplique).</p>

<div id="periodicos">
<h2>Periodicos (Prensa)</h2>

<h3>Publicación en prensa convencional (diarios o semanarios de informacion general).</h3>

<p><label><input type="radio" name="pconvencional" value="1">Poco importante</label></p>
<p><label><input type="radio" name="pconvencional" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="pconvencional" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="pconvencional" value="4">Muy importante</label></p>
<p><label><input type="radio" name="pconvencional" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="pconvencional" value="6">No aplica</label></p>
<p><label><input type="radio" name="pconvencional" value="7">No sabe</label></p>

<h3>Publicación en prensa especializada (deportes, politica, economia, etc).</h3>

<p><label><input type="radio" name="pespecializada" value="1">Poco importante</label></p>
<p><label><input type="radio" name="pespecializada" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="pespecializada" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="pespecializada" value="4">Muy importante</label></p>
<p><label><input type="radio" name="pespecializada" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="pespecializada" value="6">No aplica</label></p>
<p><label><input type="radio" name="pespecializada" value="7">No sabe</label></p>

<h3>Publicación de anuncios DE GRAN TAMAÑO (medias o paginas completas) en prensa.</h3>

<p><label><input type="radio" name="gtamano" value="1">Poco importante</label></p>
<p><label><input type="radio" name="gtamano" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="gtamano" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="gtamano" value="4">Muy importante</label></p>
<p><label><input type="radio" name="gtamano" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="gtamano" value="6">No aplica</label></p>
<p><label><input type="radio" name="gtamano" value="7">No sabe</label></p>

<h3>Publicacion de anuncios DE TAMANOS MEDIOS O PEQUEÑOS en prensa.</h3>

<p><label><input type="radio" name="pmtamaño" value="1">Poco importante</label></p>
<p><label><input type="radio" name="pmtamaño" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="pmtamaño" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="pmtamaño" value="4">Muy importante</label></p>
<p><label><input type="radio" name="pmtamaño" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="pmtamaño" value="6">No aplica</label></p>
<p><label><input type="radio" name="pmtamaño" value="7">No sabe</label></p>

<h3>Uso de formatos NO convencionales en los anuncios de prensa.</h3>

<p><label><input type="radio" name="nconvencional" value="1">Poco importante</label></p>
<p><label><input type="radio" name="nconvencional" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="nconvencional" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="nconvencional" value="4">Muy importante</label></p>
<p><label><input type="radio" name="nconvencional" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="nconvencional" value="6">No aplica</label></p>
<p><label><input type="radio" name="nconvencional" value="7">No sabe</label></p>

<h3>Uso de formatos convencionales en los anuncios de prensa.</h3>

<p><label><input type="radio" name="convencional" value="1">Poco importante</label></p>
<p><label><input type="radio" name="convencional" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="convencional" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="convencional" value="4">Muy importante</label></p>
<p><label><input type="radio" name="convencional" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="convencional" value="6">No aplica</label></p>
<p><label><input type="radio" name="convencional" value="7">No sabe</label></p>

<h3>Encartes en periodicos.</h3>

<p><label><input type="radio" name="encartes" value="1">Poco importante</label></p>
<p><label><input type="radio" name="encartes" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="encartes" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="encartes" value="4">Muy importante</label></p>
<p><label><input type="radio" name="encartes" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="encartes" value="6">No aplica</label></p>
<p><label><input type="radio" name="encartes" value="7">No sabe</label></p>

<h3>Anuncios en periodico en formato de "Publi-reportajes" (avisos pagados por la marca que simulan ser noticias).</h3>

<p><label><input type="radio" name="publireportaje" value="1">Poco importante</label></p>
<p><label><input type="radio" name="publireportaje" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="publireportaje" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="publireportaje" value="4">Muy importante</label></p>
<p><label><input type="radio" name="publireportaje" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="publireportaje" value="6">No aplica</label></p>
<p><label><input type="radio" name="publireportaje" value="7">No sabe</label></p>

<h3>Patrocinio de secciones.</h3>

<p><label><input type="radio" name="patrocinio" value="1">Poco importante</label></p>
<p><label><input type="radio" name="patrocinio" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="patrocinio" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="patrocinio" value="4">Muy importante</label></p>
<p><label><input type="radio" name="patrocinio" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="patrocinio" value="6">No aplica</label></p>
<p><label><input type="radio" name="patrocinio" value="7">No sabe</label></p>

</div>

<div id="revistas">
<h2>Revistas</h2>
<h3>Publicacion en revistas convencionales (informacion general - variada).</h3>

<p><label><input type="radio" name="prconvencionales" value="1">Poco importante</label></p>
<p><label><input type="radio" name="prconvencionales" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="prconvencionales" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="prconvencionales" value="4">Muy importante</label></p>
<p><label><input type="radio" name="prconvencionales" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="prconvencionales" value="6">No aplica</label></p>
<p><label><input type="radio" name="prconvencionales" value="7">No sabe</label></p>

<h3>Publicación en revistas especializadas (deportes, politica, economia, etc).</h3>

<p><label><input type="radio" name="prespecializadas" value="1">Poco importante</label></p>
<p><label><input type="radio" name="prespecializadas" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="prespecializadas" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="prespecializadas" value="4">Muy importante</label></p>
<p><label><input type="radio" name="prespecializadas" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="prespecializadas" value="6">No aplica</label></p>
<p><label><input type="radio" name="prespecializadas" value="7">No sabe</label></p>

<h3>Publicación de anuncios DE GRAN TAMAÑO (medias o páginas completas) en revistas.</h3>

<p><label><input type="radio" name="grant" value="1">Poco importante</label></p>
<p><label><input type="radio" name="grant" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="grant" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="grant" value="4">Muy importante</label></p>
<p><label><input type="radio" name="grant" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="grant" value="6">No aplica</label></p>
<p><label><input type="radio" name="grant" value="7">No sabe</label></p>

<h3>Publicacion de anuncios DE TAMAÑOS MEDIOS O PEQUEÑOS en revistas.</h3>

<p><label><input type="radio" name="tmedpeq" value="1">Poco importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="4">Muy importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="6">No aplica</label></p>
<p><label><input type="radio" name="tmedpeq" value="7">No sabe</label></p>

<h3>Uso de formatos NO convencionales en los anuncios de revista.</h3>

<p><label><input type="radio" name="mescrito" value="1">Poco importante</label></p>
<p><label><input type="radio" name="mescrito" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="mescrito" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="mescrito" value="4">Muy importante</label></p>
<p><label><input type="radio" name="mescrito" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="mescrito" value="6">No aplica</label></p>
<p><label><input type="radio" name="mescrito" value="7">No sabe</label></p>

<h3>Uso de formatos convencionales en los anuncios de revista.</h3>

<p><label><input type="radio" name="videoscorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="videoscorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="videoscorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="videoscorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="videoscorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="videoscorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="videoscorp" value="7">No sabe</label></p>

<h3>Encartes en revistas.</h3>

<p><label><input type="radio" name="materialcorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="materialcorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="materialcorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="materialcorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="materialcorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="materialcorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="materialcorp" value="7">No sabe</label></p>

<h3>Anuncios en revistas en formato de "Publi-reportajes" (avisos pagados por la marca que simulan ser noticias).</h3>

<p><label><input type="radio" name="identidadcorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="identidadcorp" value="7">No sabe</label></p>

<h3>Patrocinio de secciones en revistas.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

</div>

<div class="cine">
<h2>Cine</h2>

<h3>Inserción de spots publicitarios (comerciales audiovisuales) en CINE.</h3>

<p><label><input type="radio" name="convencionales" value="1">Poco importante</label></p>
<p><label><input type="radio" name="convencionales" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="convencionales" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="convencionales" value="4">Muy importante</label></p>
<p><label><input type="radio" name="convencionales" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="convencionales" value="6">No aplica</label></p>
<p><label><input type="radio" name="convencionales" value="7">No sabe</label></p>

<h3>Publi-reportajes (spots pagados por la marca que simulan ser noticias).</h3>

<p><label><input type="radio" name="servpublico" value="1">Poco importante</label></p>
<p><label><input type="radio" name="servpublico" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="servpublico" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="servpublico" value="4">Muy importante</label></p>
<p><label><input type="radio" name="servpublico" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="servpublico" value="6">No aplica</label></p>
<p><label><input type="radio" name="servpublico" value="7">No sabe</label></p>
</div>

<div class="tvabierta">
<h2>Televisión abierta</h2>

<h3>Inserción de Spots publicitarios (inserción de comerciales audiovisuales en TV abierta).</h3>

<p><label><input type="radio" name="sitecorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="sitecorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="sitecorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="sitecorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="sitecorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="sitecorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="sitecorp" value="7">No sabe</label></p>


<h3>Patrocinio de programas o secciones.</h3>

<p><label><input type="radio" name="grant" value="1">Poco importante</label></p>
<p><label><input type="radio" name="grant" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="grant" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="grant" value="4">Muy importante</label></p>
<p><label><input type="radio" name="grant" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="grant" value="6">No aplica</label></p>
<p><label><input type="radio" name="grant" value="7">No sabe</label></p>

<h3>Publi-reportajes (spots pagados por la marca que simulan ser noticias).</h3>

<p><label><input type="radio" name="tmedpeq" value="1">Poco importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="4">Muy importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="tmedpeq" value="6">No aplica</label></p>
<p><label><input type="radio" name="tmedpeq" value="7">No sabe</label></p>

<h3>Patrocinio de programas o secciones.</h3>

<p><label><input type="radio" name="mescrito" value="1">Poco importante</label></p>
<p><label><input type="radio" name="mescrito" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="mescrito" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="mescrito" value="4">Muy importante</label></p>
<p><label><input type="radio" name="mescrito" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="mescrito" value="6">No aplica</label></p>
<p><label><input type="radio" name="mescrito" value="7">No sabe</label></p>

<h3>Infocomerciales.</h3>

<p><label><input type="radio" name="videoscorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="videoscorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="videoscorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="videoscorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="videoscorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="videoscorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="videoscorp" value="7">No sabe</label></p>

<h3>Product Placement (ubicación de la marca o producto en set de programas).</h3>

<p><label><input type="radio" name="materialcorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="materialcorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="materialcorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="materialcorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="materialcorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="materialcorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="materialcorp" value="7">No sabe</label></p>

<h3>Insert de cintillos, logo o mensaje en pantalla durante trasnmision de programas.</h3>

<p><label><input type="radio" name="identidadcorp" value="1">Poco importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="4">Muy importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="identidadcorp" value="6">No aplica</label></p>
<p><label><input type="radio" name="identidadcorp" value="7">No sabe</label></p>
</div>

<div class="tvsuscripcion">
<h2>Televisión por suscripción</h2>

<h3>Inserción de spots publicitarios en canales de TV por suscripcion.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Patrocinio de programas o secciones.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Publi-reportajes (spots pagados por la marca que simulan ser noticias).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>
</div>

<div class="radio">
<h2>Radio</h2>

<h3>Inserción de cuñas publicitarias.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Patrocinio de programas o secciones.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Noti-reportajes (cuñas pagadas por la marca que simulan ser noticias.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>
</div>
<div class="pubext">
<h2>Publicidad exterior</h2>

<h3>Vallas publicitarias.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Publicidad móvil (en medios de transporte).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Murales (paredes de las ciudades).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Presencia de marca en kioskos y otros establecimientos comerciales pequeños.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Publicidad en calle (paradas de transporte público, bancos, columnas, elevadores, etc).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Gigantografias.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Publicidad en malls / centros comerciales / Tiendas grandes.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>
</div>

<div class="internet">

<h2>Internet</h2>

<h3>Website de la marca o corporación.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Blogs de la marca.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Inserción de banners en websites.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Inserción de videos comerciales en websites y/o contenidos por Internet.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Disposición de cuenta y publicación de videos en Youtube.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Desarrollo de aplicación móvil para la marca.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Publicidad en aplicaciones moviles.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Marketing viral (mensajes diseñados para ser compartida masivamente en telefonos, redes sociales y demas aplicaciones sociales).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>
</div>

<div class="redes">
<h2>Redes sociales y aplicaciones moviles</h2>

<h3>Twitter.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Facebook.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Pinterest.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Instagram.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>LinkedIn.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Flickr.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

</div>

<div class="btl">
<h2>BELOW THE LINE (BTL)</h2>

<h3>Perfomance promocional de calle (en plazas, esquinas, calles, entre otros espacios publicos).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Performance promocional en eventos públicos o privados.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Publicidad en medios alternativos NO convencionales. Cuales: .</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Ferias o eventos promocionales de la marca.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>
</div>

<div class="matemp">
<h2>MATERIAL EMPRESARIAL</h2>

<h3>Flyers publicitarios o de ventas.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Dipticos, trípticos o similares .</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Posters.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Stickers.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Presentación digital - impresa de la Empresa y productos.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Sales kit (catalogo o broshure impreso o digital de ventas).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Material POP (boligrafos, vasos, mousepads, indumentaria, accesorios y/o souvenirs con presencia de marca y/o producto).</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Impresos corporativos: carpetas, hojas, sobres y demas impresos membretados con la marca.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

<h3>Uniformes corporativos con presencia visible de la marca.</h3>

<p><label><input type="radio" name="matcorpinternet" value="1">Poco importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="2">Ligeramente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="3">Medianamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="4">Muy importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="5">Sumamente importante</label></p>
<p><label><input type="radio" name="matcorpinternet" value="6">No aplica</label></p>
<p><label><input type="radio" name="matcorpinternet" value="7">No sabe</label></p>

</div>

<p class="clear"><input type="hidden" name="idc" value="276" /></p>

<div class="saving"></div>	

<input type="submit" name="siguiente" class="next" value="Siguiente">

</form>
			
			<br class="clear">
			
		</article>
		<!-- /Article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- Article -->
		<article>
			
			<h3><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h3>
			
		</article>
		<!-- /Article -->
	
	<?php endif; ?>
	
	</div>
		
</section>
<!-- /Section -->

<?php get_footer(); ?>