<?php

namespace Drupal\codimth_entity_config\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\codimth_entity_config\BallInterface;

/**
 * Defines the ball entity type.
 *
 * @ConfigEntityType(
 *   id = "ball",
 *   label = @Translation("ball"),
 *   label_collection = @Translation("balls"),
 *   label_singular = @Translation("ball"),
 *   label_plural = @Translation("balls"),
 *   label_count = @PluralTranslation(
 *     singular = "@count ball",
 *     plural = "@count balls",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\codimth_entity_config\BallListBuilder",
 *     "form" = {
 *       "add" = "Drupal\codimth_entity_config\Form\BallForm",
 *       "edit" = "Drupal\codimth_entity_config\Form\BallForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "ball",
 *   admin_permission = "administer ball",
 *   links = {
 *     "collection" = "/admin/structure/ball",
 *     "add-form" = "/admin/structure/ball/add",
 *     "preview-page" = "/admin/structure/ball/{ball}/preview",
 *     "edit-form" = "/admin/structure/ball/{ball}",
 *     "delete-form" = "/admin/structure/ball/{ball}/delete"
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *     "color",
 *     "point_value"
 *   }
 * )
 */
class Ball extends ConfigEntityBase implements BallInterface
{

    /**
     * The ball ID.
     *
     * @var string
     */
    protected $id;

    /**
     * The ball label.
     *
     * @var string
     */
    protected $label;

    /**
     * The ball status.
     *
     * @var bool
     */
    protected $status;

    /**
     * The ball description.
     *
     * @var string
     */
    protected $description;

    /**
     * The color of this ball.
     *
     * @var string
     */
    protected $color;

    /**
     * The value of this ball measured in points.
     *
     * @var integer
     */
    protected $point_value;

    /**
     * {@inheritdoc}
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * {@inheritdoc}
     */
    public function getPointValue() {
        return $this->point_value;
    }

}
