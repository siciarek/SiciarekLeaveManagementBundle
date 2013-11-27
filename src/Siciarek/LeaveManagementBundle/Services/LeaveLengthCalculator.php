<?php
namespace Siciarek\LeaveManagementBundle\Services;

use Doctrine\ORM\EntityManager;

class LeaveLengthCalculator {

    /**
     * @var EntityManager
     */
    public $em;

    public function calculate(\DateTime $start, \DateTime $end) {
        return 12;
    }
}
