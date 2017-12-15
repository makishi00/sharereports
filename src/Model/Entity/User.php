<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $us_mail
 * @property string $us_name
 * @property string $us_password
 * @property int $us_auth
 *
 * @property \App\Model\Entity\Report[] $reports
 */
class User extends Entity
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
        'us_mail' => true,
        'us_name' => true,
        'us_password' => true,
        'us_auth' => true,
        'reports' => true
    ];
}
