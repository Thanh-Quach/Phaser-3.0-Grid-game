if (meterorTrigger && !skill1) {
    targetLock = Phaser.Math.Between(0, 8);
    this.physics.moveToObject(meteror, target, meterorSpeed);
if (allyHp !== 0) {
    if (meteror.x < target.x)
        {
        if (target.x == player.x && target.y == player.y + 80 && immune == false) {
            allyHp = allyHp - meterorDmg;
            player.play('hurt');
            playerHealth.setText('HP:' + allyHp);
            immune = true;
            immuneCount = 200;
        };
        meteror.body.reset(1500, 0);
        targetLock = Phaser.Math.Between(0, 8);
        if (targetLock == 0 && !skill1) {
            target.x = 540;
            target.y = 628;
        } else if (targetLock == 1 && !skill1) {
            target.x = 330;
            target.y = 500;
        } else if (targetLock == 2 && !skill1) {
            target.x = 120;
            target.y = 372;
        } else if (targetLock == 3 && !skill1) {
            target.x = 540;
            target.y = 500;
        } else if (targetLock == 4 && !skill1) {
            target.x = 540;
            target.y = 372;
        } else if (targetLock == 5 && !skill1) {
            target.x = 330;
            target.y = 628;
        } else if (targetLock == 6 && !skill1) {
            target.x = 330;
            target.y = 372;
        } else if (targetLock == 7 && !skill1) {
            target.x = 120;
            target.y = 500;
        } else if (targetLock == 8 && !skill1) {
            target.x = 120;
            target.y = 628;
        }
        this.physics.moveToObject(meteror, target, meterorSpeed);
        }
};
};
