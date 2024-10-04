// myapp.js
const manifestUri = '/resources/videos/ShakaPlayer.mp4';

function initApp() {
  // Install built-in polyfills to patch browser incompatibilities.
  shaka.polyfill.installAll();

  // Check to see if the browser supports the basic APIs Shaka needs.
  if (shaka.Player.isBrowserSupported()) {
    // Everything looks good!
    initPlayer();
  }
}

async function initPlayer() {
  // Create a Player instance.
  const video = document.getElementById('video');
  const player = new shaka.Player();
  await player.attach(video);

  // Attach player to the window to make it easy to access in the JS console.
  window.player = player;

  // Listen for error events.
  player.addEventListener('error', onErrorEvent);

  // Try to load a manifest.
  // This is an asynchronous process.
  try {
    await player.load(manifestUri);
    await player.addTextTrack(screenText, 'zh', 'subtitles', 'text/vtt');
    // This runs if the asynchronous load is successful.
  } catch (e) {
    // onError is executed if the asynchronous load fails.
    onError(e);
  }
}
function onErrorEvent(event) {
  // Extract the shaka.util.Error object from the event.
  onError(event.detail);
}

document.addEventListener('DOMContentLoaded', initApp);
