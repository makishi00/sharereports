<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $rp_date
 * @property \Cake\I18n\FrozenTime $rp_time_from
 * @property \Cake\I18n\FrozenTime $rp_time_to
 * @property string $rp_content
 * @property \Cake\I18n\FrozenTime $rp_created_at
 * @property int $reportcate_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Reportcate $reportcate
 * @property \App\Model\Entity\User $user
 */
class Report extends Entity
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
        'rp_date' => true,
        'rp_time_from' => true,
        'rp_time_to' => true,
        'rp_content' => true,
        'rp_created_at' => true,
        'reportcate_id' => true,
        'user_id' => true,
        'reportcate' => true,
        'user' => true
    ];
}
