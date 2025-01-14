var iconlist = ['fe-activity','fe-airplay','fe-alert-circle','fe-alert-octagon','fe-alert-triangle','fe-align-center','fe-align-justify','fe-align-left','fe-align-right','fe-anchor','fe-aperture','fe-arrow-down','fe-arrow-down-circle','fe-arrow-down-left','fe-arrow-down-right','fe-arrow-left','fe-arrow-left-circle','fe-arrow-right','fe-arrow-right-circle','fe-arrow-up','fe-arrow-up-circle','fe-arrow-up-left','fe-arrow-up-right','fe-at-sign','fe-award','fe-battery','fe-battery-charging','fe-bell','fe-bell-off','fe-bluetooth','fe-bold','fe-book','fe-book-open','fe-bookmark','fe-box','fe-briefcase','fe-calendar','fe-camera','fe-camera-off','fe-cast','fe-check','fe-check-circle','fe-check-square','fe-chevron-down','fe-chevron-left','fe-chevron-right','fe-chevron-up','fe-chevrons-down','fe-chevrons-left','fe-chevrons-right','fe-chevrons-up','fe-chrome','fe-circle','fe-clipboard','fe-clock','fe-cloud','fe-cloud-drizzle','fe-cloud-lightning','fe-cloud-off','fe-cloud-rain','fe-cloud-snow','fe-code','fe-codepen','fe-command','fe-compass','fe-copy','fe-corner-down-left','fe-corner-down-right','fe-corner-left-down','fe-corner-left-up','fe-corner-right-down','fe-corner-right-up','fe-corner-up-left','fe-corner-up-right','fe-cpu','fe-credit-card','fe-crop','fe-crosshair','fe-database','fe-delete','fe-disc','fe-dollar-sign','fe-download','fe-download-cloud','fe-droplet','fe-edit','fe-edit-2','fe-edit-3','fe-external-link','fe-eye','fe-eye-off','fe-facebook','fe-fast-forward','fe-feather','fe-file','fe-file-minus','fe-file-plus','fe-file-text','fe-film','fe-filter','fe-flag','fe-folder','fe-folder-minus','fe-folder-plus','fe-git-branch','fe-git-commit','fe-git-merge','fe-git-pull-request','fe-github','fe-gitlab','fe-globe','fe-grid','fe-hard-drive','fe-hash','fe-headphones','fe-heart','fe-help-circle','fe-home','fe-image','fe-inbox','fe-info','fe-instagram','fe-italic','fe-layers','fe-layout','fe-life-buoy','fe-link','fe-link-2','fe-linkedin','fe-list','fe-loader','fe-lock','fe-log-in','fe-log-out','fe-mail','fe-map','fe-map-pin','fe-maximize','fe-maximize-2','fe-menu','fe-message-circle','fe-message-square','fe-mic','fe-mic-off','fe-minimize','fe-minimize-2','fe-minus','fe-minus-circle','fe-minus-square','fe-monitor','fe-moon','fe-more-horizontal','fe-more-vertical','fe-move','fe-music','fe-navigation','fe-navigation-2','fe-octagon','fe-package','fe-paperclip','fe-pause','fe-pause-circle','fe-percent','fe-phone','fe-phone-call','fe-phone-forwarded','fe-phone-incoming','fe-phone-missed','fe-phone-off','fe-phone-outgoing','fe-pie-chart','fe-play','fe-play-circle','fe-plus','fe-plus-circle','fe-plus-square','fe-pocket','fe-power','fe-printer','fe-radio','fe-refresh-ccw','fe-refresh-cw','fe-repeat','fe-rewind','fe-rotate-ccw','fe-rotate-cw','fe-rss','fe-save','fe-scissors','fe-search','fe-send','fe-server','fe-settings','fe-share','fe-share-2','fe-shield','fe-shield-off','fe-shopping-bag','fe-shopping-cart','fe-shuffle','fe-sidebar','fe-skip-back','fe-skip-forward','fe-slack','fe-slash','fe-sliders','fe-smartphone','fe-speaker','fe-square','fe-star','fe-stop-circle','fe-sun','fe-sunrise','fe-sunset','fe-tablet','fe-tag','fe-target','fe-terminal','fe-thermometer','fe-thumbs-down','fe-thumbs-up','fe-toggle-left','fe-toggle-right','fe-trash','fe-trash-2','fe-trending-down','fe-trending-up','fe-triangle','fe-truck','fe-tv','fe-twitter','fe-type','fe-umbrella','fe-underline','fe-unlock','fe-upload','fe-upload-cloud','fe-user','fe-user-check','fe-user-minus','fe-user-plus','fe-user-x','fe-users','fe-video','fe-video-off','fe-voicemail','fe-volume','fe-volume-1','fe-volume-2','fe-volume-x','fe-watch','fe-wifi','fe-wifi-off','fe-wind','fe-x','fe-x-square','fe-zap','fe-zap-off','fe-zoom-in','fe-zoom-out'];
for (var i = 0, l = iconlist.length; i < l; i++) {
    let iconblock = document.createElement('div');
    iconblock.setAttribute('class', 'i-block');
    iconblock.setAttribute('data-clipboard-text', 'fe ' + iconlist[i]);
    iconblock.setAttribute('data-bs-toggle', 'tooltip');
    iconblock.setAttribute('data-filter', iconlist[i]);
    iconblock.setAttribute('title', 'fe ' + iconlist[i]);

    let iconmain = document.createElement('i');
    iconmain.setAttribute('class', 'fe ' + iconlist[i]);
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