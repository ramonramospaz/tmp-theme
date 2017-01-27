<?php 

$url = get_home_url()."/";
$url2 ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if($url == $url2){ ?>

<li><a href="#home" rel="m_PageScroll2id">HOME</a></li>
<li><a href="#about" rel="m_PageScroll2id">ACERCA DE MI</a></li>
<li><a href="<?php echo get_home_url(); ?>/servicios-online" rel="m_PageScroll2id">MIS SERVICIOS ONLINE</a></li>
<li><a href="<?php echo get_home_url(); ?>/#" rel="m_PageScroll2id">MIS SERVICIOS DE ASESORÍA</a></li>
<li><a href="#planes" rel="m_PageScroll2id">TUS PLANES DE MARKETING</a></li>
<li><a href="#blog" rel="m_PageScroll2id">BLOG</a></li> */?>
<li><a href="#contacto" rel="m_PageScroll2id">CONTACTO</a></li>

<?php } else { 

if(qtranxf_getLanguage()=="es"){

	?>

<li><a href="<?php echo get_home_url(); ?>/inicio/" rel="m_PageScroll2id">HOME</a></li>
<li><a href="<?php echo get_home_url(); ?>/inicio/#about" rel="m_PageScroll2id">ACERCA DE MI</a></li>
<li><a href="<?php echo get_home_url(); ?>/servicios-online" rel="m_PageScroll2id">MIS SERVICIOS ONLINE</a></li>
<li><a href="<?php echo get_home_url(); ?>/mis-servicios-de-asesoria" rel="m_PageScroll2id">MIS SERVICIOS DE ASESORÍA</a></li>
<li><a href="<?php echo get_home_url(); ?>/inicio/#planes" rel="m_PageScroll2id">TUS PLANES DE MARKETING</a></li>
<?php /*<li><a href="<?php echo get_home_url(); ?>/inicio/#blog" rel="m_PageScroll2id">BLOG</a></li> */?>
<li><a href="<?php echo get_home_url(); ?>/inicio/#contacto" rel="m_PageScroll2id">CONTACTO</a></li>

<?php 
}
if(qtranxf_getLanguage()=="en"){ 
?>

<li><a href="<?php echo get_home_url(); ?>/inicio/" rel="m_PageScroll2id">HOME</a></li>
<li><a href="<?php echo get_home_url(); ?>/inicio/#about" rel="m_PageScroll2id">ABOUT ME</a></li>
<li><a href="<?php echo get_home_url(); ?>/servicios-online" rel="m_PageScroll2id">MY ONLINE SERVICES</a></li>
<li><a href="<?php echo get_home_url(); ?>/mis-servicios-de-asesoria" rel="m_PageScroll2id">MY CONSULTING SERVICES</a></li>
<li><a href="<?php echo get_home_url(); ?>/inicio/#planes" rel="m_PageScroll2id">YOUR MARKETING PLANS</a></li>
<?php /*<li><a href="<?php echo get_home_url(); ?>/inicio/#blog" rel="m_PageScroll2id">BLOG</a></li> */?>
<li><a href="<?php echo get_home_url(); ?>/inicio/#contacto" rel="m_PageScroll2id">CONTACT</a></li>


<?php
}
} ?>