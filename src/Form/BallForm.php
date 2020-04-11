<?php

namespace Drupal\codimth_entity_config\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * ball form.
 *
 * @property \Drupal\codimth_entity_config\BallInterface $entity
 */
class BallForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {

    $form = parent::form($form, $form_state);

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $this->entity->label(),
      '#description' => $this->t('Label for the ball.'),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $this->entity->id(),
      '#machine_name' => [
        'exists' => '\Drupal\codimth_entity_config\Entity\Ball::load',
      ],
      '#disabled' => !$this->entity->isNew(),
    ];

    $form['status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $this->entity->get('description'),
      '#description' => $this->t('Description of the ball.'),
    ];

      $form['color'] = array(
          '#type' => 'textfield',
          '#title' => $this->t('Ball Color'),
          '#default_value' => $this->entity->getColor(),
          '#size' => 30,
          '#required' => TRUE,
          '#maxlength' => 64,
          '#description' => $this->t('The color of this ball.'),
      );
      $form['point_value'] = array(
          '#type' => 'textfield',
          '#title' => $this->t('Point Value'),
          '#default_value' => $this->entity->getPointValue(),
          '#size' => 30,
          '#required' => TRUE,
          '#maxlength' => 64,
          '#description' => $this->t('The number of points this ball is worth.'),
      );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);
    $message_args = ['%label' => $this->entity->label()];
    $message = $result == SAVED_NEW
      ? $this->t('Created new ball %label.', $message_args)
      : $this->t('Updated ball %label.', $message_args);
    $this->messenger()->addStatus($message);
    $form_state->setRedirectUrl($this->entity->toUrl('collection'));
    return $result;
  }


    /**
     * {@inheritdoc}
     */
    protected function actions(array $form, FormStateInterface $form_state) {
        $actions = parent::actions($form, $form_state);
        $entity = $this->entity;
        if (!$entity->isNew()){
            $actions['preview'] = [
                '#type' => 'link',
                '#title' => $this->t('Preview'),
                '#attributes' => [
                    'class' => ['button', 'button--primary'],
                ],
                '#url' => $entity->toUrl('preview-page',[$entity->id()])
            ];
        }
        return $actions;
    }

}
