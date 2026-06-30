<!-- Sticky Player Template (Footer) -->
<div id="obje-global-player" class="obje-global-player hidden" aria-hidden="true">
    <div class="obje-player-inner">
        
        <div class="obje-player-left">
            <div class="obje-player-artwork">
                <span class="material-symbols-outlined pb-icon">podcasts</span>
            </div>
            <div class="obje-player-track-info">
                <div class="obje-player-title" id="obje-player-title">Podcast Title</div>
                <div class="obje-player-author" id="obje-player-author">Author Name</div>
            </div>
        </div>

        <div class="obje-player-center">
            <div class="obje-player-controls">
                <!-- Backward 15s -->
                <button class="obje-player-btn" id="obje-player-rewind" aria-label="Rewind 15 seconds">
                    <span class="material-symbols-outlined">replay_10</span>
                </button>
                
                <!-- Play/Pause -->
                <button class="obje-player-play-btn" id="obje-player-play-pause" aria-label="Play/Pause">
                    <span class="obje-active-global-icon">
                        <!-- Default icon overridden by JS if Elementor is active -->
                        <span class="material-symbols-outlined" id="obje-player-play-icon" style="font-size:40px;">play_circle</span>
                    </span>
                </button>
                
                <!-- Forward 15s -->
                <button class="obje-player-btn" id="obje-player-forward" aria-label="Forward 15 seconds">
                    <span class="material-symbols-outlined">forward_10</span>
                </button>
            </div>
            
            <div class="obje-player-progress-container">
                <span class="obje-player-time" id="obje-player-current">0:00</span>
                <div class="obje-player-progress-bar" id="obje-player-progress-bar">
                    <div class="obje-player-progress-filled" id="obje-player-progress-filled"></div>
                    <div class="obje-player-progress-thumb"></div>
                </div>
                <span class="obje-player-time" id="obje-player-duration">0:00</span>
            </div>
        </div>

        <div class="obje-player-right">
            <div class="obje-player-volume-container">
                <button class="obje-player-btn" id="obje-player-volume-btn" aria-label="Mute/Unmute">
                    <span class="material-symbols-outlined" id="obje-player-volume-icon">volume_up</span>
                </button>
                <div class="obje-player-volume-bar" id="obje-player-volume-bar">
                    <div class="obje-player-volume-filled" id="obje-player-volume-filled"></div>
                </div>
            </div>
            <button class="obje-player-btn obje-player-minimize-btn" id="obje-player-minimize-btn" aria-label="Minimize/Maximize Player">
                <span class="material-symbols-outlined" id="obje-player-minimize-icon">expand_more</span>
            </button>
            <button class="obje-player-btn obje-player-close-btn" id="obje-player-close-btn" aria-label="Close Player">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>
    
    <audio id="obje-audio-element" style="display:none;"></audio>
</div>
