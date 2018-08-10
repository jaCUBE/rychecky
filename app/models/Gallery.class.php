<?php
/**
 * Stahuje a zpracovává obrázky pro jednotlivá portfolia.
 * @class HobbyList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Gallery
{

    /**
     * Generuje galerii jedné položky portfolia.
     * @param PDO $db Připojení k databázi (DI)
     * @param int $portfolio_id ID portfolia
     * @return Image[] Galerie portfolia
     */
    public static function portoflioGallery(PDO $db, int $portfolio_id): array
    {
        $image_list = [];

        foreach (self::fetchPortfolioImages($db, $portfolio_id) as $image) { // Procházení všech obrázků...
            if (!$image->isThumbnail()) { // Vyřazení thumbnaili
                $image_list[] = $image;
            }
        }

        return $image_list;
    }

    /**
     * Stahuje všechny obrázky portfolia z databáze.
     * @param PDO $db Připojení k databázi (DI)
     * @param int $portfolio_id ID portfolia
     * @return Image[] Všechny obrázky portfolia
     */

    private static function fetchPortfolioImages(PDO $db, int $portfolio_id): array
    {
        $image_list = [];

        $sql = '
          SELECT g.*
          FROM image AS g
          WHERE g.portfolio_id = :portfolio_id
            AND g.visible = 1
          ORDER BY g.order DESC';

        $STH = $db->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Image');
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
     * Generuje thumbnail (náhledový obrázek) pro portfolium.
     * @param PDO $db Připojení k databázi (DI)
     * @param int $portfolio_id ID portfolia
     * @return Image Thumbnail (náhledová obrázek)
     */
    public static function portfolioThumbnail(PDO $db, int $portfolio_id): Image
    {
        foreach (self::fetchPortfolioImages($db, $portfolio_id) as $image) { // Procházení všech obrázků...
            if ($image->isThumbnail()) { // Pouze thumbnail...
                return $image;
            }
        }

        return new Image(); // Fallback na prázdný objekt obrázku
    }

}