<div class="container">
    <main class="d-flex flex-column h-100 bg-white">
        <div class="my-3 text-center bg-theme rounded overflow-hidden">
            <div class="py-5 bg-overlay">
                <h1 class="m-0 text-white" id="eventName"></h1>
                <small id="parcourName" class="text-white"></small>
            </div>
        </div>

        <div class="mb-2">
            <label class="small fw-bold">Scoringsystem</label>
            <div>
                <small id="scoringSystem"></small>
            </div>
        </div>

        <small class="mb-1 fw-bold">Bereits beigetreten</small>
        <div class="border rounded px-3 py-1" id="memberList">
        </div>

        <div class="d-flex flex-column mt-3">
            <a class="btn btn-primary" id="startButton">Event starten</a>
        </div>
    </main>
</div>
<script>
    const updateEventDetails = (_event) => {
        $('#eventName').text(_event.event_name);
        $('#parcourName').text(_event.parcour.parcour_name);
        $('#scoringSystem').text({
            DREIPFEIL: 'Dreipfeilwertung'
        }[_event.event_scoringsystem]);
        $('#startButton').attr('href', '/event/event-main?id=' + _event.event_id);

        $('#memberList').html('');
        _event.event_user.forEach((event_user) => {
            $('#memberList').append(`<div class="small py-1">${event_user.user.user_name}</div>`)
        });
    }

    api.addEventListener('ready', async ({detail: apiClient}) => {
        const params = new URLSearchParams(window.location.search);
        const id = params.get('id') ?? '';

        apiClient.event.find(id).then(async (_event) => {
            updateEventDetails(_event);

            // join websocket room
            await apiClient.event.join(id);

            // listen for updates
            apiClient.event.socket.on('event.refresh', (newEvent) => {
                updateEventDetails(newEvent)
            });
        }).catch((err) => {
            if (err.response) {
                toastr.error(err.response.data.message);
            } else {
                console.error(err);
            }
        });
    });
</script>