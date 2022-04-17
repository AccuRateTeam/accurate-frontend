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
                        <th>Name</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody class="scoreboard-body">
                    </tbody>
                </table>
                <div class="not-finished text-muted text-center">Es sind noch nicht alle Spieler fertig.</div>
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
        const users = [];
        const userIds = Object.keys(scoreboard.users);

        if (scoreboard.finished) {
            $('.not-finished').hide();
        } else {
            $('.not-finished').show();
        }

        userIds.forEach((userId) => {
            users.push({
                username: scoreboard.users[userId].username,
                score: scoreboard.users[userId].scores.reduce((partialSum, a) => partialSum + a, 0)
            });
        });

        users.sort((a, b) => {
            return a.score > b.score ? -1 : 1;
        });

        $('.scoreboard-body').html('');
        users.forEach((user, i) => {
            $('.scoreboard-body').append($(`<tr><td>${i+1}</td><td>${user.username}</td><td>${user.score}</td></tr>`));
        });
    }
</script>