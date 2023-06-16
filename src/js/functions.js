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

function lazyLoadVideos(querySelector = ".video-outer-wrapper video") {
    var lazyVideos = [].slice.call(document.querySelectorAll(querySelector));

    if ("IntersectionObserver" in window) {        
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(video) {
        if (video.isIntersecting) {
            for (var source in video.target.children) {
                var videoSource = video.target.children[source];
                if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                    videoSource.src = videoSource.dataset.src;
                    
                }
            }
            console.info("Video loading")
            video.target.load();
            video.target.dispatchEvent(videoLoadingEvent);
            // video.target.classList.remove("lazy");
            lazyVideoObserver.unobserve(video.target);
        }
        });
    });

    lazyVideos.forEach(function(lazyVideo) {
        lazyVideoObserver.observe(lazyVideo);
    });
    }
}

const videoLoadingEvent = new Event("videoLoading", {    
    bubbles: true,
    cancelable: true,
    composed: false,
});


module.exports = {
    subeVol: subeVol,
    muteVol: muteVol,
    lazyLoadVideos: lazyLoadVideos,
};