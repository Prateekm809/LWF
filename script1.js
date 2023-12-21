console.log("Welcome to Learnwithfun");

// Initialize the Variables
let songIndex = 0;
let audioElement = new Audio('songs/1.mp3');
let masterPlay = document.getElementById('masterPlay');
let myProgressBar = document.getElementById('myProgressBar');
let gif = document.getElementById('gif');
let masterSongName = document.getElementById('masterSongName');
let songItems = Array.from(document.getElementsByClassName('songItem'));

let songs = [
    { songName: "Activate Chakras", filePath: "songs/1.mp3", coverPath: "covers/1.jpg" },
    { songName: "Mahatma budh music", filePath: "songs/2.mp3", coverPath: "covers/2.jpg" },
    { songName: "Brain Healing", filePath: "songs/3.mp3", coverPath: "covers/3.jpg" },
    { songName: "Study Motivation", filePath: "songs/4.mp3", coverPath: "covers/4.jpg" },
    { songName: "mind power increase", filePath: "songs/5.mp3", coverPath: "covers/5.jpg" },
    { songName: "focus improve", filePath: "songs/2.mp3", coverPath: "covers/6.jpg" },
    { songName: "sleep quality increase", filePath: "songs/2.mp3", coverPath: "covers/7.jpg" },
    { songName: "health improvement", filePath: "songs/2.mp3", coverPath: "covers/8.jpg" },
    { songName: "sleep", filePath: "songs/2.mp3", coverPath: "covers/9.jpg" },
    { songName: "Nature", filePath: "songs/4.mp3", coverPath: "covers/10.jpg" },
];

songItems.forEach((element, i) => {
    element.getElementsByTagName("img")[0].src = songs[i].coverPath;
    element.getElementsByClassName("songName")[0].innerText = songs[i].songName;
});


// Function to play the song
const playSong = () => {
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');
    gif.style.opacity = 1;
    makeAllPlays();
    songItems[songIndex].getElementsByClassName('songItemPlay')[0].classList.remove('fa-play-circle');
    songItems[songIndex].getElementsByClassName('songItemPlay')[0].classList.add('fa-pause-circle');
};

// Function to pause the song
const pauseSong = () => {
    audioElement.pause();
    masterPlay.classList.remove('fa-pause-circle');
    masterPlay.classList.add('fa-play-circle');
    gif.style.opacity = 0;
    songItems[songIndex].getElementsByClassName('songItemPlay')[0].classList.remove('fa-pause-circle');
    songItems[songIndex].getElementsByClassName('songItemPlay')[0].classList.add('fa-play-circle');
};

// Handle play/pause click
masterPlay.addEventListener('click', () => {
    if (audioElement.paused || audioElement.currentTime <= 0) {
        playSong();
    } else {
        pauseSong();
    }
});

// Listen to Events
audioElement.addEventListener('timeupdate', () => {
    // Update Seekbar
    progress = parseInt((audioElement.currentTime / audioElement.duration) * 100);
    myProgressBar.value = progress;
});

myProgressBar.addEventListener('change', () => {
    audioElement.currentTime = myProgressBar.value * audioElement.duration / 100;
});

const makeAllPlays = () => {
    Array.from(document.getElementsByClassName('songItemPlay')).forEach((element) => {
        element.classList.remove('fa-pause-circle');
        element.classList.add('fa-play-circle');
    });
};

Array.from(document.getElementsByClassName('songItemPlay')).forEach((element) => {
    element.addEventListener('click', (e) => {
        makeAllPlays();
        songIndex = parseInt(e.target.id);
        audioElement.src = songs[songIndex].filePath;
        masterSongName.innerText = songs[songIndex].songName;
        audioElement.currentTime = 0;
        playSong();
    });
});
