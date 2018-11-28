<?php

/**
 * Manages all portfolio entities.
 * @class HobbyRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Portfolio;

use \PDO;
use Rychecky\Collection;
use Rychecky\Language;
use Rychecky\Gallery\ImageRepository;
use Rychecky\Repository;

class PortfolioRepository extends Repository
{
    /**
     * Download and process a collection of portfolio entities.
     * @return Collection A collection of portfolio entities
     */
    public function fetchAll(): Collection
    {
        $portfolioCollection = new Collection();
        $imageRepository = new ImageRepository($this->getDb());

        $sql = '
            SELECT p.*
            FROM portfolio AS p
            WHERE p.locale = :locale
              AND p.visible = 1
            GROUP BY p.portfolio_id
            ORDER BY p.size DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Portfolio\Portfolio');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($portfolio = $STH->fetch()) {
            /* @var $portfolio Portfolio */
            $portfolioCollection->push([
                'data' => $portfolio,
                'thumbnail' => $imageRepository->portfolioThumbnail($portfolio->portfolio_id)
            ]);
        }

        return $portfolioCollection;
    }

    /**
     * Download and process one portfolio by its ID.
     * @param int $portfolio_id Portfolio ID
     * @return Portfolio|null Downloaded portfolio
     */
    public function findById(int $portfolio_id): ?Portfolio
    {
        $sql = '
          SELECT p.*
          FROM portfolio AS p
          WHERE p.portfolio_id = :portfolio_id
            AND p.locale = :locale
            AND p.visible = 1
          LIMIT 1';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Portfolio\Portfolio');
        $STH->execute([
            'portfolio_id' => $portfolio_id,
            'locale' => Language::getLocale(),
        ]);

        $portfolio = $STH->fetch();

        return $portfolio ?: null;
    }
}
