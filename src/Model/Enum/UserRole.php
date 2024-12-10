<?php
declare(strict_types=1);

namespace CakephpUsers\Model\Enum;

use Cake\Database\Type\EnumLabelInterface;
use Cake\Utility\Inflector;

/**
 * UserRole Enum
 */
enum UserRole: int implements EnumLabelInterface
{
    case Administrator = 1;
    case General = 2;

    /**
     * @return string
     */
    public function label(): string
    {
        return Inflector::humanize(Inflector::underscore($this->name));
    }
}
