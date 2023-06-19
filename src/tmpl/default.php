<?php

defined("_JEXEC") or die;

use Joomla\CMS\Uri\Uri;

// $urlBase = Uri::root();
$urlBase = JURI::base();
$doc=JFactory::getDocument();

$doc->addStyleSheet($urlBase . "modules/mod_videotitulo/css/main.css");
$doc->addScript($urlBase . "modules/mod_videotitulo/js/main.js","text/javascript");

if(!$params['es-url']){
    $ruta1 = $urlBase . $params['ruta-video'];
}
else{
    $ruta1 = $params['url-video'] . "?version=3";

    if($params['url-video-autoplay']){
        $ruta1 .= "&mute=1&autoplay=1";
    }

    if($params['url-video-loop'] && !empty($params['url-video-id'])){
        $ruta1 .= "&loop=1&playlist=" . $params['url-video-id'];
    }
}
?>
<div class="video-outer-wrapper <?php if( $params['es-url']){ echo "embed"; } ?>">
    <div class="video-inner-wrapper">
        <?php if( !$params['es-url']){ ?>
            <video 
                autoplay muted loop playsinline
                id="video-fondo" 
                class="video-resource"
                <?php if($params['poster']!=""){ echo "poster='/".$params['poster']."'";} ?> 
                >
                <?php if($params['lazy-video']){ ?>
                    <source data-src="<?php echo $ruta1; ?>" type="video/mp4">
                <?php
                }
                else{
                ?>
                    <source id="video" src="<?php echo $ruta1; ?>" type="video/mp4">
                <?php
                }
                ?>
                            
            </video>           
        <?php }else{ ?>
            <iframe width="560" height="315" src="<?php echo $ruta1; ?>" class="video-resource" title="Transition Festival 2022 Aftermovie" frameborder="0"  allowfullscreen></iframe>
        <?php }?>
    </div>

    <div class="boton-vol">
        <i id="boton-volup" class="fas fa-volume-up" onclick="subeVol()"></i>
        <i id="boton-volmute" class="fas fa-volume-mute" onclick="muteVol()"></i>
    </div>


    <div class="video-overlay">
        <?php echo $params['inner-html']; ?>
    </div>
</div>

<?php if($params['lazy-video']){ ?>
<script>
    document.addEventListener("DOMContentLoaded", lazyLoadVideos(".video-outer-wrapper video"));
</script>
<?php } ?>