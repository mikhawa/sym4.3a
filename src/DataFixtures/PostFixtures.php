<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Post;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $post=new Post();
            $post->setTitle('Product '.$i);
            $post->setSlug('product-'.$i);
            $post->setContent(mt_rand(10, 1000));
            $post->setAuthorEmail("michael.pitz@cf2m.be");
            $manager->persist($post);
        }


        $manager->flush();
    }
}