<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * Article Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $description
 * @property string $slug
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 * @property int $categorie_id
 * @property \App\Model\Entity\Category $category
 */
class Article extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    public function _getModifiedDate()
    {
        $modified = Time::parse($this->modified);
        return $modified->nice('Europe/Paris', 'fr-FR');
    }

    public function _getMarkdownContent()
    {
        // Parsedown
        $Parsedown = new \Parsedown();
        $texte =  $Parsedown->setMarkupEscaped(true)->text($this->content);

        // Emojione
        $client = new \Emojione\Client(new \Emojione\Ruleset());
        $client->imageType = 'png';

        return $client->shortnameToImage($texte);

    }

}
