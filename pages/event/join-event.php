<div class="container">
    <main class="d-flex flex-column h-100 py-4 bg-white">
        <form action="" class="h-100" id="joinEvent">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Event Beitreten</h1>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="code" class="small fw-bold">Einladungscode eingeben</label>
                <input type="text" class="form-control" name="code" id="code" required>
            </div>

            <div class="d-flex flex-column mt-3">
                <button class="btn btn-primary" type="submit">Beitreten</button>
            </div>
        </form>
    </main>
</div>
<script>
    api.addEventListener('ready', async ({detail: apiClient}) => {
        $('#joinEvent').on('submit', (e) => {
            e.preventDefault();

            apiClient.event.find($('[name=code]').val()).then((event) => {
                window.location.href = '/event/event-uebersicht?id=' + event.event_id
            }).catch((err) => {
                if (err.response) {
                    toastr.error(err.response.data.message);
                } else {
                    console.error(err);
                }
            });
        });
    });
</script>