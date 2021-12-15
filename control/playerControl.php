//player megaBuster that trigger meteror

        if (Phaser.Input.Keyboard.JustDown(shoot) && time > lastFired)
        {
            player.play('airslash');
            if(!meterorTrigger){
                target = this.add.rectangle(330, 500, 210, 128, 0xf4f186); target.setDepth(0);

                this.tweens.add({
                    targets: target,
                    alpha: 0.01,
                    yoyo: true,
                    duration: 400,
                    loop: -1,

                });
                meterorTrigger = true;
            };
            var bullet = bullets.get();
            if (bullet)
            {
                bullet.fire(player.x, player.y);
                lastFired = time + 50;
            }
        }


//player slash that trigger meteror
        if (Phaser.Input.Keyboard.JustDown(wield) && time > lastFired && coolDownOn == -90)
        {
            player.play('slash');
            if(!meterorTrigger){
                target = this.add.rectangle(330, 500, 210, 128, 0xf4f186); target.setDepth(0);

                this.tweens.add({

                    targets: target,
                    alpha: 0.01,
                    yoyo: true,
                    duration: 400,
                    loop: -1,

                });
                meterorTrigger = true;
            };
            var claw = claws.get();
            if (claw)
            {
                claw.slash(player.x, player.y);
                lastFired = time + 50;
            }
            coolDownOn = -450;
        }
        if (coolDownOn < -90) {
            coolDownOn += 3;
        }


//player movement
        if (movement.left.isDown && player.x > allyFieldPlus - 210) //set x boundaries
        {
            if (!flipLeft) {
                player.x = player.x - 210;
                flipLeft = true;
            }
        } else if (movement.right.isDown && player.x < allyFieldPlus + 210) //set x boundaries
        {
            if (!flipRight) {
                player.x = player.x + 210;
                flipRight = true;
            }
        } else if (movement.up.isDown && player.y > 292) //set y boundaries
        {
            if (!flipUp) {
                player.y = player.y - 128;
                if (player.y < target.y){meteror.setDepth(2);}else{meteror.setDepth(0);};
                flipUp = true;
            }
        }else if (movement.down.isDown && player.y < 500) //set y boundaries
        {
            if (!flipDown) {
                player.y = player.y + 128;
                if (player.y < target.y){meteror.setDepth(2);}else{meteror.setDepth(0);};
                flipDown = true;
        }
    }

        if (movement.left.isUp) {
            flipLeft = false;
        }
        if (movement.right.isUp) {
            flipRight = false;
        }
        if (movement.up.isUp) {
            flipUp = false;
        }
        if (movement.down.isUp) {
            flipDown = false;
        }
