<?php

namespace Application\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

use Siciarek\LeaveManagementBundle\Entity\Employee;
use Siciarek\LeaveManagementBundle\Entity\Manager;

class LoadEmployeeData extends BaseFixture
{
    protected $order = 1;
    public $count = 0;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $om)
    {
        foreach ($this->getData('Employee') as $e) {

            /**
             * @var Employee|Manager $obj
             */
            $role = (array_key_exists('manager', $e) and $e['manager'] === true) ? 'manager' : 'employee';
            $obj = (array_key_exists('manager', $e) and $e['manager'] === true) ? new Manager(): new Employee();
            $obj->setFirstName($e['first_name']);
            $obj->setLastName($e['last_name']);
            $obj->setEmail($e['email']);
            $obj->setEnabled($e['enabled']);
            $obj->setAttributableLeaveDaysNumber($e['attributable_leave_days_number']);
            $this->setReference($role . '-' . $e['id'], $obj);

            $om->persist($obj);
        }

        $om->flush();
    }
}