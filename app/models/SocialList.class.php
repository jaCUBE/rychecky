<?php

/**
 * Stahuje a zpracovává seznam ikonek sociálních sítí.
 * @class SocialList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class SocialList
{

  /**
   * Stáhne a zpracuje seznam ikonek sociálních sítí.
   * @return Social[] Seznam sociálních sítí
   */
  public static function fetchSocialList(): array
  {
    $social_list = []; // Seznam sociálních sítí

    $sql = '
      SELECT s.*
      FROM social AS s
      WHERE s.visible = 1
      ORDER BY s.order DESC, s.name ASC'; // SQL pro stažení sociálních sítí

    $STH = db()->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Social');
    $STH->execute();

    while ($social = $STH->fetch()) { /* @var $social Social */ // Prochází jednotlivé sociální sítě...
      $social_list[] = $social; // Ukládá sociální síť do pole
    }

    return $social_list;
  }
}
