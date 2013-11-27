<?php

namespace Siciarek\LeaveManagementBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;


/**
 * @Route("/leave-management")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="_leave_management_index")
     * @Template()
     */
    public function indexAction()
    {
        return array(
		
		);
    }
}
