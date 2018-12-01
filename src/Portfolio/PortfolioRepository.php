<?php

/**
 * Manages all portfolio entities.
 * @class PortfolioRepository
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
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($data = $STH->fetch()) {
            $portfolio = new Portfolio($data);

            $portfolioCollection->add([
                'data' => $portfolio,
                'thumbnail' => $imageRepository->portfolioThumbnail($portfolio->getPortfolioId())
            ]);
        }

        return $portfolioCollection;
    }

    /**
     * Download and process one portfolio by its ID.
     * @param int $portfolioId Portfolio ID
     * @return Portfolio|null Downloaded portfolio
     */
    public function findById(int $portfolioId): ?Portfolio
    {
        $sql = '
          SELECT p.*
          FROM portfolio AS p
          WHERE p.portfolio_id = :portfolio_id
            AND p.locale = :locale
            AND p.visible = 1
          LIMIT 1';

        $STH = $this->getDb()->prepare($sql);
        $STH->execute([
            'portfolio_id' => $portfolioId,
            'locale' => Language::getLocale(),
        ]);

        $row = $STH->fetch();

        return $row ? new Portfolio($row) : null;
    }
}
