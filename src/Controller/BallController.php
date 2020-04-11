<?php

namespace Drupal\codimth_entity_config\Controller;

use Drupal\Core\Controller\ControllerBase;

class BallController extends ControllerBase
{
    public function preview($ball)
    {
        $entity = \Drupal::entityTypeManager()
            ->getStorage('ball')
            ->load($ball);
        $items = [
          'Label: ' => $entity->label(),
            $entity->id(),
            $entity->status(),
            $entity->get('description'),
            $entity->getColor(),
            $entity->getPointValue(),
            ];
        return array(
            '#theme' => 'item_list',
            '#items' => $items,
        );
    }
}
