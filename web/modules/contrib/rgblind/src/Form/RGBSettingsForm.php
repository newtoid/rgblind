<?php

namespace Drupal\rgblind\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure rgblind settings for this site.
 */
class RGBSettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'rgblind.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'rgblind_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config(static::SETTINGS);
    $form['rgbclass'] = [
      '#type' => 'radios',
      '#title' => $this
        ->t('Select simulation option'),
      '#default_value' => $config->get('rgbclass'),
      '#options' => [
        0 => $this
          ->t('Default'),
        1 => $this
          ->t('Protanopia'),
        2 => $this
          ->t('Deuteranopia'),
      ],
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->config(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('rgbclass', $form_state->getValue('rgbclass'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
