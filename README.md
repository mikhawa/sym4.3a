
git:

        symfony new --full sym43a

        cd sym43a/
        
        symfony server:start

for demo:

	symfony new --demo my_demo

create db from .env.local

        php bin/console doctrine:database:create

create db's table(s) from Entity folder:

        php bin/console doctrine:schema:create 

create GeneralController:

        php bin/console make:controller 

for using ORM fixtures:

        composer require orm-fixtures --dev

create fixtures:

        php bin/console make:fixtures

view doc for fixtures : 
https://symfony.com/doc/master/bundles/DoctrineFixturesBundle/index.html

into PostFixtures.php :

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

for create fixtures:

        php bin/console doctrine:fixtures:load

add use App\Utils\Slugger; into PostFixtures.php and use this:

        $post->setSlug(Slugger::slugify($newTitle));

using doctrine for select all Posts into GeneralController:

        $posts = $this->getDoctrine()
                ->getRepository(Post::class)
                ->findAll();

        return $this->render('general/index.html.twig', [
                    'posts' => $posts,
        ]);

for dump into twig's page:

        {{ dump(fpost) }}

for find one by with Doctrine:

        $post = $this->getDoctrine()
                ->getRepository(Post::class)
                ->findOneBy(["slug"=>$slug]);

for using Twig's include:

        {% block menu %}{% include 'general/menu.html.twig' %}{% endblock %}

for using generated links into Twig menu:

        <li><a href="{{ path("homepage") }}">Accueil</a></li>

for change project to product in .env.local

        APP_ENV=dev => APP_ENV=prod

List of principal componements

        https://symfony.com/components

for delete cache in dev mode (debug)

        php bin/console cache:clear

