function generateTargetHtml(id) {
    return `<div class="target" data-id="${id}">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');

    body {

        font-family: 'Anton', sans-serif;
        background: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
        ),
        url('https://cutewallpaper.org/22/animated-forest-wallpapers/minimalist-forest-phone-wallpaper.jpg');
        background-size: cover;


    }

    #numberOfParkourElements {

        position: fixed;
        top: 0;
        right: 0;
        margin-right: 20px;
        font-size: 30px;
        color: white;

    }

    #nameOfParkourElement {

        position: fixed;
        font-size: 30px;
        top: 0;
        left: 0;
        margin-left: 20px;

        color: white;

    }

    .wrapper {
        text-align: center;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding-top: 10%;

    }

    .dual-btn-container {
        width: auto;
        text-align: center;
        margin-top: 100px;

        border: none;
    }

    .dual-color-btn {
        display: inline-block;
        width: 160px;
        border-radius: 10px;
        font-size: 15px;
        border: none;
        color: white;
        font-family: 'Anton', sans-serif;
        padding: 10px;
        position: relative;
        overflow: hidden;
        box-shadow: 0px 6px 6px 0px rgba(0, 0, 0, 0.6);
        background-color: rgba(255, 255, 255, .05);
        transition: all .3s;
    }

    .dual-color-red {
        background: red;
    }

    .dual-color-green {
        background: green;
    }


    .shine-hope-anim:after {
        content: '';
        position: absolute;
        display: block;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .4), transparent);
        animation: ShineAnim 5s ease infinite;
        animation-delay: 2s;
    }

    @keyframes ShineAnim {
        0% {
            left: -100%
        }
        10% {
            left: 100%
        }
        100% {
            left: 100%
        }
    }

</style>

<p id="nameOfParkourElement"><b><i class="current-target-name"></i></b></p>
<p id="numberOfParkourElements"><b><i>
<span class="current-target-number">1</span>/<span class="total-target-number"></span>
</i></b></p>

<div class="gBox" style="margin-top: 150px; width:100%; display:flex;justify-content:center;">
    <svg viewBox="0 0 260 260" height="300">
        <circle class="point" data-value="0" cx="50%" cy="50%" r="120" stroke="black" stroke-width="2" fill="transparent"/>
        <circle class="point" data-value="3" cx="50%" cy="50%" r="90" stroke="black" stroke-width="2" fill="white"/>
        <circle class="point" data-value="2" cx="50%" cy="50%" r="60" stroke="black" stroke-width="2" fill="white"/>
        <circle class="point" data-value="1" cx="50%" cy="50%" r="30" stroke="black" stroke-width="2" fill="white"/>
        <text style="pointer-events: none; z-index: 9999;" x="90%" r="90" y="51%" fill="black">0</text>
        <text style="pointer-events: none; z-index: 9999;" x="76%" r="90" y="51%" fill="black" class="target-3"></text>
        <text style="pointer-events: none; z-index: 9999;" x="64%" r="60" y="51%" fill="black" class="target-2"></text>
        <text style="pointer-events: none; z-index: 9999;" x="48%" r="30" y="51%" fill="black" class="target-1"></text>
    </svg>
</div>


<img alt="snowballAppear" id="x1" height="16px" width="16px" style="display: none;position: absolute" src="/assets/img/x.png"/>
<img alt="snowballAppear" id="x2" height="16px" width="16px" style="display: none;position: absolute" src="/assets/img/x.png"/>
<img alt="snowballAppear" id="x3" height="16px" width="16px" style="display: none;position: absolute" src="/assets/img/x.png"/>


<center><textarea id="pointsbanged"></textarea></center>

<div class="dual-btn-container">
    <button disabled class="btn-next-arrow dual-color-btn dual-color-green shine-hope-anim"><i>NÄCHSTER PFEIL</i></button>
</div>


<script>
    (function () {
        const targetId = '${id}';
        const targetEl = $('.target[data-id=' + targetId + ']');
        const scoringSystem = window._event.event_scoringsystem;
        let score = 0;
        
        const updateTarget = () => {
            const scoring = window.scoringMap[scoringSystem][window.arrowNumber - 1];
            targetEl.find('.target-1').text(scoring[0]);
            targetEl.find('.target-2').text(scoring[1]);
            targetEl.find('.target-3').text(scoring[2]);
        }
        
        updateTarget();
        
        targetEl.find('.btn-next-arrow').on('click', () => {
            window.hit(targetId, score);
            window.arrowNumber += 1;
            
            targetEl.find('.btn-next-arrow').attr('disabled', '');
    
            if (arrowNumber === window.scoringMap[scoringSystem].length + 1) {
                swiper.slideNext();
                window.roundNumber += 1;
                window.arrowNumber = 1;
                if (window.roundNumber === window.targets.length + 1) {
                    window.location.href = '/event/event-endscreen?id=' + window._event.event_id;
                }
                return;
            }
            
            updateTarget();
        });

        targetEl.find('.point').on('click', function (ev) {
            score = $(this).data('value');
            
            // enable button
            targetEl.find('#pointsbanged').val('Arrow: ' + window.arrowNumber + '; Score: ' + score);
            targetEl.find('.btn-next-arrow').removeAttr('disabled');
            
            // position x
            const x = targetEl.find('#x' + window.arrowNumber);
            x.css('top', ev.clientY - 55);
            x.css('left', ev.clientX - 10);
            x.css('display', 'block');
        });
    })()
</script>
</div>`;
}