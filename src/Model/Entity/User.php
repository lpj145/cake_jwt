<?php
namespace App\Model\Entity;

use Authentication\IdentityInterface;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $id
 * @property string $name
 * @property string|null $lastname
 * @property string $username
 * @property string $password
 * @property string|null $token
 * @property string|null $token_old
 * @property string $phone
 * @property bool|null $two_way
 * @property string|null $role
 * @property bool|null $active
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 */
class User extends Entity implements IdentityInterface
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
        'name' => true,
        'lastname' => true,
        'username' => true,
        'password' => true,
        'token' => true,
        'token_old' => true,
        'phone' => true,
        'two_way' => true,
        'role' => true,
        'active' => true,
        'created_at' => true,
        'updated_at' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];

    public function _setPassword(string $password)
    {
        return (new DefaultPasswordHasher())->hash($password);
    }

    public function getIdentifier()
    {
        return $this->id;
    }

    public function getOriginalData()
    {
        return [
            'id' => $this->id,
            'role' => $this->role,
            'active' => $this->active
        ];
    }
}
