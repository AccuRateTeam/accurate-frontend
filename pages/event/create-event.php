<div class="container">
    <main class="d-flex flex-column h-100 bg-white">
        <form action="" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Event Erstellen</h1>
                </div>
            </div>

            <div class="form-group mb-2">
                <label for="title" class="small fw-bold">Event Name</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group mb-2">
                <label for="parcour" class="small fw-bold">Parkour Auswahl</label>
                <select name="parcour" id="parcour" class="form-control">
                    <option selected disabled>-- Parkour wählen --</option>
                    <option value="1">Ampfelwang</option>
                    <option value="2">Froschberg</option>
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