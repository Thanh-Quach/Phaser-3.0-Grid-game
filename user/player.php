
player = this.physics.add.sprite(330, 420, 'warrior'); player.setScale(1); player.setDepth(1);
playerHealth = this.add.text(16, 16, 'HP:' + allyHp , { fontSize: '32px', fill: '#fff' });
skill = this.add.image(50, 96, "heavyAtk");
skillSize = 64;
cooldownEffect = this.add.graphics();
recMask = this.add.graphics();


this.tweens.addCounter({
        from: 0,
        to: 30,
        duration: 200,
        yoyo: true,
        repeat: -1,
        onUpdate: function (tween)
        {

            cooldownEffect.clear();
			cooldownEffect.fillStyle(0x000000, 0.4);
			cooldownEffect.slice(skill.x, skill.y, skillSize/4*3, Phaser.Math.DegToRad(-90),Phaser.Math.DegToRad(coolDownOn), true);
			cooldownEffect.fillPath();

			recMask.fillStyle(0, 0);
			recMask.fillRect(skill.x - skillSize/2, skill.y - skillSize/2, skillSize, skillSize);
			cooldownEffect.setMask(recMask.createGeometryMask());
        }
    });


//recognize keyboard input
movement = this.input.keyboard.createCursorKeys();
