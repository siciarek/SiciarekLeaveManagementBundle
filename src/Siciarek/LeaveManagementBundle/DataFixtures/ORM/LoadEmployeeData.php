<?php

namespace Application\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

use Siciarek\LeaveManagementBundle\Entity\Employee;

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
             * @var Employee $obj
             */
            $obj = new Employee();
            $obj->setFirstName($e['first_name']);
            $obj->setLastName($e['last_name']);
            $obj->setEmail($e['email']);
            $obj->setEnabled($e['enabled']);
            $obj->setIsManager((array_key_exists('manager', $e) and $e['manager'] === true));
            $obj->setAttributableLeaveDaysNumber($e['attributable_leave_days_number']);

            $this->setReference('employee-' . $e['id'], $obj);

            $obj->setManager($this->getReference('employee-1'));

            $om->persist($obj);
        }

        $om->flush();
    }
}