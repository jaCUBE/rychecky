<?php

require 'bootstrap.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

/**
 * Database connection to a container
 */
$container = $app->getContainer();
$container['db'] = Rychecky::connectDatabase();


/**
 * Odstraňuje lomítko na konci adresy.
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




/**
 * Domovská stránka, homepage, index
 */
$app->get('/', function (Request $request, Response $response, array $args) {
    Rychecky::view('info', [
        'hobby' => HobbyList::all($this->db), // Seznam koníčků
        'social' => SocialList::all($this->db), // Seznam tlačítek pro sociální sítě
    ]);
});

/**
 * Seznam dovedností
 */
$app->get('/skills[/{skillType:.*}]', function (Request $request, Response $response, array $args) {
    // Get selected skill type with fallback to a default one
    $skillType = Skill::DEFAULT_SKILL_TYPE;
    if (!empty($args['skillType'])) {
        $skillType = $args['skillType'];
    }

    Rychecky::view('skill', [
        'list' => SkillList::findByType($this->db, $skillType),
        'stats' => SkillListType::fetchSkillTypeStats($this->db),
        'selectedSkillType' => $skillType,
    ]);
});

/**
 * Porfolio
 */
$app->get('/portfolio', function (Request $request, Response $response, array $args) {
    Rychecky::view('portfolio', [
        'list' => PortfolioList::all($this->db),
    ]);
});

/**
 * Zkušenosti
 */
$app->get('/experiences', function (Request $request, Response $response, array $args) {
    Rychecky::view('experiences', [
        'list' => ExperienceList::all($this->db)
    ]);
});

/**
 * Certifikáty
 */
$app->get('/certificate', function (Request $request, Response $response, array $args) {
    Rychecky::view('certificate', [
        'list' => CertificateList::all($this->db)
    ]);
});

/**
 * Kontakt
 */
$app->get('/contact', function (Request $request, Response $response, array $args) {
    Rychecky::view('contact', [
        'social' => SocialList::all($this->db)
    ]);
});


/**
 * === API ===
 */
$app->get('/api/portfolio/{id}', function (Request $request, Response $response, array $args) {
    $portfolio = Portfolio::findById($this->db, (int)$args['id']); // Položka portfolia

    ob_start();

    Rychecky::view('ajax/portfolio.ajax', [
        'portfolio' => $portfolio,
        'thumbnail' => Gallery::portfolioThumbnail($this->db, $portfolio->portfolio_id),
        'gallery' => Gallery::portoflioGallery($this->db, $portfolio->portfolio_id)
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