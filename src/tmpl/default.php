<?php

defined("_JEXEC") or die;

$doc=JFactory::getDocument();

$doc->addStyleSheet(JURI::base() . "modules/mod_videotitulo/css/main.css");
$doc->addScript(JURI::base() . "modules/mod_videotitulo/js/main.js","text/javascript");

if(!$params['es-url']){
    $ruta1 = $params['ruta-video'];
    $ruta2 = $params['ruta-video-hd'];
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
            <video autoplay muted loop id="video-fondo" class="video-resource">
                <source id="video" src="images/<?php echo $ruta1; ?>" type="video/mp4">            
            </video>
            <video autoplay muted loop id="video-fondo-hd" class="video-resource">            
                <source id="video-hd" src="images/<?php echo $ruta2; ?>" type="video/mp4">
            </video>
        <?php }else{ ?>
            <iframe width="560" height="315" src="<?php echo $ruta1; ?>" class="video-resource" title="Transition Festival 2022 Aftermovie" frameborder="0"  allowfullscreen></iframe>
        <?php }?>
    </div>

    <div class="boton-vol">
        <i id="boton-volup" class="fas fa-volume-up" onclick="subeVol()"></i>
        <i id="boton-volmute" class="fas fa-volume-mute" onclick="muteVol()"></i>
    </div>


    <div class="welcome-wrapper">
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