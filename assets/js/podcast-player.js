/**
 * OBJE Podcast Player - Global Audio Logic
 */
jQuery(document).ready(function($) {
    
    const audioEl = document.getElementById('obje-audio-element');
    const playerContainer = $('#obje-global-player');
    const playPauseBtn = $('#obje-player-play-pause');
    const globalPlayIconContainer = $('.obje-active-global-icon');
    
    const titleEl = $('#obje-player-title');
    const authorEl = $('#obje-player-author');
    
    const progressContainer = $('#obje-player-progress-bar');
    const progressFilled = $('#obje-player-progress-filled');
    const progressThumb = $('.obje-player-progress-thumb');
    const timeCurrent = $('#obje-player-current');
    const timeDuration = $('#obje-player-duration');
    
    const volumeContainer = $('#obje-player-volume-bar');
    const volumeFilled = $('#obje-player-volume-filled');
    const volumeBtn = $('#obje-player-volume-btn');
    const volumeIcon = $('#obje-player-volume-icon');
    
    const minimizeBtn = $('#obje-player-minimize-btn');
    const closeBtn = $('#obje-player-close-btn');
    const rewindBtn = $('#obje-player-rewind');
    const forwardBtn = $('#obje-player-forward');
    
    let isPlaying = false;
    let isDragging = false;
    let currentPodcastUrl = '';

    // Store custom icons from the active widget
    let activePlayIconHtml = '<span class="material-symbols-outlined" style="font-size:40px;">play_circle</span>';
    let activePauseIconHtml = '<span class="material-symbols-outlined" style="font-size:40px;">pause_circle</span>';

    // Convert seconds to MM:SS
    function formatTime(seconds) {
        if (isNaN(seconds)) return '0:00';
        const m = Math.floor(seconds / 60);
        const s = Math.floor(seconds % 60);
        return m + ':' + (s < 10 ? '0' : '') + s;
    }

    // Initialize player with podcast data
    function loadPodcast(wrapper, preventAutoplay = false) {
        const url = wrapper.data('audio');
        
        // Allow widget to load even without URL in Elementor editor for styling preview
        if (!url && !preventAutoplay) {
            console.warn('No audio file provided for this podcast.');
            return;
        }

        const title = wrapper.data('title') || 'Podcast Title Placeholder';
        const author = wrapper.data('author') || 'Author Name Placeholder';
        const widgetId = wrapper.data('widget-id');

        titleEl.text(title);
        authorEl.text(author);
        
        // Apply Active Widget ID class for Elementor Global Styling binding!
        playerContainer.removeClass(function (index, className) {
            return (className.match (/(^|\s)active-widget-\S+/g) || []).join(' ');
        });
        if (widgetId) {
            playerContainer.addClass('active-widget-' + widgetId);
        }

        // If it's a new track, update src and play
        if (url && currentPodcastUrl !== url) {
            audioEl.src = url;
            currentPodcastUrl = url;
            if (!preventAutoplay) {
                audioEl.load();
            }
        }

        playerContainer.removeClass('hidden');
        playerContainer.removeClass('is-minimized'); // auto expand when clicking a new one
        $('#obje-player-minimize-icon').text('expand_more');

        if (!preventAutoplay && url) {
            togglePlay();
        }
    }

    // Play/Pause logic
    function togglePlay() {
        if (audioEl.paused) {
            audioEl.play().then(() => {
                isPlaying = true;
                globalPlayIconContainer.html(activePauseIconHtml);
                updateWidgetButtons(true);
            }).catch(e => console.error("Playback failed:", e));
        } else {
            audioEl.pause();
            isPlaying = false;
            globalPlayIconContainer.html(activePlayIconHtml);
            updateWidgetButtons(false);
        }
    }

    function updateWidgetButtons(playing) {
        // Find if any widget has the current url, update its icon
        $('.obje-podcast-wrapper').each(function() {
            const url = $(this).data('audio');
            if (!url) return; // Ignore external links
            
            const iconContainer = $(this).find('.obje-active-icon-container');
            const hiddenIcons = $(this).find('.obje-hidden-icons');
            
            if (iconContainer.length === 0 || hiddenIcons.length === 0) return;
            
            if (url === currentPodcastUrl) {
                if (playing) {
                    iconContainer.html(hiddenIcons.find('.obje-icon-pause').html());
                } else {
                    iconContainer.html(hiddenIcons.find('.obje-icon-play').html());
                }
            } else {
                iconContainer.html(hiddenIcons.find('.obje-icon-play').html());
            }
        });
    }

    // Listen to Elementor Widget clicks
    $(document).on('click', '.obje-podcast-play-btn', function(e) {
        e.preventDefault();
        const wrapper = $(this).closest('.obje-podcast-wrapper');
        const url = wrapper.data('audio');
        
        if (currentPodcastUrl === url) {
            // Un-minimize if it's minimized and clicked again
            if (playerContainer.hasClass('is-minimized')) {
                playerContainer.removeClass('is-minimized');
                $('#obje-player-minimize-icon').text('expand_more');
            } else {
                togglePlay();
            }
        } else {
            loadPodcast(wrapper);
        }
    });

    // Global Player Controls
    playPauseBtn.on('click', togglePlay);

    rewindBtn.on('click', function() {
        audioEl.currentTime = Math.max(0, audioEl.currentTime - 10);
    });

    forwardBtn.on('click', function() {
        audioEl.currentTime = Math.min(audioEl.duration, audioEl.currentTime + 10);
    });

    minimizeBtn.on('click', function() {
        playerContainer.toggleClass('is-minimized');
        const icon = $('#obje-player-minimize-icon');
        
        if (playerContainer.hasClass('is-minimized')) {
            // No action needed here, CSS handles the icon content replacing to `expand_less`
        }
    });

    closeBtn.on('click', function() {
        audioEl.pause();
        currentPodcastUrl = '';
        isPlaying = false;
        globalPlayIconContainer.html(activePlayIconHtml);
        playerContainer.addClass('hidden');
        updateWidgetButtons(false);
    });

    // Update Progress
    $(audioEl).on('timeupdate', function() {
        if (!isDragging) {
            const current = audioEl.currentTime;
            const duration = audioEl.duration;
            timeCurrent.text(formatTime(current));
            
            if (duration && !isNaN(duration)) {
                const percent = (current / duration) * 100;
                progressFilled.css('width', percent + '%');
                progressThumb.css('left', percent + '%');
            }
        }
    });

    $(audioEl).on('loadedmetadata', function() {
        timeDuration.text(formatTime(audioEl.duration));
    });

    $(audioEl).on('ended', function() {
        isPlaying = false;
        globalPlayIconContainer.html(activePlayIconHtml);
        updateWidgetButtons(false);
    });

    // Seek bar interactions
    progressContainer.on('mousedown', function(e) {
        isDragging = true;
        updateProgress(e);
    });

    $(document).on('mousemove', function(e) {
        if (isDragging) {
            updateProgress(e);
        }
    });

    $(document).on('mouseup', function(e) {
        if (isDragging) {
            isDragging = false;
            updateProgress(e);
        }
    });

    function updateProgress(e) {
        const rect = progressContainer[0].getBoundingClientRect();
        let x = e.clientX - rect.left;
        x = Math.max(0, Math.min(x, rect.width));
        const percent = (x / rect.width) * 100;
        
        progressFilled.css('width', percent + '%');
        progressThumb.css('left', percent + '%');
        
        if (!isDragging && audioEl.duration) {
            audioEl.currentTime = (percent / 100) * audioEl.duration;
        }
    }

    // Volume interactions
    let isVolDragging = false;

    volumeContainer.on('mousedown', function(e) {
        isVolDragging = true;
        updateVolume(e);
    });

    $(document).on('mousemove', function(e) {
        if (isVolDragging) {
            updateVolume(e);
        }
    });

    $(document).on('mouseup', function(e) {
        if (isVolDragging) {
            isVolDragging = false;
        }
    });

    function updateVolume(e) {
        const rect = volumeContainer[0].getBoundingClientRect();
        let x = e.clientX - rect.left;
        x = Math.max(0, Math.min(x, rect.width));
        const percent = (x / rect.width);
        
        volumeFilled.css('width', (percent * 100) + '%');
        audioEl.volume = percent;
        
        if (percent === 0) {
            volumeIcon.text('volume_off');
        } else if (percent < 0.5) {
            volumeIcon.text('volume_down');
        } else {
            volumeIcon.text('volume_up');
        }
    }

    volumeBtn.on('click', function() {
        if (audioEl.volume > 0) {
            audioEl.dataset.savedVolume = audioEl.volume;
            audioEl.volume = 0;
            volumeFilled.css('width', '0%');
            volumeIcon.text('volume_off');
        } else {
            const saved = audioEl.dataset.savedVolume || 1;
            audioEl.volume = saved;
            volumeFilled.css('width', (saved * 100) + '%');
            volumeIcon.text(saved < 0.5 ? 'volume_down' : 'volume_up');
        }
    });

    // Elementor Editor Live Preview Integration
    $(window).on('elementor/frontend/init', function() {
        if (!elementorFrontend.isEditMode()) {
            return;
        }
        elementorFrontend.hooks.addAction('frontend/element_ready/obje_podcast_player.default', function($scope) {
            const wrapper = $scope.find('.obje-podcast-wrapper');
            if (wrapper.length) {
                // Instantly load the edited widget's layout to preview global popup styles without autoplay
                loadPodcast(wrapper, true); 
            }
        });
    });

});
