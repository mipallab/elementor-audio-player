# OBJE Podcast Player

Contributors: Majadul Islam Pallab 
Tags: podcast, audio, player, elementor, elementor widget, spotify, sticky player  
Requires at least: 5.8  
Tested up to: 6.6  
Requires PHP: 7.4  
Requires Plugins: elementor  
Elementor tested up to: 3.25  
Stable tag: 1.6.9  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A modern, high-fidelity Elementor podcast widget with a sticky global Spotify-style audio player. Supports Elementor Free.

## Description

OBJE Podcast Player adds a beautifully designed **Podcast Player widget** to Elementor and a dedicated sticky global player inspired by Spotify. Designed for podcasters, bloggers, and content creators who need a professional audio player without leaving Elementor Free.

### Key Features

- **Two Podcast Types**
  - Audio Player — upload or select an audio file via the WordPress media library
  - External Link — direct visitors to Spotify, Apple Podcasts, or any external platform

- **Sticky Global Player**
  - Fixed footer player with smooth slide-up animation
  - Play / Pause, Rewind 10s, Forward 10s
  - Seekable progress bar with live time updates
  - Volume slider with mute toggle
  - Minimize / Maximize (pill-shaped mini-player on mobile)
  - Close button
  - Auto-remembers the currently playing episode

- **Fully Customizable via Elementor**
  - **Content:** Title, Source / Author, Date, Duration, Badge text, Audio file, External link, Button text
  - **Icons:** Custom left icon (Podcast / External), Play icon, Pause icon via Elementor Icons Manager
  - **Card Box:** Background, border, border-radius, box-shadow, padding, margin, gap
  - **Typography:** Title, source, and meta text colors + full typography controls
  - **Icons:** Left icon color / size / column width; Play/Pause icon color, background, border, size, padding, hover states
  - **Badge:** Text color, background, border, radius, padding, typography
  - **Listen Button:** Typography, normal / hover colors, background, border, radius, padding, icon size
  - **Global Popup Player:** Background, text, muted text, title typography, meta typography

- **Design Details**
  - Responsive layout (mobile, tablet, desktop)
  - Clean grid-based card with smooth hover shadow transition
  - Default SVGs for common icons when no custom icon is chosen
  - Inter font family + Google Material Symbols Outlined for the sticky player
  - Smooth transitions and micro-interactions

## Installation

1. Upload the plugin files to the `/wp-content/plugins/obje-podcast-player` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Make sure Elementor is installed and activated.
4. Edit any page with Elementor and search for **Podcast Player** in the widget panel.
5. Drag the widget into your layout and configure it from the Elementor editor.

## Frequently Asked Questions

**Does this plugin work with Elementor Free?**  
Yes. OBJE Podcast Player supports both Elementor Free and Elementor Pro. No Pro license is required.

**What audio formats are supported?**  
Any audio format that the browser and HTML5 `<audio>` element supports (MP3, WAV, OGG, etc.).

**Can I use the widget multiple times on the same page?**  
Yes. You can add multiple Podcast Player widgets with different audio files or external links.

**Does the sticky player work with external links?**  
No. The sticky global player is only available for the **Audio Player** type. External links open the URL in a new tab.

**How do I style the global player per widget?**  
The global player accepts Elementor dynamic classes (`active-widget-{{ID}}`), so you can customize its colors and typography from the widget’s **Popup Player (Spotify-style)** style panel.

**Is it compatible with WordPress 6.6 and Elementor 3.25?**  
Yes. The plugin is tested up to WordPress 6.6 and Elementor 3.25.

## Changelog

### 1.6.9
- Initial public release
- Elementor Podcast Player widget with Audio and External Link types
- Sticky global Spotify-style audio player
- Elementor editor live preview integration
- Responsive design with mobile, tablet, and desktop breakpoints
- Custom icon support via Elementor Icons Manager
- Full style panels: Card, Typography, Icons, Badge, Button, Global Player

## Upgrade Notice

### 1.6.9
First stable release of OBJE Podcast Player.
