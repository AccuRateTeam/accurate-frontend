<div class="container">
    <main class="d-flex flex-column h-100 bg-white">
        <form id="createEventForm" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Endscreen</h1>
                </div>
            </div>
            <!--
                    Estellen von liste based on Parcour teilnehmer und deren Scores
                    href zur neuen Seite falls wir personeneigene Daten auch machen wollen
                -->
            <div id="Ranking" style="">
                <table id="Ranking" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody class="scoreboard-body">
                    </tbody>
                </table>
            </div>
        </form>
    </main>
</div>
<script>
    const url = new URL(window.location.href);
    api.addEventListener('ready', async ({detail: apiClient}) => {
        await apiClient.event.join(url.searchParams.get('id'));
        apiClient.event.socket.on('event.scoreboard', updateScoreboard);
    });

    const updateScoreboard = (scoreboard) => {

        const userId = params.get('userId') ?? '';
        const _scores = scoreboard.users[userId].scores;


        $('.scoreboard-body').html('');
        _scores.forEach((score, i) => {
            $('.scoreboard-body').append($(`<tr><td>${i+1}</td><td>${score}</td></tr>`));
        });
    }
</script>