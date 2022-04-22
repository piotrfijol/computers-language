
    const SPEED = 8;

    const CircleProgress = (element) => {

        let progress = parseInt(element.dataset.progress);
        let leftHandler, rightHandler;
        let leftBar   = element.querySelector('.circle-progress__outer__left__progress'),
            rightBar  = element.querySelector('.circle-progress__outer__right__progress');

        
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

        function start() {
            
            if(progress === 0) {
                return;
            } else {
                leftHandler = setInterval(moveLeftBar, SPEED);
            }
        }
        
        return {
            start
        };
    } 

    const allCards = document.querySelectorAll('.circle-progress');
    if(allCards.length) {
        allCards.forEach(el => {
            (CircleProgress(el)).start();
        });
    }