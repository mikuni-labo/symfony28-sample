<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use \Symfony\Component\Security\Core\User\UserProviderInterface;
use \Symfony\Component\Security\Core\User\UserInterface;

/**
 * This custom Doctrine repository is empty because so far we don't need any custom
 * method to query for application user information. But it's always a good practice
 * to define a custom repository that will be used when the application grows.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{
	/**
	 * ユーザー名からユーザー情報を取得する
	 *
	 * @param string $username
	 * @return object
	 */
	public function loadUserByUsername($username)
	{
		return $this->findOneBy(array('username' => $username));
	}
	
	/**
	 * ユーザーのリロード
	 *
	 * @param \Symfony\Component\Security\Core\User\UserInterface $user
	 * @return object
	 */
	public function refreshUser(UserInterface $user)
	{
		return $this->loadUserByUsername($user->getUsername());
	}
	
	/**
	 * TODO:要確認
	 *
	 * @param $class
	 * @return bool
	 */
	public function supportsClass($class)
	{
		return true;
	}
}
