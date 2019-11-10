<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Container Entity
 *
 * @property string $id
 * @property string $container_id
 * @property string $container_name
 * @property int $radius_port
 * @property string $companies_id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Container[] $containers
 * @property \App\Model\Entity\Company $company
 */
class Container extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'container_id' => true,
        'container_name' => true,
        'radius_port' => true,
        'companies_id' => true,
        'created_at' => true,
        'updated_at' => true,
        'containers' => true,
        'company' => true
    ];
}
