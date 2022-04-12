<div class="container">
    <main class="d-flex flex-column h-100 bg-white">
        <form id="createEventForm" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Endscreen</h1>
                </div>
            </div>


            <div class="d-flex flex-column mt-4">
                <button class="btn btn-primary">
                    zurück zum Start
                </button>
            </div>
        </form>
    </main>
</div>
<script>
    //api.addEventListener('ready', async ({detail: apiClient}) => {
    //     // fetch parcours
    //     const parcours = await apiClient.parcour.list();
    //     parcours.forEach((parcour) => {
    //         $('#parcour').append($(`<option value="${parcour.parcour_id}">${parcour.parcour_name}</option>`));
    //     });

    //     // handle form submit
    //     $('#createEventForm').on('submit', (e) => {
    //         e.preventDefault();

            // create event and redirect
    //         apiClient.event.create({
    //             event_name: $('[name=event_name]').val(),
    //             parcour_id: $('[name=parcour]').val()
    //         }).then((event) => {
    //             window.location.href = '/event/event-uebersicht?id=' + event.event_id
    //         }).catch((err) => {
    //             toastr.error(err.response.data.message);
    //         });
    //     });
    // });
</script>