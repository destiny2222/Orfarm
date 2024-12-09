var iconlist = ['icon-user','icon-people','icon-user-female','icon-user-follow','icon-user-following','icon-user-unfollow','icon-login','icon-logout','icon-emotsmile','icon-phone','icon-call-end','icon-call-in','icon-call-out','icon-map','icon-location-pin','icon-direction','icon-directions','icon-compass','icon-layers','icon-menu','icon-list','icon-options-vertical','icon-options','icon-arrow-down','icon-arrow-left','icon-arrow-right','icon-arrow-up','icon-arrow-up-circle','icon-arrow-left-circle','icon-arrow-right-circle','icon-arrow-down-circle','icon-check','icon-clock','icon-plus','icon-minus','icon-close','icon-event','icon-exclamation','icon-organization','icon-trophy','icon-screen-smartphone','icon-screen-desktop','icon-plane','icon-notebook','icon-mustache','icon-mouse','icon-magnet','icon-energy','icon-disc','icon-cursor','icon-cursor-move','icon-crop','icon-chemistry','icon-speedometer','icon-shield','icon-screen-tablet','icon-magic-wand','icon-hourglass','icon-graduation','icon-ghost','icon-game-controller','icon-fire','icon-eyeglass','icon-envelope-open','icon-envelope-letter','icon-bell','icon-badge','icon-anchor','icon-wallet','icon-vector','icon-speech','icon-puzzle','icon-printer','icon-present','icon-playlist','icon-pin','icon-picture','icon-handbag','icon-globe-alt','icon-globe','icon-folder-alt','icon-folder','icon-film','icon-feed','icon-drop','icon-drawer','icon-docs','icon-doc','icon-diamond','icon-cup','icon-calculator','icon-bubbles','icon-briefcase','icon-book-open','icon-basket-loaded','icon-basket','icon-bag','icon-action-undo','icon-action-redo','icon-wrench','icon-umbrella','icon-trash','icon-tag','icon-support','icon-frame','icon-size-fullscreen','icon-size-actual','icon-shuffle','icon-share-alt','icon-share','icon-rocket','icon-question','icon-pie-chart','icon-pencil','icon-note','icon-loop','icon-home','icon-grid','icon-graph','icon-microphone','icon-music-tone-alt','icon-music-tone','icon-earphones-alt','icon-earphones','icon-equalizer','icon-like','icon-dislike','icon-control-start','icon-control-rewind','icon-control-play','icon-control-pause','icon-control-forward','icon-control-end','icon-volume-1','icon-volume-2','icon-volume-off','icon-calendar','icon-bulb','icon-chart','icon-ban','icon-bubble','icon-camrecorder','icon-camera','icon-cloud-download','icon-cloud-upload','icon-envelope','icon-eye','icon-flag','icon-heart','icon-info','icon-key','icon-link','icon-lock','icon-lock-open','icon-magnifier','icon-magnifier-add','icon-magnifier-remove','icon-paper-clip','icon-paper-plane','icon-power','icon-refresh','icon-reload','icon-settings','icon-star','icon-symbol-female','icon-symbol-male','icon-target','icon-credit-card','icon-paypal','icon-social-tumblr','icon-social-twitter','icon-social-facebook','icon-social-instagram','icon-social-linkedin','icon-social-pinterest','icon-social-github','icon-social-google','icon-social-reddit','icon-social-skype','icon-social-dribbble','icon-social-behance','icon-social-foursqare','icon-social-soundcloud','icon-social-spotify','icon-social-stumbleupon','icon-social-youtube','icon-social-dropbox','icon-social-vkontakte','icon-social-steam'];
for (var i = 0, l = iconlist.length; i < l; i++) {
    let iconblock = document.createElement('div');
    iconblock.setAttribute('class', 'i-block');
    iconblock.setAttribute('data-clipboard-text', 'icon ' + iconlist[i]);
    iconblock.setAttribute('data-bs-toggle', 'tooltip');
    iconblock.setAttribute('data-filter', iconlist[i]);
    iconblock.setAttribute('title', 'icon ' + iconlist[i]);

    let iconmain = document.createElement('i');
    iconmain.setAttribute('class', 'icon ' + iconlist[i]);
    iconblock.appendChild(iconmain);
    document.querySelector('#icon-wrapper').append(iconblock);
}
window.addEventListener('load', (event) => {
    var iclp = new ClipboardJS('.i-block');
    iclp.on('success', function (e) {
        var targetElement = e.trigger;
        let iconbadge = document.createElement('span');
        iconbadge.setAttribute('class', 'ic-badge badge bg-success');
        iconbadge.innerHTML = "copied";
        targetElement.append(iconbadge);
        setTimeout(function () {
            targetElement.children[1].remove();
        }, 3000);
    });

    iclp.on('error', function (e) {
        var targetElement = e.trigger;
        let iconbadge = document.createElement('span');
        iconbadge.setAttribute('class', 'ic-badge badge bg-danger');
        iconbadge.innerHTML = "Error";
        targetElement.append(iconbadge);
        setTimeout(function () {
            targetElement.children[1].remove();
        }, 3000);
    });
    document.querySelector("#icon-search").addEventListener("keyup", function () {
        var g = document.querySelector("#icon-search").value.toLowerCase();
        var tc = document.querySelectorAll(".i-main .i-block");
        for (var i = 0; i < tc.length; i++) {
            var c = tc[i];
            var t = c.getAttribute('data-filter');
            if (t) {
                var s = t.toLowerCase();
            }
            if (s) {
                var n = s.indexOf(g);
                if (n !== -1) {
                    c.style.display = "inline-flex";
                } else {
                    c.style.display = "none";
                }
            }
        }
    });
});