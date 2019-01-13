<?php

namespace Rychecky;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Rychecky\Gallery\ImageRepository;

// Start rychecky.cz
require 'bootstrap.php';

// TODO: Make Slim routing beautifier...


$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => Rychecky::isDevEnvironment(),
    ]
]);


$web = new Rychecky();

/**
 * Database connection to a container
 */
$container = $app->getContainer();
$container['web'] = $web;
$container['db'] = $web->createDatabaseConnection(); // TODO: Remove-after-Doctrine
$container['em'] = $web->createEntityManager(['dbname' => 'rychecky_doctrine']);

/**
 * Remove trailing slash in URL.
 * @see https://www.slimframework.com/docs/v3/cookbook/route-patterns.html
 */
$app->add(function (Request $request, Response $response, callable $next) {
    $uri = $request->getUri();
    $path = $uri->getPath();
    if ($path !== '/' && mb_substr($path, -1) === '/') {
        // permanently redirect paths with a trailing slash
        // to their non-trailing counterpart
        $uri = $uri->withPath(substr($path, 0, -1));

        if ($request->getMethod() === 'GET') {
            return $response->withRedirect((string)$uri, 301);
        } else {
            return $next($request->withUri($uri), $response);
        }
    }

    return $next($request, $response);
});



/*
 * ------------------------------------------------------------
 */


// TODO: REMOVE! TEMPORARY FOR DOCTRINE ORM MIGRATIONS
$app->get('/migrate', function (Request $request, Response $response, array $args) {
    $migrate = new DoctrineMigration($this->db, $this->em);

    $migrate->truncate();
    $migrate->migrateHobby();
    $migrate->migrateSocial();
    $migrate->migrateSkill();
    $migrate->migrateCertificate();
});



/**
 * Homepage, index.
 */
$app->get('/', function (Request $request, Response $response, array $args) {
    $hobbyList = $this->em->getRepository(Entity\Hobby::class)->findByLocale('cs');
    $socialList = $this->em->getRepository(Entity\Social::class)->findAll();

    $this->web->view('info', [
        'hobby' => $hobbyList,
        'social' => $socialList,
    ]);
});

/*
 * ------------------------------------------------------------
 */

/**
 * Skills.
 */
$app->get('/skills[/{skillType:.*}]', function (Request $request, Response $response, array $args) {
    // Get selected skill type with fallback to a default one
    $skillType = $args['skillType'] ?? Entity\Skill::DEFAULT_SKILL_TYPE;
    $skillList = $this->em->getRepository(Entity\Skill::class)->findBy(['locale' => 'cs', 'type' => $skillType]);
    $skillTypeList = $this->em->createQuery( // DQL, TODO: Move to class
        'SELECT
            COUNT(s) AS count,
            s.type
        FROM ' . Entity\Skill::class . ' AS s
        WHERE s.locale = \'cs\'
        GROUP BY s.type'
    )->getResult();

    $this->web->view('skill', [
        'list' => $skillList,
        'stats' => $skillTypeList,
        'selectedSkillType' => $skillType,
    ]);
});

/**
 * Porfolio.
 */
$app->get('/portfolio', function (Request $request, Response $response, array $args) {
    $portolioRepository = new Portfolio\PortfolioRepository($this->db);

    $this->web->view('portfolio', [
        'list' => $portolioRepository->fetchAll(),
    ]);
});

/**
 * Experiences.
 */
$app->get('/experiences', function (Request $request, Response $response, array $args) {
    $experienceRepository = new Experience\ExperienceRepository($this->db);

    $this->web->view('experiences', [
        'list' => $experienceRepository->fetchAll(),
    ]);
});

/**
 * Certificates.
 */
$app->get('/certificate', function (Request $request, Response $response, array $args) {
    $certificateList = $this->em->getRepository(Entity\Certificate::class)->findAll();
    d($certificateList);
    $this->web->view('certificate', [
        'list' => $certificateList,
    ]);
});

/**
 * Contact.
 */
$app->get('/contact', function (Request $request, Response $response, array $args) {
    $socialList = $this->em->getRepository(Entity\Social::class)->findAll();

    $this->web->view('contact', [
        'social' => $socialList,
    ]);
});


/*
 * ------------------------------------------------------------
 */

/**
 * API: Portfolio
 */
$app->get('/api/portfolio/{id}', function (Request $request, Response $response, array $args) {
    $portfolioRepository = new Portfolio\PortfolioRepository($this->db);
    $portfolio = $portfolioRepository->findById((int)$args['id']);

    // TODO: Condition for $portfolio not found

    $imageRepository = new ImageRepository($this->db);

    ob_start();
    $this->web->view('ajax/portfolio.ajax', [
        'portfolio' => $portfolio,
        'thumbnail' => $imageRepository->portfolioThumbnail($portfolio->getPortfolioId()),
        'gallery' => $imageRepository->portoflioGallery($portfolio->getPortfolioId())
    ]);
    $portfolioHtml = ob_get_clean();

    return json_encode([
        'id' => $portfolio->getPortfolioId(),
        'data' => [
            'portfolioName' => $portfolio->getName(),
            'html' => $portfolioHtml,
        ],
    ]);
});


$app->run();
