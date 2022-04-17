<!-- Swiper -->
<div class="swiper mySwiper" style="height: 100%">
    <div class="swiper-wrapper">

    </div>
</div>

<!-- Initialize Swiper -->
<script src="/assets/js/target.js"></script>
<script>
    window.arrowNumber = 1;
    window.roundNumber = 1;

    // responsive loading of all targets
    api.addEventListener('ready', async ({
                                             detail: apiClient
                                         }) => {
        const params = new URLSearchParams(window.location.search);
        const id = params.get('id') ?? '';

        const scoreboard = await apiClient.event.scoreboard(id);
        window.targets = scoreboard.targets;
        window._event = await apiClient.event.find(id);

        window.scoringMap = {
            DREIPFEIL: [
                [20, 18, 16],
                [14, 12, 10],
                [8, 6, 4]
            ],
            ZWEIPFEIL: [
                [20, 18, 16],
                [14, 12, 10],
            ]
        }

        scoreboard.targets.forEach(function(target) {
            $(".swiper-wrapper").append($("<div class='swiper-slide'>" + generateTargetHtml(target.id) + "</div>"))
        });

        window.swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        window.hit = async (target, score) => {
            await apiClient.event.hit(id, target, window.arrowNumber, score);
        }

        $('.total-target-number').text(scoreboard.targets.length);
        $('.current-target-name').text(scoreboard.targets[window.swiper.activeIndex].name);

        window.swiper.on('slideChange', () => {
            $('.current-target-number').text(window.swiper.activeIndex + 1);
            $('.current-target-name').text(scoreboard.targets[window.swiper.activeIndex].name);
        });
    });
</script>