window.auth = new EventTarget();
window.api = new EventTarget();

window.onload = async function () {
    const config = await fetch('/config.json').then((res) => res.json());
    const authClient = await Accurate.AuthClient.create(config.auth.domain, config.auth.clientId, config.auth.audience);
    const isAuthenticated = await authClient.isAuthenticated();
    const elements = {
        auth: {
            loginButton: $('.login-button'),
            logoutButton: $('.logout-button'),
            username: $('.username'),
            authWrapper: $('.auth-wrapper')
        },
        loader: $('.loader')
    };

    // remove loader
    elements.loader.remove();

    // call auth ready event
    window.auth.dispatchEvent(new CustomEvent('ready', {
        detail: authClient
    }));

    // login button handler
    elements.auth.loginButton.on('click', async () => {
        await authClient.authorize(window.location.origin);
    });

    // logout button handler
    elements.auth.logoutButton.on('click', async () => {
        await authClient.logout(window.location.origin);
    });

    // hide/show login/logout button
    if (isAuthenticated) {
        await elements.auth.loginButton.hide();
        await elements.auth.logoutButton.show();
    } else {
        await elements.auth.loginButton.show();
        await elements.auth.logoutButton.hide();
    }

    if (isAuthenticated) {
        const apiClient = await Accurate.ApiClient.create(config.apiUrl, config.socketUrl, await authClient.getAccessToken());

        // call api ready event
        window.api.dispatchEvent(new CustomEvent('ready', {
            detail: apiClient
        }));

        // redirect user to create profile page
        apiClient.user.me().then((user) => {
            window.user = user;
            elements.auth.username.text(window.user.user_name);
            elements.auth.username.show();
        }).catch(() => {
            if (!window.location.href.includes('profil-erstellen')) {
                window.location.href = '/profil/profil-erstellen';
            }
        });
    }
}