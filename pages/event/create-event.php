<div class="container">
    <main class="d-flex flex-column h-100 bg-white">
        <form id="createEventForm" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Event Erstellen</h1>
                </div>
            </div>

            <div class="form-group mb-2">
                <label for="event_name" class="small fw-bold">Event Name</label>
                <input type="text" class="form-control" name="event_name" id="event_name">
            </div>

            <div class="form-group mb-2">
                <label for="parcour" class="small fw-bold">Parkour Auswahl</label>
                <select name="parcour" id="parcour" class="form-control">
                    <option selected disabled>-- Parkour wählen --</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label for="scoring" class="small fw-bold">Scoringsystem</label>
                <select name="scoring" id="scoring" class="form-control">
                    <option selected disabled>-- System wählen --</option>
                    <option value="1">Dreipfeilwertung</option>
                    <option value="2">Zweipfeilwertung</option>
                    <option value="2">Offizielles IBO Scoring</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label for="distance" class="small fw-bold">Pflock</label>
                <select name="distance" id="distance" class="form-control">
                    <option selected disabled>-- Pflock wählen --</option>
                    <option value="1">Rot</option>
                    <option value="2">Gelb</option>
                    <option value="3">Grün</option>
                </select>
            </div>

            <div class="d-flex flex-column mt-4">
                <button class="btn btn-primary">
                    Erstellen
                </button>
            </div>
        </form>
    </main>
</div>
<script>
    api.addEventListener('ready', async ({detail: apiClient}) => {
        // fetch parcours
        const parcours = await apiClient.parcour.list();
        parcours.forEach((parcour) => {
            $('#parcour').append($(`<option value="${parcour.parcour_id}">${parcour.parcour_name}</option>`));
        });

        // handle form submit
        $('#createEventForm').on('submit', (e) => {
            e.preventDefault();

            // create event and redirect
            apiClient.event.create({
                event_name: $('[name=event_name]').val(),
                parcour_id: $('[name=parcour]').val()
            }).then((event) => {
                window.location.href = '/event/event-uebersicht?id=' + event.event_id
            }).catch((err) => {
                toastr.error(err.response.data.message);
            });
        });
    });
</script>