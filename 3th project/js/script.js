
const wrapper = document.querySelector(".white-background");
musicName = wrapper.querySelector(".play-list .name");
musicArtist = wrapper.querySelector(".name-of-singer");
mainAudio = wrapper.querySelector("#main-audio");
playPuseBtn = wrapper.querySelector(".play-puse");
progressBar = wrapper.querySelector(".prograss-bar");
progressArea = wrapper.querySelector(".prograss-area");
NameOfThisSong = wrapper.querySelector(".control .name-of-song");

let musicIndex = 1;


const ulTag = wrapper.querySelector("ul");
// create li according to the array lengh

for (let i=0 ,  liOpacity =1 ; i<allMusic.length ; i++ ) {
    let n = allMusic.length;
    let z = 1/n;
    let materialsIcon = "play_arrow";
    // let's pass the song name , artist from array
    if(i!=0){
        materialsIcon = "lock";
    }

    let liTag = '<li li-index="'+(i+1)+'" class="song" style="opacity:'+ (1-(i*z)) +'">'+
                    '<i class="play-block play material-icons col-3">'+materialsIcon+'</i>'+
                    '<div class="audio  col-6">'+
                        '<span class="name">'+allMusic[i].name+'</span>'+
                        '<audio class="'+allMusic[i].src+'" src="songs/'+allMusic[i].src+".mp3"+'"></audio>'+
                    '</div>'+
                    '<span class=" col-3" id="'+allMusic[i].src+'">2:04</span>'+
                '</li>';
    
    // liTag.style.opacity = "1- (i*z)";
    
    ulTag.insertAdjacentHTML("beforeend" , liTag);

    let liAudioDuration = ulTag.querySelector('#'+allMusic[i].src);
    let liAudioTag = ulTag.querySelector('.'+allMusic[i].src);
    
    liAudioTag.addEventListener("loadeddata" , ()=>{
    let audioDuration = liAudioTag.duration;
    let totalMin = Math.floor(audioDuration / 60);
    let totalSec = Math.floor(audioDuration % 60);
    if(totalSec < 10){
        totalSec = "0".concat(totalSec);
    }
    liAudioDuration.innerText = "".concat(totalMin,":",totalSec);
    });
}



window.addEventListener("load" , ()=>{
    loadMusic(musicIndex);
    playingNow();
});

/* load music*/
function loadMusic(index){
    musicName.innerText = allMusic[index-1].name;
    musicArtist.innerText = allMusic[index-1].artist;
    NameOfThisSong.innerText = allMusic[index-1].name;
    mainAudio.src = 'songs/'.concat(allMusic[index-1].src,'.mp3');
    // console.log('songs/'.concat(allMusic[index-1].src,'.mp3'));
}

// play music fumction
function playMusic(){
    wrapper.classList.add("paused");
    playPuseBtn.querySelector("i").innerText = "pause";
    mainAudio.play();
}

// pause music fumction
function pauseMusic(){
    wrapper.classList.remove("paused");
    playPuseBtn.querySelector("i").innerText = "play_arrowe";
    mainAudio.pause();
}

// play or music button event
playPuseBtn.addEventListener("click",()=>{
    const isMusicPaused = wrapper.classList.contains("paused");
    isMusicPaused ? pauseMusic() : playMusic();
    playingNow();
});

mainAudio.addEventListener("timeupdate" , (e)=>{
    // console.log(e.target.currentTime);
    const currentTime = e.target.currentTime;
    const duration = e.target.duration;
    let progressWidth = (currentTime / duration) * 100;
    progressBar.style.width = "".concat(progressWidth,"%") ;
    // console.log("".concat(progressWidth,"%"));

let musicCurrentTime = wrapper.querySelector(".current");
musicDuration = wrapper.querySelector(".duration");
musicLeftTime = wrapper.querySelector(".left-time");



mainAudio.addEventListener("loadeddata" , ()=>{
    // update song total duration
    let audioDuration = mainAudio.duration;
    let totalMin = Math.floor(audioDuration / 60);
    let totalSec = Math.floor(audioDuration % 60);
    
    if(totalSec < 10){  
        totalSec = "0".concat(totalSec);
    }
    musicDuration.innerText = "".concat(totalMin,":",totalSec);
    });

    // update song current time
    let currentMin = Math.floor(currentTime / 60);
    let currentSec = Math.floor(currentTime % 60);
    if(currentSec < 10){
        // currentlSec = "".concat("0",currentSec);
        musicCurrentTime.innerText = "".concat(currentMin,":0",currentSec);
    }
    musicCurrentTime.innerText = "".concat(currentMin,":",currentSec);
    
    // update song left time
    let audioDuration = mainAudio.duration;
    let totalMin = Math.floor(audioDuration / 60);
    let totalSec = Math.floor(audioDuration % 60);
    let leftTimeMin = totalMin-currentMin;
    let leeftSec = totalSec - currentSec;
    // console.log(totalMin-currentMin,totalSec - currentSec , "-".concat(leftTimeMin,":",leeftSec));
    musicLeftTime.innerText = "-".concat(leftTimeMin,":",leeftSec);
});

// update playing song current time on according to the progress bar
 progressArea.addEventListener("click" , (e)=>{
    let progressWidthVal = progressArea.clientWidth;  // getting width of progress bar(dar hal hazer injast)
    let clickedOffSetX = e.offsetX;                  // getting offset x (jayi ke man click mikonam)
    let songDuration = mainAudio.duration;
    mainAudio.currentTime = (clickedOffSetX / progressWidthVal) * songDuration;

 });


 //let's work on play particular song on click
const allLiTags = ulTag.querySelectorAll("li");

function playingNow(){
    for(let j=0 ; j<allLiTags.length ; j++) {


    //remove playing class from all other li expext the last one
    if(allLiTags[j].classList.contains("playing")){
        allLiTags[j].classList.remove("playing");
    }   

    //if there is an li tag which li-index is equal to musicIndex
    //then this music is playing and we'll style it
    if(allLiTags[j].getAttribute("li-index") == musicIndex){
        allLiTags[j].classList.add("playing");
    }

    //adding onclick attribute in al li tag
    allLiTags[j].setAttribute("onclick" , "clicked(this)");
    // console.log(allLiTags[j].setAttribute("onclick" , "clicked(this)"));
}
}



//let's play song on li click
function clicked(element){
    console.log(element);
    //getting li index of particular clicked li tag
    let getLiIndex = element.getAttribute("li-index");
    musicIndex = getLiIndex; // passing that index to musicIndex
    loadMusic(musicIndex);
    playMusic();
    playingNow();
}
