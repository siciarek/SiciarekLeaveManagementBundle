<?php
namespace Siciarek\LeaveManagementBundle\Doctrine\DBAL\Types;

class LeaveType extends EnumType
{
    const ON_DEMAND       = 'on_demand';
    const URGENT          = 'urgent';
    const HOLIDAY         = 'holiday';
    const SICK_LEAVE      = 'sick_leave';
    const PARENTAL_LEAVE  = 'parental_leave';
    const MATERNITY_LEAVE = 'maternity_leave';
    const PATERNITY_LEAVE = 'paternity_leave';
    const OTHER           = 'other';

    protected $name = 'leave';
    protected $default = self::HOLIDAY;
    protected $values = array(
        self::ON_DEMAND,
        self::URGENT,
        self::HOLIDAY,
        self::SICK_LEAVE,
        self::PARENTAL_LEAVE,
        self::MATERNITY_LEAVE,
        self::PATERNITY_LEAVE,
        self::OTHER,
    );

    public static function getValues()
    {
        return self::getType('leave')->values;
    }

    public static function getDefault()
    {
        return self::getType('leave')->default;
    }
}