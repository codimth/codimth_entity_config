<?php

namespace Drupal\codimth_entity_config;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a ball entity type.
 */
interface BallInterface extends ConfigEntityInterface {
    public function getColor();
    public function getPointValue();
}
