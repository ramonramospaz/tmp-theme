<?php /* Template Name: Cuestionario Template */

	ob_start();

	include("config/conexion.php");

	include("config/iniciar-session.php");

	include("perfil-demografico.php");

	if($_SESSION["tmp_status"] < 1){

		header("Location: /payment");

	}
	if(isset($_POST["siguiente"]) && $_POST["siguiente"] == 'Siguiente'){

		header("Location: /success.php");

	}

?>

<?php get_header(); ?>	

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dependent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/autosave.js"></script>

	<!-- Section -->
	<section class="cuestionario mresize">

	<div class="wrapper">
	
		<article>

		<h1>Perfil demografico</h1>

			<p>Describa en terminos generales al consumidor de su producto, en cuanto a cada una de las categorias y rangos mencionados a continuacion, seleccionando la opcion que mas lo identifique</p>
				
			<!-- Form -->
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="pdemografico">

				<h2>Edad</h2>

				<p><input type="radio" name="edad" id="e1" <?php echo $e1; ?> value="1"><label for="e1">Menor de 5 anos</label></p>
				<p><input type="radio" name="edad" id="e2" <?php echo $e2; ?> value="2"><label for="e2">de 6 a 12</label></p>
				<p><input type="radio" name="edad" id="e3" <?php echo $e3; ?> value="3"><label for="e3">de 13 a 17</label></p>
				<p><input type="radio" name="edad" id="e4" <?php echo $e4; ?> value="4"><label for="e4">de 18 a 25</label></p>
				<p><input type="radio" name="edad" id="e5" <?php echo $e5; ?> value="5"><label for="e5">de 26 a 39</label></p>
				<p><input type="radio" name="edad" id="e6" <?php echo $e6; ?> value="6"><label for="e6">de 40 a 59</label></p>
				<p><input type="radio" name="edad" id="e7" <?php echo $e7; ?> value="7"><label for="e7">de 60 a 74</label></p>
				<p><input type="radio" name="edad" id="e8" <?php echo $e8; ?> value="8"><label for="e8">Mas de 75</label></p>
				<p><input type="radio" name="edad" id="e9" <?php echo $e9; ?> value="9"><label for="e9">No sabe / No contesta</label></p>

				<h2>Genero</h2>

				<p><input type="radio" name="genero" id="g1" <?php echo $g1; ?> value="1"><label for="g1">Hombre</label></p>
				<p><input type="radio" name="genero" id="g2" <?php echo $g2; ?> value="2"><label for="g2">Mujer</label></p>
				<p><input type="radio" name="genero" id="g3" <?php echo $g3; ?> value="3"><label for="g3">Hombre homosexual</label></p>
				<p><input type="radio" name="genero" id="g4" <?php echo $g4; ?> value="4"><label for="g4">Mujer homosexual</label></p>
				<p><input type="radio" name="genero" id="g5" <?php echo $g5; ?> value="5"><label for="g5">Otro:<input type="text" name="otrogenero" value="<?php echo $otrogenero; ?>"></label></p>
				<p><input type="radio" name="genero" id="g6" <?php echo $g6; ?> value="6"><label for="g6">No sabe / No contesta</label></p>

				<h2>Estado civil</h2>

				<p><input type="radio" name="ecivil" id="ec1" <?php echo $ec1; ?> value="1"><label for="ec1">Solteros</label></p>
				<p><input type="radio" name="ecivil" id="ec2" <?php echo $ec2; ?> value="2"><label for="ec2">Parejas en convivencia</label></p>
				<p><input type="radio" name="ecivil" id="ec3" <?php echo $ec3; ?> value="3"><label for="ec3">Casados</label></p>
				<p><input type="radio" name="ecivil" id="ec4" <?php echo $ec4; ?> value="4"><label for="ec4">Divorciados</label></p>
				<p><input type="radio" name="ecivil" id="ec5" <?php echo $ec5; ?> value="5"><label for="ec5">Viudos</label></p>
				<p><input type="radio" name="ecivil" id="ec6" <?php echo $ec6; ?> value="6"><label for="ec6">Otro:<input type="text" name="otroecivil" value="<?php echo $otroecivil; ?>"></label></p>
				<p><input type="radio" name="ecivil" id="ec7" <?php echo $ec7; ?> value="7"><label for="ec7">No sabe / No contesta</label></p>

				<h2>Indique el promedio aproximado de ingreso mensual del consumidor de su producto, en dolares americanos (USD$)</h2>

				<p><input type="radio" name="imensual" id="im1" <?php echo $im1; ?> value="1"><label for="im1"><input type="text" class="small" name="ingreso" value="<?php echo $ingreso; ?>"></label></p>
				<p><input type="radio" name="imensual" id="im2" <?php echo $im2; ?> value="2"><label for="im2">No sabe / No contesta</label></p>

				<h2>Grado de instrucción</h2>

				<p><input type="radio" name="ginstruccion" id="gi1" <?php echo $gi1; ?> value="1"><label for="gi1">Hasta primaria o secundaria incompleta</label></p>
				<p><input type="radio" name="ginstruccion" id="gi2" <?php echo $gi2; ?> value="2"><label for="gi2">Bachiller</label></p>
				<p><input type="radio" name="ginstruccion" id="gi3" <?php echo $gi3; ?> value="3"><label for="gi3">Tecnico</label></p>
				<p><input type="radio" name="ginstruccion" id="gi4" <?php echo $gi4; ?> value="4"><label for="gi4">Universitario</label></p>
				<p><input type="radio" name="ginstruccion" id="gi5" <?php echo $gi5; ?> value="5"><label for="gi5">Postgrados</label></p>
				<p><input type="radio" name="ginstruccion" id="gi6" <?php echo $gi6; ?> value="6"><label for="gi6">Otro:<input type="text" name="otrogi" value="<?php echo $otrogi; ?>"></label></p>
				<p><input type="radio" name="ginstruccion" id="gi7" <?php echo $gi7; ?> value="7"><label for="gi7">No sabe / No contesta</label></p>

				<h2>Ocupación</h2>

				<p><input type="radio" name="ocupacion" id="o1"  <?php echo $o1; ?>value="1"><label for="o1">Estudiante</label></p>
				<p><input type="radio" name="ocupacion" id="o2"  <?php echo $o2; ?>value="2"><label for="o2">Ama de casa</label></p>
				<p><input type="radio" name="ocupacion" id="o3"  <?php echo $o3; ?>value="3"><label for="o3">Empleado privado - publico</label></p>
				<p><input type="radio" name="ocupacion" id="o4"  <?php echo $o4; ?>value="4"><label for="o4">Desempleado </label></p>
				<p><input type="radio" name="ocupacion" id="o5"  <?php echo $o5; ?>value="5"><label for="o5">Trabajador independiente</label></p>
				<p><input type="radio" name="ocupacion" id="o6"  <?php echo $o6; ?>value="6"><label for="o6">Empresario</label></p>
				<p><input type="radio" name="ocupacion" id="o7"  <?php echo $o7; ?>value="7"><label for="o7">Comerciante</label></p>
				<p><input type="radio" name="ocupacion" id="o8"  <?php echo $o8; ?>value="8"><label for="o8">jubilado</label></p>
				<p><input type="radio" name="ocupacion" id="o9"  <?php echo $o9; ?>value="9"><label for="o9">Otro:<input type="text" name="otraocupacion" value="<?php echo $otraocupacion; ?>"></label></p>
				<p><input type="radio" name="ocupacion" id="o10" <?php echo $o10; ?> value="10"><label for="o10">No sabe / No contesta</label></p>

				<h2>¿A que ciclo de vida familiar pertenece mayoritariamente el consumidor de su producto?</h2>

				<p><input type="radio" name="cdvida" id="cv1" <?php echo $cdv1; ?> value="1"><label for="cv1">Solteros independientes sin hijos</label></p>
				<p><input type="radio" name="cdvida" id="cv2" <?php echo $cdv2; ?> value="2"><label for="cv2">Parejas jovenes sin hijos</label></p>
				<p><input type="radio" name="cdvida" id="cv3" <?php echo $cdv3; ?> value="3"><label for="cv3">Parejas con hijos pequenos</label></p>
				<p><input type="radio" name="cdvida" id="cv4" <?php echo $cdv4; ?> value="4"><label for="cv4">Parejas con hijos adolescentes o adultos aun en casa</label></p>
				<p><input type="radio" name="cdvida" id="cv5" <?php echo $cdv5; ?> value="5"><label for="cv5">Madres o padres solteros o divorciados viviendo con hijos</label></p>
				<p><input type="radio" name="cdvida" id="cv6" <?php echo $cdv6; ?> value="6"><label for="cv6">Parejas maduras solas con hijos fuera de la casa</label></p>
				<p><input type="radio" name="cdvida" id="cv7" <?php echo $cdv7; ?> value="7"><label for="cv7">Viudo(a) viviendo con hijo(a)</label></p>
				<p><input type="radio" name="cdvida" id="cv8" <?php echo $cdv8; ?> value="8"><label for="cv8">Otro:<input type="text" name="otrociclo" value="<?php echo $otrociclo; ?>"></label></p>
				<p><input type="radio" name="cdvida" id="cv9" <?php echo $cdv9; ?> value="9"><label for="cv9">No sabe / No contesta</label></p>

				<h2>Aproximadamente, ¿cuantas personas en promedio conforman el nucleo familiar del consumidor de su producto?</h2>

				<p><input type="radio" name="nfamiliar" id="n1" <?php echo $nf1; ?> value="1"><label for="n1">1 persona</label></p>
				<p><input type="radio" name="nfamiliar" id="n2" <?php echo $nf2; ?> value="2"><label for="n2">2 personas</label></p>
				<p><input type="radio" name="nfamiliar" id="n3" <?php echo $nf3; ?> value="3"><label for="n3">3 a 4 personas</label></p>
				<p><input type="radio" name="nfamiliar" id="n4" <?php echo $nf4; ?> value="4"><label for="n4">5 a 6 personas</label></p>
				<p><input type="radio" name="nfamiliar" id="n5" <?php echo $nf5; ?> value="5"><label for="n5">Mas de 7 personas</label></p>
				<p><input type="radio" name="nfamiliar" id="n6" <?php echo $nf6; ?> value="6"><label for="n6">No sabe / No contesta</label></p>
		
				<p class="clear"></p>

				<div class="saving"></div>

				<input type="submit" name="siguiente" class="next" value="Siguiente">

			</form>
			<!-- /Form -->

			<p class="clear"></p>

		</article>
			
	</div>
		
</section>
<!-- /Section -->

<?php get_footer(); ?>