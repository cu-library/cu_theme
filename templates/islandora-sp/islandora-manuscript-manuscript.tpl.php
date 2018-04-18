<?php
/**
 * @file
 * Template file to style output.
 */
?>
<?php if (isset($viewer)): ?>
  <div id="manuscript-viewer">
    <?php print $viewer; ?>
  </div>
<?php endif; ?>
<?php if ($islandora_manuscript_metadata): ?>
    <div class="islandora-manuscript-metadata">
      <?php print $description; ?>
      <?php print $metadata; ?>
    </div>
<?php endif; ?>
