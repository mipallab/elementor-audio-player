<?php
/**
 * Sticky Player Template (Footer)
 *
 * @package OBJE_Podcast_Player
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="obje-global-player" class="obje-global-player hidden" aria-hidden="true">
    <div class="obje-player-inner">
        
        <div class="obje-player-left">
            <div class="obje-player-artwork">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon"><circle cx="12" cy="12" r="1"></circle><path d="M16 12a4 4 0 0 0-8 0"></path><path d="M12 2a10 10 0 0 0-10 10c0 2.5 1 4.7 2.5 6.5"></path><path d="M12 22a10 10 0 0 0 10-10c0-2.5-1-4.7-2.5-6.5"></path></svg>
            </div>
            <div class="obje-player-track-info">
                <div class="obje-player-title" id="obje-player-title"><?php esc_html_e( 'Podcast Title', 'obje-podcast-player' ); ?></div>
                <div class="obje-player-author" id="obje-player-author"><?php esc_html_e( 'Author Name', 'obje-podcast-player' ); ?></div>
            </div>
        </div>

        <div class="obje-player-center">
            <div class="obje-player-controls">
                <!-- Backward 10s -->
                <button class="obje-player-btn" id="obje-player-rewind" aria-label="<?php esc_attr_e( 'Rewind 10 seconds', 'obje-podcast-player' ); ?>">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                        <path d="M3 3v5h5" />
                        <text x="12" y="15" font-size="7" font-family="system-ui, sans-serif" font-weight="bold" fill="currentColor" text-anchor="middle" stroke="none">10</text>
                    </svg>
                </button>
                
                <!-- Play/Pause -->
                <button class="obje-player-play-btn" id="obje-player-play-pause" aria-label="<?php esc_attr_e( 'Play/Pause', 'obje-podcast-player' ); ?>">
                    <span class="obje-active-global-icon">
                        <svg viewBox="0 0 24 24" width="40" height="40" fill="currentColor" class="obje-svg-icon obje-play-icon">
                            <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2" />
                            <polygon points="10 8 16 12 10 16 10 8" />
                        </svg>
                        <svg viewBox="0 0 24 24" width="40" height="40" fill="currentColor" class="obje-svg-icon obje-pause-icon" style="display:none;">
                            <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2" />
                            <line x1="10" y1="15" x2="10" y2="9" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <line x1="14" y1="15" x2="14" y2="9" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </span>
                </button>
                
                <!-- Forward 10s -->
                <button class="obje-player-btn" id="obje-player-forward" aria-label="<?php esc_attr_e( 'Forward 10 seconds', 'obje-podcast-player' ); ?>">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon">
                        <path d="M21 12a9 9 0 1 1-9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" />
                        <path d="M21 3v5h-5" />
                        <text x="12" y="15" font-size="7" font-family="system-ui, sans-serif" font-weight="bold" fill="currentColor" text-anchor="middle" stroke="none">10</text>
                    </svg>
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
                <button class="obje-player-btn" id="obje-player-volume-btn" aria-label="<?php esc_attr_e( 'Mute/Unmute', 'obje-podcast-player' ); ?>">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon obje-volume-icon-up">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5" fill="currentColor" />
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07" />
                    </svg>
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon obje-volume-icon-down" style="display:none;">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5" fill="currentColor" />
                        <path d="M15.54 8.46a5 5 0 0 1 0 7.07" />
                    </svg>
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon obje-volume-icon-off" style="display:none;">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5" fill="currentColor" />
                        <line x1="23" y1="9" x2="17" y2="15" />
                        <line x1="17" y1="9" x2="23" y2="15" />
                    </svg>
                </button>
                <div class="obje-player-volume-bar" id="obje-player-volume-bar">
                    <div class="obje-player-volume-filled" id="obje-player-volume-filled"></div>
                </div>
            </div>
            <button class="obje-player-btn obje-player-minimize-btn" id="obje-player-minimize-btn" aria-label="<?php esc_attr_e( 'Minimize/Maximize Player', 'obje-podcast-player' ); ?>">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon obje-minimize-icon">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon obje-maximize-icon" style="display:none;">
                    <polyline points="18 15 12 9 6 15" />
                </svg>
            </button>
            <button class="obje-player-btn obje-player-close-btn" id="obje-player-close-btn" aria-label="<?php esc_attr_e( 'Close Player', 'obje-podcast-player' ); ?>">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="obje-svg-icon">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    </div>
    
    <audio id="obje-audio-element" style="display:none;"></audio>
</div>
