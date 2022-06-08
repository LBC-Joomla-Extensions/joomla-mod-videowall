function subeVol(){
    document.getElementById("boton-volup").style.display="none";
    document.getElementById("boton-volmute").style.display="block";

    var video=document.getElementById("video-fondo");
    
    if(video!=null){
        video.muted=false;
    }
    
    video=document.getElementById("video-fondo-hd");
    if(video!=null){
        video.muted=false;
    }
    
}

function muteVol(){
    document.getElementById("boton-volup").style.display="block";
    document.getElementById("boton-volmute").style.display="none";

    var video=document.getElementById("video-fondo");
    
    if(video!=null){
        video.muted=true;
    }
    
    video=document.getElementById("video-fondo-hd");
    if(video!=null){
        video.muted=true;
    }
}

module.exports = {
    subeVol: subeVol,
    muteVol: muteVol,
};