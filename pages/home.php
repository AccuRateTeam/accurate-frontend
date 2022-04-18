<div class="home-container px-0 h-100">
    <div class="container home-container__inner h-100">
        <main class="d-flex flex-column h-100 py-5">
            <div class="logged-in h-100" style="display:none">
                <div class="d-flex flex-column h-100">
                    <div class="event-buttons d-flex flex-column gap-2">
                        <a class="btn btn-primary" href="/event/event-erstellen">Event Erstellen</a>
                        <a class="btn btn-primary" href="/event/event-beitreten">Event Beitreten</a>
                    </div>
                    <div class="parcour-buttons d-flex flex-column gap-2 mt-auto">
                        <a class="btn btn-primary" href="/parkour/parkour-erstellen">Parkour Erstellen</a>
                    </div>
                </div>
            </div>
            <div class="logged-out h-100">
                <div class="d-flex flex-column h-100 justify-content-center">
                    <a class="btn btn-primary login-button">Anmelden / Registrieren</a>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    api.addEventListener('ready', async ({detail: apiClient}) => {
        apiClient.user.me().then(() => {
            $('.logged-in').show();
            $('.logged-out').hide();
        }).catch(() => {
            $('.logged-in').hide();
            $('.logged-out').show();
        })
    });
</script>