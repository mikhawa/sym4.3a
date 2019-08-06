
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

for generate path in twig:

        <li><a href="{{ path("testLaRoute", {"year":2011,"slug":"test"}) }}">2011/test en html</a></li>

and its route in controller:

        /**
        * @Route("/{year}/{slug}.{format}", name="testLaRoute", requirements={
        *   "year"   = "\d{4}",
         *   "format" = "html|xml"
        * }, defaults={"format" = "html"})
        */
        public function testRouting($year, $slug, $format) {
            return new Response(
                "On pourrait afficher l'annonce correspondant au
             slug '" . $slug . "', créée en " . $year . " et au format " . $format . "."
        );
        }

create SecondController

        php bin/console make:controller

for generate url into Controller:

        use Symfony\Component\Routing\RouterInterface;
        ...
        /**
        * @Route("/second/{page}", name="second", requirements={"page" = "\d+"}, defaults={"page" = 1})
        */
        public function index(RouterInterface $router)
        {
            $url = $router->generate(
            'second', // 1er argument : le nom de la route
            ['page' => mt_rand(1,30)]       // 2e argument : les paramètres
        );
        return $this->render('second/index.html.twig', [
            'page' => $url,
        ]);
        }

for using truncate (Twig extension):

        composer require twig/extensions

change config/packages/twig_extensions.yaml

        # Uncomment any lines below to activate that Twig extension
        #Twig\Extensions\ArrayExtension: null
        #Twig\Extensions\DateExtension: null
        #Twig\Extensions\IntlExtension: null
        #Twig\Extensions\TextExtension: null

        with (minimum the # before TextExtension

        # Uncomment any lines below to activate that Twig extension
        Twig\Extensions\ArrayExtension: null
        Twig\Extensions\DateExtension: null
        Twig\Extensions\IntlExtension: null
        Twig\Extensions\TextExtension: null

use truncate for cut the text without cut words:

        {{ item.content|truncate(50,true) }}

for debug routing:

        php bin/console debug:router

