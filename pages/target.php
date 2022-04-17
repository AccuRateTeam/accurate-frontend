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

<p id="nameOfParkourElement"><b><i>KUH</i></b></p>
<p id="numberOfParkourElements"><b><i>1/28</i></b></p>

<div class="gBox" style="padding-top: 150px; width:100%; display:flex;justify-content:center;">

    <svg viewBox="0 0 260 260" height="300">
        <circle id="point4" cx="50%" cy="50%" r="120" stroke="black" stroke-width="3" fill="black"/>
        <circle id="point3" cx="50%" cy="50%" r="90" stroke="black" stroke-width="3" fill="#78EEFA"/>
        <circle id="point2" cx="50%" cy="50%" r="60" stroke="black" stroke-width="3" fill="#FF504F"/>
        <circle id="point1" cx="50%" cy="50%" r="30" stroke="black" stroke-width="3" fill="#FFFF38"/>
    </svg>

</div>

<center><textarea id="pointsbanged"></textarea></center>

<div class="dual-btn-container">
    <button style="margin-right: 10px;" class="dual-color-btn dual-color-red shine-hope-anim"><i>SKIP</i></button>
    <button class="dual-color-btn dual-color-green shine-hope-anim"><i>SCHIEßEN</i></button>
</div>


<script>
    $('#point1').click(function () {
        document.getElementById("pointsbanged").value = "1";
        alert('1 - Scoring');
    });
    $('#point2').click(function () {
        document.getElementById("pointsbanged").value = "2";
        alert('2 - Scoring');
    });
    $('#point3').click(function () {
        document.getElementById("pointsbanged").value = "3";
        alert('3 - Scoring');
    });
    $('#point4').click(function () {
        document.getElementById("pointsbanged").value = "4";
        alert('4 - Scoring');
    });
</script>