<?php

namespace Application\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Siciarek\LeaveManagementBundle\Doctrine\DBAL\Types\LeaveStatusType;
use Siciarek\LeaveManagementBundle\Doctrine\DBAL\Types\LeaveType;
use Siciarek\LeaveManagementBundle\Entity\Leave;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

use Siciarek\LeaveManagementBundle\Entity\Employee;
use Siciarek\LeaveManagementBundle\Entity\Manager;

class LoadLeaveData extends BaseFixture
{
    protected $order = 2;
    public $count = 0;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $om)
    {
        $index = 1;

        foreach ($this->getData('Leave') as $l) {

            /**
             * @var Leave $obj
             */
            $obj = new Leave();

            $employee = $this->getReference('employee-' . $l['employee']);
            $covered_by = is_integer($l['covered_by']) ? $this->getReference('employee-' . $l['covered_by']) : null;

            $obj->setType(LeaveType::getDefault());
            $obj->setStatus(LeaveStatusType::getDefault());
            $obj->setEmployee($employee);
            $obj->setCoveredBy($covered_by);
            $obj->setStartsAt(new \DateTime($l['starts_at']));
            $obj->setEndsAt(new \DateTime($l['ends_at']));

            $length = $this->container->get('slm.leave.length.calculator')->calculate($obj->getStartsAt(), $obj->getEndsAt());

            $obj->setLength($length['abs']);
            $obj->setWorkingDays($length['working_days']);

            $om->persist($obj);
            $this->setReference('leave-' . ($index++), $obj);
        }

        $om->flush();
    }
}