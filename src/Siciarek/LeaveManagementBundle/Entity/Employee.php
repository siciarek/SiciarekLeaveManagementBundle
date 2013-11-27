<?php

namespace Siciarek\LeaveManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 */
class Employee
{
    public function __toString() {
        return $this->getFullName()?:'';
    }

    public function getFullName() {
        $fullname = sprintf('%s %s',
            strval($this->getFirstName()),
            strval($this->getLastName())
        );

        $fullname = trim($fullname);

        return strlen($fullname) > 0 ? $fullname : null;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $is_manager;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var integer
     */
    private $attributable_leave_days_number;

    /**
     * @var string
     */
    private $slug;

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
     * @var \Siciarek\LeaveManagementBundle\Entity\Employee
     */
    private $manager;


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
     * Set first_name
     *
     * @param string $firstName
     * @return Employee
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set is_manager
     *
     * @param boolean $isManager
     * @return Employee
     */
    public function setIsManager($isManager)
    {
        $this->is_manager = $isManager;
    
        return $this;
    }

    /**
     * Get is_manager
     *
     * @return boolean 
     */
    public function getIsManager()
    {
        return $this->is_manager;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Employee
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set attributable_leave_days_number
     *
     * @param integer $attributableLeaveDaysNumber
     * @return Employee
     */
    public function setAttributableLeaveDaysNumber($attributableLeaveDaysNumber)
    {
        $this->attributable_leave_days_number = $attributableLeaveDaysNumber;
    
        return $this;
    }

    /**
     * Get attributable_leave_days_number
     *
     * @return integer 
     */
    public function getAttributableLeaveDaysNumber()
    {
        return $this->attributable_leave_days_number;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Employee
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * Set manager
     *
     * @param \Siciarek\LeaveManagementBundle\Entity\Employee $manager
     * @return Employee
     */
    public function setManager(\Siciarek\LeaveManagementBundle\Entity\Employee $manager = null)
    {
        $this->manager = $manager;
    
        return $this;
    }

    /**
     * Get manager
     *
     * @return \Siciarek\LeaveManagementBundle\Entity\Employee 
     */
    public function getManager()
    {
        return $this->manager;
    }
}