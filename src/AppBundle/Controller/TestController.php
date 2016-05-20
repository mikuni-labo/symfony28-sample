<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/test")
 */
class TestController extends Controller
{
	/**
	 * @Route("/helloworld/{name}")
	 */
	public function indexAction($name)
	{
		return array('name' => $name);
	}
}
