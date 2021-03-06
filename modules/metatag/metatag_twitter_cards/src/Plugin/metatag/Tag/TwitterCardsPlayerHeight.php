<?php
/**
 * @file
 * Contains \Drupal\metatag_twitter_cards\Plugin\metatag\Tag\TwitterCardsPlayerHeight.
 */

namespace Drupal\metatag_twitter_cards\Plugin\metatag\Tag;

use Drupal\metatag\Plugin\metatag\Tag\MetaPropertyBase;

/**
 * The Twitter Cards player height metatag.
 *
 * @MetatagTag(
 *   id = "twitter_cards_player_height",
 *   label = @Translation("Media player height"),
 *   description = @Translation("The height of the media player iframe, in pixels. Required when using a Media player card."),
 *   name = "twitter:player:height",
 *   group = "twitter_cards",
 *   weight = 402,
 *   image = FALSE,
 *   multiple = FALSE
 * )
 */
class TwitterCardsPlayerHeight extends MetaPropertyBase {
}
