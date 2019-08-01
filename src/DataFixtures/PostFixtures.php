<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Post;
use App\Utils\Slugger;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 21; $i < 50; $i++) {
            $post=new Post();
            $newTitle = 'Product The Norme '.$i;
            $post->setTitle($newTitle);
            $post->setSlug(Slugger::slugify($newTitle));
            $post->setContent(mt_rand(10, 1000));
            $post->setAuthorEmail("michael.pitz@cf2m.be");
            $manager->persist($post);
        }


        $manager->flush();
    }
}