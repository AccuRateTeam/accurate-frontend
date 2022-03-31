<div class="container mb-4">
    <main class="d-flex flex-column h-100 bg-white">
        <form id="createParcourForm" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Parkour Erstellen</h1>
                </div>
            </div>

            <div class="form-group mb-2">
                <label for="parcour_name" class="small fw-bold">Parkour Name</label>
                <input type="text" class="form-control" name="parcour_name" id="parcour_name" placeholder="Mein Parkour">
            </div>

            <hr/>

            <h5 class="text-center">Ziel hinzufügen</h5>

            <div class="form-group mb-2">
                <label for="target_name" class="small fw-bold">Name</label>
                <input type="text" class="form-control" name="target_name" id="target_name" placeholder="Rotfuchs">
            </div>

            <div class="form-group mb-2">
                <label for="distance_1" class="small fw-bold">1. Distanz</label>
                <input type="text" class="form-control" name="distance_1" id="distance_1" placeholder="25m">
            </div>

            <div class="form-group mb-2">
                <label for="distance_2" class="small fw-bold">2. Distanz</label>
                <input type="text" class="form-control" name="distance_2" id="distance_2" placeholder="50m">
            </div>

            <div class="form-group mb-2">
                <label for="distance_3" class="small fw-bold">3. Distanz</label>
                <input type="text" class="form-control" name="distance_3" id="distance_3" placeholder="75m">
            </div>

            <div class="d-flex flex-column my-3">
                <button class="btn btn-outline-primary" id="addTarget" type="button">
                    Hinzufügen
                </button>
            </div>

            <table class="tablesort target-table table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Distanzen</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

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
        const targets = [];

        // init tablesort
        $('.tablesort tbody').sortable();

        // handle button click
        $('#addTarget').on('click', () => {
            const elements = {
                name: $('[name=target_name]'),
                distance_1: $('[name=distance_1]'),
                distance_2: $('[name=distance_2]'),
                distance_3: $('[name=distance_3]'),
            };
            const target = {
                name: elements.name.val(),
                distance_1: elements.distance_1.val(),
                distance_2: elements.distance_2.val(),
                distance_3: elements.distance_3.val(),
            };

            targets.push(target);
            $('.target-table tbody').append(`<tr><td>${target.name}</td><td>${[target.distance_1, target.distance_2, target.distance_3].join(', ')}</td></tr>`);
        });

        // handle form submit
        $('#createParcourForm').on('submit', (e) => {
            e.preventDefault();

            apiClient.parcour.create({
                parcour_name: $('[name=parcour_name]').val(),
            }).then((parcour) => {
                targets.forEach((target) => {
                    apiClient.target.create({
                        target_name: target.name,
                        target_distance1: parseInt(target.distance_1.replace(/\D/g,'')),
                        target_distance2: parseInt(target.distance_2.replace(/\D/g,'')),
                        target_distance3: parseInt(target.distance_3.replace(/\D/g,'')),
                    });
                });
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