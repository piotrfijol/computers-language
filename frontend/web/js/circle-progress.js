
    const SPEED = 8;

    let progress = parseInt(document.querySelector(".circle-progress").dataset.progress);
    let leftHandler, rightHandler;
    let leftBar = document.querySelector('.circle-progress__outer__left__progress'),
        rightBar = document.querySelector('.circle-progress__outer__right__progress');


    (() => {
        if(progress === 0) {
            return;
        } else {
            leftHandler = setInterval(moveLeftBar, SPEED);
        }
    })();

    let currentProgress = 0;

    function moveLeftBar() {
        let stepAngle = 180/50 * currentProgress;
        if(stepAngle > 180 || currentProgress === progress) {
            clearInterval(leftHandler);
            if(currentProgress > 50) 
                rightHandler = setInterval(moveRightBar, SPEED);
        } else {
            leftBar.style.transform = `rotate(${stepAngle}deg)`;
            currentProgress++;
        }
    };

    
    function moveRightBar() {
        let stepAngle = 180/50 * (currentProgress - 50);
        
        if(stepAngle >= 180 || currentProgress === progress) {
            rightBar.style.transform = `rotate(${stepAngle}deg)`;
            clearInterval(rightHandler);
        } else {
            rightBar.style.transform = `rotate(${stepAngle}deg)`;
            currentProgress++;
        }
    };