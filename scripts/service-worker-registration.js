if ('serviceWorker' in navigator) {
  navigator
    .serviceWorker
    .register('service-worker.js')
    .catch(cannotRegisterServiceWorker)
    .then(serviceWorkerRegistered);
}

// //////////// ///

/**
 * handle if cannot register the service worker
 * @param {Error} error error thrown from the registration
 */
function cannotRegisterServiceWorker(error) {
  // console.error(error);
}

/**
 * call after register the service worker
 * @param {any} registration
 */
function serviceWorkerRegistered(registration) {
  // console.log(`Service worker started with scope ${registration.scope}`);
}
