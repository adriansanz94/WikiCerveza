<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $u = new User();
        $u->setNombre("Adrian");
        $u->setPassword(
            $this->passwordEncoder->encodePassword($u,'1234')
        );
        $u->setRoles(['ROLE_ADMIN']);

        $u1 = new User();
        $u1->setNombre("Steven");
        $u1->setPassword(
            $this->passwordEncoder->encodePassword($u1,'1234')
        );
        $u1->setRoles(['ROLE_ADMIN']);

        $u2 = new User();
        $u2->setNombre("Jorge");
        $u2->setPassword(
            $this->passwordEncoder->encodePassword($u2,'1234')
        );
        $u2->setRoles(['ROLE_ADMIN']);

        $manager->persist($u);
        $manager->persist($u1);
        $manager->persist($u2);

        $manager->flush();
    }
}
