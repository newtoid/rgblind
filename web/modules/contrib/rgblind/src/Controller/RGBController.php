<?php
/**
 * @file
 * Contains \Drupal\rgblind\Controller\RGBController.
 */

namespace Drupal\rgblind\Controller;
class RGBController {
  public function content2() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This is the settings page for the colourblindness simulation.'),
    );
  }
}
