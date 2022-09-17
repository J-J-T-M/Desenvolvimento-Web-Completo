var height = 0 
var width = 0
var lives = 1
var time = 30
var criarmosquitotempo = 1500
var spots = 0
var level = window.location.search
level = level.replace('?', '')
function tapa() {
    const music = new Audio("ai.mp3");
    music.play();
    music.loop = false;
    music.playbackRate = 2;
  }
function level_rule()
{
    if(level ==='normal')
    {
        criarmosquitotempo =1500
    }
    else if(level ==='dificil') 
    {
        criarmosquitotempo =1000
       
    }
    else if(level ==='chucknorris')
    {
        criarmosquitotempo =750
    }    
}
function adjustSizeStage(){
    height = window.screen.availHeight ;
    width = window.screen.availWidth ;

}
adjustSizeStage()
var stopwatch = setInterval(function(){
    time-=1
    if (time < 0){ 
        clearInterval(stopwatch) 
        clearInterval(criarmosquito)
        window.location.href = 'victory.html' ; 
      
        
    }else{
        document.getElementById('stopwatch').innerHTML = time;} 
    

},1000);
function punctuation(){
    spots ++
        document.getElementById('punctuation').innerHTML = spots;
}
function randomPosition(){
    if (document.getElementById('mosquito')){
        document.getElementById('mosquito').remove() 
        
        if(lives > 3){
            window.location.href = 'game_over.html'
        }else{
             document.getElementById('v'+ lives).src ="imagens/coracao_vazio.png"
            lives++;
        }
    }  
    var positionX = Math.floor(Math.random() * width) - 150
    var positionY = Math.floor(Math.random() * height) - 150

    positionX = positionX <0 ? 0 : positionX
    positionY = positionY <0 ? 0 : positionY

    var mosquito = document.createElement('img')

    mosquito.src = 'imagens/i.png'

    mosquito.className = randomSize() +' '+ randomSide()

    mosquito.style.left = positionX + 'px'
    mosquito.style.top = positionY + 'px'

    mosquito.style.position = 'absolute'
    mosquito.id = 'mosquito'

    mosquito.onmouseover = function() { 
       if(lives < 3) {  
            punctuation() 
            tapa() 
            this.remove();
       }
        
    }

    document.body.appendChild(mosquito)
    
}
function randomSize(){
    var classe = Math.floor(Math.random() * 3)
    switch(classe){
        case 0:
            return 'mosquito1'
        case 1: 
            return 'mosquito2'
        case 2:
            return 'mosquito3'
    }

}
function randomSide() {
    var classe = Math.floor(Math.random() * 2)
    switch(classe){
        case 0:
            return 'sideA'
        case 1: 
            return 'sideB'
    }


}
function restart() {
    window.location.href = 'index.html'
}

function stratGame() {
    var level = document.getElementById('level').value
    if (level  === ''){
        alert("Selecione um nível para iniciar o jogo")
        return false
    }
    window.location.href = 'game.html?' + level
}