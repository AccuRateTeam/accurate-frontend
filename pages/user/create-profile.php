<script>
    window.createProfilePage = true;
</script>
<div class="container">
    <main class="d-flex flex-column h-100 py-4 bg-white">
        <form id="createProfileForm" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Profil Erstellen</h1>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="username" class="small fw-bold">Nutzername</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Max">
            </div>

            <div class="form-group mb-3">
                <label for="email" class="small fw-bold">E-Mail</label>
                <input type="text" class="form-control" name="email" id="email" disabled>
            </div>

            <div class="d-flex flex-column mt-3">
                <button class="btn btn-primary">Beitreten</button>
            </div>
        </form>
    </main>
</div>
<script>
    auth.addEventListener('ready', async ({detail: authClient}) => {
        const user = await authClient.getUser();

        $('[name=username]').val(user.name.includes('@') ? '' : user.name);
        $('[name=email]').val(user.email);
    });

    api.addEventListener('ready', async ({detail: apiClient}) => {
        $('#createProfileForm').on('submit', (e) => {
            e.preventDefault();

            apiClient.user.create({
                user_name: $('[name=username]').val(),
                user_email: $('[name=email]').val()
            }).then((user) => {
                window.location.href = '/';
            }).catch((err) => {
                toastr.error(err.response.data.message);
            });
        });
    });
</script>