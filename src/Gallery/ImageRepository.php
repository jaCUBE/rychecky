<?php
/**
 * Manages all image entities.
 * @class ImageRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Gallery;

use \PDO;
use Rychecky\Collection;
use Rychecky\Repository;

class ImageRepository extends Repository
{
    /**
     * Download and process an image gallery for one portfolio item.
     * @param int $portfolioId Portfolio ID
     * @return Collection A collection of images for portfolio
     */
    public function fetchPortfolioImages(int $portfolioId): Collection
    {
        $imageCollection = new Collection();

        $sql = '
          SELECT g.*
          FROM image AS g
          WHERE g.portfolio_id = :portfolio_id
            AND g.visible = 1
          ORDER BY g.order DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Gallery\Image');
        $STH->execute([
            'portfolio_id' => $portfolioId,
        ]);


        while ($image = $STH->fetch()) {
            /* @var $image Image */
            $imageCollection->push($image);
        }

        return $imageCollection;
    }

    /**
     * Fetch and process gallery images for one portfolio item.
     * @param int $portfolio_id Portfolio ID
     * @return Collection A collection of images for portfolio gallery
     */
    public function portoflioGallery(int $portfolio_id): Collection
    {
        $imageCollection = new Collection();

        foreach ($this->fetchPortfolioImages($portfolio_id) as $image) {
            if (!$image->isThumbnail()) { // No thumbnails in gallery
                $imageCollection->push($image);
            }
        }

        return $imageCollection;
    }

    /**
     * Fetch and process one image thumbnail for portfolio item.
     * @param int $portfolio_id Portfolio ID
     * @return Image Portfolio thumbnail image
     */
    public function portfolioThumbnail(int $portfolio_id): Image
    {
        foreach ($this->fetchPortfolioImages($portfolio_id) as $image) {
            if ($image->isThumbnail()) {
                return $image;
            }
        }

        return new Image(); // Fallback na prázdný objekt obrázku
    }
}
