<?php

namespace Rychecky;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Rychecky\Gallery\ImageRepository;


require 'bootstrap.php';

// TODO: Make Slim routing beautifier...

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]); // TODO: Remove debug settings!



/**
 * Database connection to a container
 */
$container = $app->getContainer();
$container['db'] = Rychecky::connectDatabase();

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



/**
 * Homepage, index.
 */
$app->get('/', function (Request $request, Response $response, array $args) {
    $hobbyRepository = new Hobby\HobbyRepository($this->db);
    $socialRepository = new Social\SocialRepository($this->db);

    Rychecky::view('info', [
        'hobby' => $hobbyRepository->fetchAll(),
        'social' => $socialRepository->fetchAll(),
    ]);
});

/*
 * ------------------------------------------------------------
 */

/**
 * Seznam dovedností
 */
$app->get('/skills[/{skillType:.*}]', function (Request $request, Response $response, array $args) {
    // Get selected skill type with fallback to a default one
    $skillType = $args['skillType'] ?? Skill\Skill::DEFAULT_SKILL_TYPE;

    $skillRepository = new Skill\SkillRepository($this->db);

    Rychecky::view('skill', [
        'list' => $skillRepository->fetchByType($skillType),
        'stats' => $skillRepository->fetchTypeStats(),
        'selectedSkillType' => $skillType,
    ]);
});

/**
 * Porfolio
 */
$app->get('/portfolio', function (Request $request, Response $response, array $args) {
    $portolioRepository = new Portfolio\PortfolioRepository($this->db);

    Rychecky::view('portfolio', [
        'list' => $portolioRepository->fetchAll(),
    ]);
});

/**
 * Zkušenosti
 */
$app->get('/experiences', function (Request $request, Response $response, array $args) {
    $experienceRepository = new Experience\ExperienceRepository($this->db);

    Rychecky::view('experiences', [
        'list' => $experienceRepository->fetchAll(),
    ]);
});

/**
 * Certifikáty
 */
$app->get('/certificate', function (Request $request, Response $response, array $args) {
    $certificateRepository = new Certificate\CertificateRepository($this->db);

    Rychecky::view('certificate', [
        'list' => $certificateRepository->fetchAll(),
    ]);
});

/**
 * Kontakt
 */
$app->get('/contact', function (Request $request, Response $response, array $args) {
    $socialRepository = new Social\SocialRepository($this->db);

    Rychecky::view('contact', [
        'social' => $socialRepository->fetchAll(),
    ]);
});


/*
 * ------------------------------------------------------------
 */

$app->get('/api/portfolio/{id}', function (Request $request, Response $response, array $args) {
    $portfolioRepository = new Portfolio\PortfolioRepository($this->db);
    $portfolio = $portfolioRepository->findById((int)$args['id']);

    $imageRepository = new ImageRepository($this->db);

    ob_start();

    Rychecky::view('ajax/portfolio.ajax', [
        'portfolio' => $portfolio,
        'thumbnail' => $imageRepository->portfolioThumbnail($portfolio->portfolio_id),
        'gallery' => $imageRepository->portoflioGallery($portfolio->portfolio_id)
    ]);

    $portfolioHtml = ob_get_clean();

    return json_encode([
        'id' => $portfolio->portfolio_id,
        'data' => [
            'portfolio' => $portfolio,
            'html' => $portfolioHtml,
        ],
    ]);
});


$app->run();