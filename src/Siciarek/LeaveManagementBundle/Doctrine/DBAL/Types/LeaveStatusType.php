<?php
namespace Siciarek\LeaveManagementBundle\Doctrine\DBAL\Types;

class LeaveStatusType extends EnumType
{
    const PENDING = 'pending';
    const APPROVED = 'approved';
    const CANCELLED = 'cancelled';

    protected $name = 'leave_status';
    protected $default = self::PENDING;
    protected $values = array(
        self::PENDING,
    );

    public static function getValues()
    {
        return self::getType('leave_status')->values;
    }

    public static function getDefault()
    {
        return self::getType('leave_status')->default;
    }
}