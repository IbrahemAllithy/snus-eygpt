let deferredPrompt;

const installButton = document.createElement("button");

installButton.innerHTML = "📲 Install App";

installButton.id = "installAppButton";

document.body.appendChild(installButton);

window.addEventListener("beforeinstallprompt", (e) => {

    e.preventDefault();

    deferredPrompt = e;

    installButton.style.display = "flex";

});

installButton.addEventListener("click", async () => {

    if (!deferredPrompt) return;

    deferredPrompt.prompt();

    const { outcome } = await deferredPrompt.userChoice;

    console.log("Install:", outcome);

    deferredPrompt = null;

    installButton.style.display = "none";

});

window.addEventListener("appinstalled", () => {

    installButton.style.display = "none";

});