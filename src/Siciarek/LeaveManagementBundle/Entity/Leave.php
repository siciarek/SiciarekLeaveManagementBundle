<?php

namespace Siciarek\LeaveManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leave
 */
class Leave
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Leave
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Leave
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return Leave
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;
    
        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
    /**
     * @var \DateTime
     */
    private $starts_at;

    /**
     * @var \DateTime
     */
    private $ends_at;

    /**
     * @var integer
     */
    private $length;


    /**
     * Set starts_at
     *
     * @param \DateTime $startsAt
     * @return Leave
     */
    public function setStartsAt($startsAt)
    {
        $this->starts_at = $startsAt;
    
        return $this;
    }

    /**
     * Get starts_at
     *
     * @return \DateTime 
     */
    public function getStartsAt()
    {
        return $this->starts_at;
    }

    /**
     * Set ends_at
     *
     * @param \DateTime $endsAt
     * @return Leave
     */
    public function setEndsAt($endsAt)
    {
        $this->ends_at = $endsAt;
    
        return $this;
    }

    /**
     * Get ends_at
     *
     * @return \DateTime 
     */
    public function getEndsAt()
    {
        return $this->ends_at;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return Leave
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }
    /**
     * @var leave
     */
    private $type;

    /**
     * @var \Siciarek\LeaveManagementBundle\Entity\Employee
     */
    private $employee;

    /**
     * @var \Siciarek\LeaveManagementBundle\Entity\Manager
     */
    private $approved_by;


    /**
     * Set type
     *
     * @param leave $type
     * @return Leave
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return leave 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set employee
     *
     * @param \Siciarek\LeaveManagementBundle\Entity\Employee $employee
     * @return Leave
     */
    public function setEmployee(\Siciarek\LeaveManagementBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;
    
        return $this;
    }

    /**
     * Get employee
     *
     * @return \Siciarek\LeaveManagementBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set approved_by
     *
     * @param \Siciarek\LeaveManagementBundle\Entity\Manager $approvedBy
     * @return Leave
     */
    public function setApprovedBy(\Siciarek\LeaveManagementBundle\Entity\Manager $approvedBy = null)
    {
        $this->approved_by = $approvedBy;
    
        return $this;
    }

    /**
     * Get approved_by
     *
     * @return \Siciarek\LeaveManagementBundle\Entity\Manager 
     */
    public function getApprovedBy()
    {
        return $this->approved_by;
    }
}