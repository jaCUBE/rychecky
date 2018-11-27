<?php
/**
 * Stahuje a zpracovává obrázky pro jednotlivá portfolia.
 * @class HobbyRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Gallery;

use \PDO;
use Rychecky\Repository;

class ImageRepository extends Repository
{
    /**
     * Stahuje všechny obrázky portfolia z databáze.
     * @param int $portfolio_id ID portfolia
     * @return Image[] Všechny obrázky portfolia
     */

    public function fetchPortfolioImages(int $portfolio_id): array
    {
        $image_list = [];

        $sql = '
          SELECT g.*
          FROM image AS g
          WHERE g.portfolio_id = :portfolio_id
            AND g.visible = 1
          ORDER BY g.order DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Gallery\Image');
        $STH->execute([
            'portfolio_id' => $portfolio_id,
        ]);


        while ($image = $STH->fetch()) { // Procházení stažených obrázků...
            /* @var $image Image */
            $image_list[] = $image;
        }

        return $image_list;
    }

    /**
     * Generuje galerii jedné položky portfolia.
     * @param int $portfolio_id ID portfolia
     * @return Image[] Galerie portfolia
     */
    public function portoflioGallery(int $portfolio_id): array
    {
        $image_list = [];

        foreach ($this->fetchPortfolioImages($portfolio_id) as $image) { // Procházení všech obrázků...
            if (!$image->isThumbnail()) { // Vyřazení thumbnaili
                $image_list[] = $image;
            }
        }

        return $image_list;
    }

    /**
     * Generuje thumbnail (náhledový obrázek) pro portfolium.
     * @param int $portfolio_id ID portfolia
     * @return Image Thumbnail (náhledová obrázek)
     */
    public function portfolioThumbnail(int $portfolio_id): Image
    {
        foreach ($this->fetchPortfolioImages($portfolio_id) as $image) { // Procházení všech obrázků...
            if ($image->isThumbnail()) { // Pouze thumbnail...
                return $image;
            }
        }

        return new Image(); // Fallback na prázdný objekt obrázku
    }

}