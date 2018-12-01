<?php
/**
 * Manages all image entities.
 * @class ImageRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Gallery;

use Rychecky\Collection;
use Rychecky\Repository;

class ImageRepository extends Repository
{
    /**
     * Download and process an image gallery for one portfolio item.
     * @param int $portfolioId Portfolio ID
     * @return \Rychecky\Collection A collection of images for portfolio
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
        $STH->execute([
            'portfolio_id' => $portfolioId,
        ]);

        while ($row = $STH->fetch()) {
            $imageCollection->add(new Image($row));
        }

        return $imageCollection;
    }

    /**
     * Fetch and process gallery images for one portfolio item.
     * @param int $portfolioId Portfolio ID
     * @return \Rychecky\Collection A collection of images for portfolio gallery
     */
    public function portoflioGallery(int $portfolioId): Collection
    {
        $imageCollection = new Collection();

        // Search portfolio regular images in gallery
        foreach ($this->fetchPortfolioImages($portfolioId) as $image) {
            if (!$image->isThumbnail()) { // No thumbnails in gallery
                $imageCollection->add($image);
            }
        }

        return $imageCollection;
    }

    /**
     * Fetch and process one image thumbnail for portfolio item.
     * @param int $portfolioId Portfolio ID
     * @return \Rychecky\Gallery\Image Portfolio thumbnail image
     */
    public function portfolioThumbnail(int $portfolioId): Image
    {
        // Search portfolio thumbnail in gallery
        foreach ($this->fetchPortfolioImages($portfolioId) as $image) {
            if ($image->isThumbnail()) {
                return $image;
            }
        }

        return new Image(); // Fallback to empty Image object if thumbnail is not found
    }
}
