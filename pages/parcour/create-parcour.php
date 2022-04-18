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
                <input type="text" class="form-control" name="parcour_name" id="parcour_name" placeholder="Mein Parkour" required>
            </div>

            <hr/>

            <h5 class="text-center">Ziel hinzufügen</h5>

            <div class="form-group mb-2">
                <label for="target_name" class="small fw-bold">Name</label>
                <input type="text" class="form-control" name="target_name" id="target_name" placeholder="Rotfuchs">
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
                        <th></th>
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
        let targets = [];

        window.removeTarget = (id) => {
            targets = targets.filter((_, i) => i !== id);
            updateTable();
        }

        const updateTable = () => {
            $('.target-table tbody').html('');
            targets.forEach((target, i) => {
                $('.target-table tbody').append(`<tr><td>${target}</td><td><a href="#" onclick="removeTarget(${i})"/>Entfernen</td></tr>`);
            });
        }

        // init tablesort
        $('.tablesort tbody').sortable();

        // handle button click
        $('#addTarget').on('click', () => {
            const elements = {
                name: $('[name=target_name]'),
            };
            targets.push(elements.name.val());
            updateTable();

            elements.name.val('');
        });

        // handle form submit
        $('#createParcourForm').on('submit', (e) => {
            e.preventDefault();

            apiClient.parcour.create({
                parcour_name: $('[name=parcour_name]').val(),
                targets: targets.map((item) => ({
                    target_name: item
                }))
            }).then((parcour) => {
                toastr.success('Parkour wurd erfolgreich erstellt.');
                setTimeout(() => window.location.href = '/', 1000);
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