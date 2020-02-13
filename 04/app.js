/*
GAME RULES:

- The game has 2 players, playing in rounds
- In each turn, a player rolls a dice as many times as he whishes. Each result get added to his ROUND score
- BUT, if the player rolls a 1, all his ROUND score gets lost. After that, it's the next player's turn
- The player can choose to 'Hold', which means that his ROUND score gets added to his GLBAL score. After that, it's the next player's turn
- The first player to reach 100 points on GLOBAL score wins the game

*/

var diceNo = 6;
var player0RoundScore = [];
var player1RoundScore = [];
var player0Score = [];
var player1Score = [];

document.querySelector(".btn-roll").addEventListener("click",myFunction);
document.querySelector(".btn-start").addEventListener("click", startGame);
 document.querySelector(".btn-new").addEventListener("click", newGame);

/*document.querySelector(".btn-hold").addEventListener("click", hold);  */

function myFunction() {
    onRoll = Math.floor(Math.random() * diceNo) + 1;
    document.querySelector(".dice").src = "dice-" + onRoll+".png";
    if (onRoll==1){
        changePlayer();
    }
    else {
        addScores();
    }
}

function changePlayer() {
        var player0 = document.querySelector(".player-0-panel");
        var player1 = document.querySelector(".player-1-panel");
        if (player0.classList.contains("active")) {
          player0.classList.remove("active");
          player1.className += " " + "active";
        } else {
          player1.classList.remove("active");
          player0.className += " " + "active";
        }
}

function addScores() {
    var player0Currentscore = 0;
    var player1Currentscore = 0;
    var player0Totalscore = 0;
    var player1Totalscore = 0;
    var player0 = document.querySelector(".player-0-panel");
    var player1 = document.querySelector(".player-1-panel");
    if (player0.classList.contains("active")){
        player0RoundScore.push(onRoll);
        player0Score.push(onRoll);
        //player 0 current score
        for (var i = 0; i < player0RoundScore.length; i++) {
          player0Currentscore += player0RoundScore[i];
        }
        document.querySelector(".player0-current-score").innerHTML = player0Currentscore;
        //player0 total score
        for (var j = 0; j <player0Score.length; j++){
            player0Totalscore+=player0Score[j];
        }
    }
    else if (player1.classList.contains("active")) {
          player1RoundScore.push(onRoll);
          player1Score.push(onRoll);
          //player1 current score
          for (var k = 0; k < player1RoundScore.length; k++) {
            player1Currentscore += player1RoundScore[k];
          }
             document.querySelector(
               ".player1-current-score"
             ).innerHTML = player1Currentscore;
          //player1 total score
          for (var l = 0; l < player1Score.length; l++) {
            player1Totalscore += player1Score[l];
          }
        }

}

function startGame() {
    var active = "active";
    var player0 = document.querySelector(".player-0-panel");
    var player1 = document.querySelector(".player-1-panel");
    var player =  Math.floor(Math.random()*2);
    if (player == 0){
        player1.classList.remove(active);
       player0.className+=" "+active;
    }
    else{
        player0.classList.remove(active);
        player1.className += " "+active;
    }

}

function refreshPage() {
  var active = "active";
  var player0 = document.querySelector(".player-0-panel");
  var player1 = document.querySelector(".player-1-panel");
  var player = Math.floor(Math.random() * 2);
  if (player == 0) {
    player1.classList.remove(active);
    player0.className += " " + active;
  } else {
    player0.classList.remove(active);
    player1.className += " " + active;
  }
}

refreshPage();

function newGame() {
player0RoundScore = [];
player1RoundScore = [];
player0Score = [];
player1Score = [];

  var active = "active";
  var player0 = document.querySelector(".player-0-panel");
  var player1 = document.querySelector(".player-1-panel");
  var player = Math.floor(Math.random() * 2);
  if (player == 0) {
    player1.classList.remove(active);
    player0.className += " " + active;
  } else {
    player0.classList.remove(active);
    player1.className += " " + active;
  }
}