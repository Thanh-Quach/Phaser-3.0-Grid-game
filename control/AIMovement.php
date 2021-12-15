
        if (foeMovement == 0 && !skill1) {
            foe.x = 960;
            foe.y = 390;
        } else if (foeMovement == 1 && !skill1) {
            foe.x = 750;
            foe.y = 390;
        } else if (foeMovement == 2 && !skill1) {
            foe.x = 1170;
            foe.y = 390;
        } else if (foeMovement == 3 && !skill1) {
            foe.x = 960;
            foe.y = 262;
        } else if (foeMovement == 4 && !skill1) {
            foe.x = 750;
            foe.y = 262;
        } else if (foeMovement == 5 && !skill1) {
            foe.x = 1170;
            foe.y = 262;
        } else if (foeMovement == 6 && !skill1) {
            foe.x = 960;
            foe.y = 518;
        } else if (foeMovement == 7 && !skill1) {
            foe.x = 750;
            foe.y = 518;
        } else if (foeMovement == 8 && !skill1) {
            foe.x = 1170;
            foe.y = 518;
        }

    foeHealth.x = Math.floor(foe.x - 30);
    foeHealth.y = Math.floor(foe.y - 60);
