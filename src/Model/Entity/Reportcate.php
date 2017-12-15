<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reportcate Entity
 *
 * @property int $id
 * @property string $rc_name
 * @property string $rc_note
 * @property int $rc_list_flg
 * @property int $rc_order
 *
 * @property \App\Model\Entity\Report[] $reports
 */
class Reportcate extends Entity
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
        'rc_name' => true,
        'rc_note' => true,
        'rc_list_flg' => true,
        'rc_order' => true,
        'reports' => true
    ];
}
