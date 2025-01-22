<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    )
    {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('root');
        $user->setPassword($this->passwordHasher->hashPassword($user, '123456'));
        $user->setRoles(['ROLE_USER']);
        $user->setEmail('root@root.com');

        $manager->persist($user);
        $manager->flush();
    }
}
