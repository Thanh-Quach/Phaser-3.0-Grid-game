// megabuster        
        var Bullet = new Phaser.Class({
            Extends: Phaser.GameObjects.Image,
            initialize:

            function Bullet (scene)
            {
                Phaser.GameObjects.Image.call(this, scene ,0,0, 'bullet');
                this.speed = Phaser.Math.GetSpeed(attackSpeed, 1);
            },

            fire: function (x, y)
            {
                this.setPosition(x + 50, y + 20);
                this.setActive(true);
                this.setVisible(true);

            },
            update: function (time, delta)
            {
                this.x += this.speed * delta;
                //if (this.x >= foe.x && player.y - 30 == foe.y ) //if hit the target
                if (this.x >= player.x + 420)
                {
                    this.setActive(false);
                    this.setVisible(false);
                    if (foe.x <= player.x + 420 && foe.y == player.y - 30) {
                      foeHp = foeHp - bulletDamage;
                      foeHealth.setText(foeHp);
                    };

                }

            }
            });
            bullets = this.physics.add.group({
                classType: Bullet,
                maxSize: 10, //only 10 bullets
                runChildUpdate: true
            });
            shoot = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.C);
            speed = Phaser.Math.GetSpeed(300, 1);
            



// heavy attack
           var claw = new Phaser.Class({
            Extends: Phaser.GameObjects.Image,
            initialize:

            function Claw (scene)
            {
                Phaser.GameObjects.Image.call(this, scene ,0,0, 'claw');
                this.clawSpeed = Phaser.Math.GetSpeed(attackSpeed, 1);
            },

            slash: function (x, y)
            {
                this.setPosition(x + 100, y + 50);
                this.setActive(true);
                this.setVisible(true);

            },
            update: function (time, delta)
            {
                this.x += this.clawSpeed * delta;
                if (this.x >= player.x + 210)
                {
                    this.setActive(false);
                    this.setVisible(false);
                    if (player.x + 210 == foe.x) {
                    if (player.y - 30 == foe.y || player.y - 158 == foe.y || player.y + 98 == foe.y) {
                        foeHp = foeHp - clawDamage;
                        foeHealth.setText(foeHp);
                    };
                    };
                };

            }
            });
            claws = this.physics.add.group({
                classType: claw,
                maxSize: 10, //only 10 slash
                runChildUpdate: true
            });
            wield = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.X);
            clawSpeed = Phaser.Math.GetSpeed(300, 1);




// player animation
this.anims.create({
            key: 'slash',
            frames: [
                { key: 'warriorSlash2' },
                { key: 'warriorSlash3' },
                { key: 'warriorSlash3' },
                { key: 'warrior' },
            ],
            frameRate: atkFrame,
            repeat: 0
        });
this.anims.create({
            key: 'airslash',
            frames: [
                { key: 'warriorSlash5' },
                { key: 'warriorSlash6' },
                { key: 'warrior' },
            ],
            frameRate: atkFrame,
            repeat: 0
        });
this.anims.create({
            key: 'hurt',
            frames: [
                { key: 'warriorSlash4' },
                { key: 'warrior' },
            ],
            frameRate: 5,
            repeat: 0
        });
