<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
    body {
      background: #000000;
      padding: 0px;
      margin: 0px;
    }
    
    canvas {
      display: block;
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
    <script src="https://cdn.jsdelivr.net/npm/phaser@3.15.1/dist/phaser-arcade-physics.min.js"></script>
</head>
<body>

<script>

//game config with full screen option
var game;
var gameWidth = 1280;
var gameHeight = 720;

window.onload = function() {
    var config = {
        type: Phaser.AUTO,
        width: gameWidth,
        height: gameHeight,
        physics: {
            default: 'arcade',
            arcade: {
                
            }
        },
        scene: {
            preload: preload,
            create: create,
            update: update,
        }
    };

    game = new Phaser.Game(config);
    resize();
    window.addEventListener("resize", resize, false);
};

function resize() {
  var canvas = document.querySelector("canvas");
  var windowWidth = window.innerWidth;
  var windowHeight = window.innerHeight;
  var windowRatio = windowWidth / windowHeight;
  var gameRatio = game.config.width / game.config.height;
  if (windowRatio < gameRatio) {
    canvas.style.width = windowWidth + "px";
    canvas.style.height = (windowWidth / gameRatio) + "px";
  } else {
    canvas.style.width = (windowHeight * gameRatio) + "px";
    canvas.style.height = windowHeight + "px";
  }
}



    var flipUp;
    var flipDown;
    var flipLeft;
    var flipRight;
    var allyFieldPlus = 330;
    var foesFieldPlus = 960;
    
    var delay = 900;
    var playerDelay = 500;
    var timer = 700;
    
    var foeMovement = 0;
    
    var allyHp = 100;
    var foeHp = 1200;
    var skill1 = false;
    var skill1CoolDown = 500;
    
    var bullets;
    var speed;
    var lastFired = 0;
    var bulletDamage = 10;
    var attackSpeed = 5000;
    var atkFrame = attackSpeed/1000 + 10;

    var mainCoolDown = 100;
    var coolDownOn = -90;
    var claws;
    var damage = 1;
    var clawSpeed;
    var clawDamage = 50;
    var immune = false;
    var immuneCount = 0;
    
    var victory = false;
    
    var targetLock = 1;
    var meterorSpeed = 3000;
    var meterorFall;
    var meterorDmg = 10;
    var meterorTrigger = false;

<?php
echo "function preload (){"; 
require('characters/preloadCharacter.php');//import assests
echo '};function create (){';
require('arena/arena.php');//battlefield  
require('user/player.php'); //create player
require('user/npc.php'); // create enemy
require('control/playerAttack.php'); //player attack
require('control/playerControl.php');// player control
echo '};function update(time, delta) {';
require('control/playerControl.php');
require('control/AIMovement.php');
require('control/meterorFall.php');
?>
if (meterorTrigger) {
    skill1CoolDown -= 1;
    timer -= 1;
    if (skill1CoolDown == 50) {
        skill1 = true;
        foe.x = 750;
        foe.y = player.y - 30;
        target.setVisible(false);
        target2 = this.add.rectangle(330, player.y + 80, 630, 128, 0xf4f186); target.setDepth(0);
        this.tweens.add({
                targets: target2,
                alpha: 0.01,
                yoyo: true,
                duration: 400,
                loop: -1,

        });
    };
        if (skill1CoolDown == 0) {
        flamethrower = this.add.image(foe.x - 360, foe.y + 50, 'flamethrower').setScale(0.5).setDepth(1);
        if (player.y + 80 == target2.y){
            if (immune == false) {
                allyHp = allyHp - 30;
                player.play('hurt');
                playerHealth.setText('HP:' + allyHp);
                    immune = true;
                    immuneCount = 200;
            };
        };
        skill1CoolDown = 500;
        };

    if (timer == 0) {
        target2.destroy();
        flamethrower.destroy();
        target.setVisible(true);
        skill1 = false;
        timer = 500;
    };
};
if (allyHp < 0) {
    alert('Game Over');
    playerHealth.setText('HP: 0');
} else if (foeHp < 0) {
    alert('Victory');
    foeHealth.setText('HP: 0');
};


if (immune == true) {
    player.alpha = 0.5;
    immuneCount -= 1;
        if (immuneCount < 0) {
            immune = false;
            player.alpha = 1;
        };
};


<?php
echo '};';
require('control/createAImovement.php');// enemy movement
?>


</script>

</body>
</html>