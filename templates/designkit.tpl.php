/**
 * This template should be overridden by implementing themes to establish
 * the styles they would like to use with DesignKit settings. The following
 * template is provided as a simple example of how you can generate CSS
 * styles from DesignKit settings.
 *
 * .designkit-color { color: [?php print $foreground ?]; }
 * .designkit-bg { background-color: [?php print $background ?]; }
 */

.region-leaderboard,
.islandora-toolbar {
  background-color: <?php print $leaderboard_color ;?>
}

body {
  background-color: <?php print $body_background ;?>
}

footer {
  background-color: <?php print $footer_background ;?>
}