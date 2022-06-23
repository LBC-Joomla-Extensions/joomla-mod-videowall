<?php

defined("_JEXEC") or die;

$doc=JFactory::getDocument();

$doc->addStyleSheet(JURI::base() . "modules/mod_videotitulo/css/main.css");
$doc->addScript(JURI::base() . "modules/mod_videotitulo/js/main.js","text/javascript");


?>
<div id="video-outer-wrapper" class="<?php if( $params['es-url']){ echo "embed"; } ?>">
    <div id="video-inner-wrapper">
        <?php if( !$params['es-url']){ ?>
            <video autoplay muted loop id="video-fondo" class="video-resource">
                <source id="video" src="images/<?php echo $params['ruta-video']; ?>" type="video/mp4">            
            </video>
            <video autoplay muted loop id="video-fondo-hd" class="video-resource">            
                <source id="video-hd" src="images/<?php echo $params['ruta-video-hd']; ?>" type="video/mp4">
            </video>
        <?php }else{ ?>
            <iframe width="560" height="315" src="<?php echo $params['url-video'] . '?autoplay=1&mute=1'; ?>" class="video-resource" title="Transition Festival 2022 Aftermovie" frameborder="0"  allowfullscreen></iframe>
        <?php }?>
    </div>

    <div id="boton-vol">
        <i id="boton-volup" class="fas fa-volume-up" onclick="subeVol()"></i>
        <i id="boton-volmute" class="fas fa-volume-mute" onclick="muteVol()"></i>
    </div>


    <div id="welcome-wrapper">
        <h1><span> <?php echo $params['titulo-linea-1']; ?> </span><span><?php echo $params['titulo-linea-2']; ?></span></h1>
    </div>
</div>

<script>
    var v;
    if(document.documentElement.clientWidth>1024){
        v=document.getElementById("video-fondo");        
    }
    else{
        v=document.getElementById("video-fondo-hd");
    }

    v.parentNode.removeChild(v);
</script>