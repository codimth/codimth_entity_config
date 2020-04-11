<?php

namespace Drupal\codimth_entity_config;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of balls.
 */
class BallListBuilder extends ConfigEntityListBuilder
{

    /**
     * {@inheritdoc}
     */
    public function buildHeader()
    {
        $header['label'] = $this->t('Label');
        $header['id'] = $this->t('Machine name');
        $header['status'] = $this->t('Status');
        $header['color'] = $this->t('Color');
        $header['point_value'] = $this->t('Points');
        return $header + parent::buildHeader();
    }

    /**
     * {@inheritdoc}
     */
    public function buildRow(EntityInterface $entity)
    {
        /** @var \Drupal\codimth_entity_config\BallInterface $entity */
        $row['label'] = $entity->label();
        $row['id'] = $entity->id();
        $row['status'] = $entity->status() ? $this->t('Enabled') : $this->t('Disabled');
        $row['color'] = $entity->getColor();
        $row['point_value'] = $entity->getPointValue();
        return $row + parent::buildRow($entity);
    }


    /**
     * {@inheritdoc}
     */
    public function getDefaultOperations(EntityInterface $entity)
    {
        $operations = parent::getDefaultOperations($entity);
        $operations['preview'] = array(
            'title' => t('Preview'),
            'weight' => 20,
            'url' => $this->ensureDestination($entity->toUrl('preview-page',[$entity->id()])),
        );
        return $operations;
    }

}
