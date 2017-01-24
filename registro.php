<section id="registrar">
	<a class="hiddenanchor" id="toregistro"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<section id="wrap">
	<article id="registro" class="animate form">
	<p class="r_button">Regístrate</p>
	<form method="post" autocomplete="off" id="r_form">
		<input type="text" class="required" id="fname" name="fname" placeholder="NOMBRE *">
		<input type="text" class="required" id="lname" name="lname" placeholder="APELLIDO *">
		<input type="email" class="required email" id="email" name="email" placeholder="CORREO ELECTRÓNICO *">
		<input type="password" id="password" name="password" placeholder="CONTRASEÑA *">
		<input type="password" id="rpassword" name="rpassword" placeholder="REPETIR CONTRASEÑA *">
		<input type="submit" name="registro" value="REGISTRAR">
		<p>¿Ya tienes cuenta? <a href="#tologin">Inicia sesión</a></p>
		<p id="message"></p>
	</form>
	</article>
	<article id="login" class="animate form">
	<p class="r_button">Login</p>
	<form method="post" id="l_form">
		<input type="text" class="required email" id="lemail" name="email" placeholder="CORREO ELECTRONICO">
		<input type="password" class="required" id="lpassword" name="clave" placeholder="CONTRASEÑA">
		<p>¿Eres nuevo? <a href="#toregistro">Regístrate aquí</a></p>
		<input type="submit" name="entrar" value="Entrar">
		<p id="lmessage"></p>
	</form>
	</article>
	</section>	
</section>	
<?php /*<tr>
<td class="terms"><input type="checkbox" class="required" name="terminos" id="terminos" value="1"><label for="terminos">He leído y acepto los <a href="/terms-and-conditions" rel="shadowbox;width=1200" class="shadowbox" target="_self">terminos y condiciones</a> de themarketingplanner.com</label><p class="clear"></p></td>
	</tr>*/ ?>