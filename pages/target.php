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

<script>
    var arrowNumber = 1;

    document.onclick = (event) => userClicked(event, arrowNumber)

    function userClicked(event, p1) {
        var x = event.clientX;
        var y = event.clientY;

        if (p1 === 1) {
            var snowball = document.getElementById("x1");
            snowball.style.display = '';
            snowball.style.position = 'absolute';
            snowball.style.left = x + 'px';
            snowball.style.top = y + 'px';
        } else if (p1 === 2) {
            var snowball2 = document.getElementById("x2");
            snowball2.style.display = '';
            snowball2.style.position = 'absolute';
            snowball2.style.left = x + 'px';
            snowball2.style.top = y + 'px';
        } else if (p1 === 3) {
            var snowball3 = document.getElementById("x3");
            snowball3.style.display = '';
            snowball3.style.position = 'absolute';
            snowball3.style.left = x + 'px';
            snowball3.style.top = y + 'px';
        }
    }

</script>
<p id="nameOfParkourElement"><b><i>KUH</i></b></p>
<p id="numberOfParkourElements"><b><i>1/28</i></b></p>

<center><p style="margin-top: 150px; margin-bottom: -150px;" id="arrowText"></p></center>


<div class="gBox" style="margin-top: 150px; width:100%; display:flex;justify-content:center;">


    <script>
        document.getElementById("arrowText").innerHTML = arrowNumber + " Pfeil."
    </script>

    <svg viewBox="0 0 260 260" height="300">
        <circle id="point3" cx="50%" cy="50%" r="90" stroke="black" stroke-width="3" fill="white"/>
        <circle id="point2" cx="50%" cy="50%" r="60" stroke="black" stroke-width="3" fill="white"/>
        <circle id="point1" cx="50%" cy="50%" r="30" stroke="black" stroke-width="3" fill="white"/>
        <text style="pointer-events: none; z-index: 9999;" x="90%" r="90" y="50%" fill="black">0</text>
        <text style="pointer-events: none; z-index: 9999;" x="76%" r="90" y="50%" fill="black">16</text>
        <text style="pointer-events: none; z-index: 9999;" x="64%" r="60" y="50%" fill="black">18</text>
        <text style="pointer-events: none; z-index: 9999;" x="48%" r="30" y="50%" fill="black">20</text>
    </svg>

</div>


<img alt="snowballAppear" id="x1" height="16px" width="16px" style="display: none" src="x.png"/>
<img alt="snowballAppear" id="x2" height="16px" width="16px" style="display: none" src="x.png"/>
<img alt="snowballAppear" id="x3" height="16px" width="16px" style="display: none" src="x.png"/>


<center><textarea id="pointsbanged"></textarea></center>

<div class="dual-btn-container">
    <button style="margin-right: 10px;" class="dual-color-btn dual-color-red shine-hope-anim"><i>SKIP</i></button>
    <button onclick="nextArrow()" id="nextArrow" disabled class="dual-color-btn dual-color-green shine-hope-anim"><i>NÄCHSTER
            PFEIL</i></button>
</div>


<script>

    function nextArrow() {
        arrowNumber = arrowNumber + 1;
        document.getElementById("nextArrow").setAttribute('disabled', '')
        document.getElementById("arrowText").innerHTML = arrowNumber + " Pfeil."

        if (arrowNumber === 4) {
            swiper.slideNext();
        }
    }


    $('#point1').click(function () {
        document.getElementById("pointsbanged").value = "1";
        document.getElementById("nextArrow").removeAttribute('disabled')
    });
    $('#point2').click(function () {
        document.getElementById("pointsbanged").value = "2";
        document.getElementById("nextArrow").removeAttribute('disabled')

    });
    $('#point3').click(function () {
        document.getElementById("pointsbanged").value = "3";
        document.getElementById("nextArrow").removeAttribute('disabled')

    });
    $('#point4').click(function () {
        document.getElementById("pointsbanged").value = "4";
        document.getElementById("nextArrow").removeAttribute('disabled')

    });
</script>