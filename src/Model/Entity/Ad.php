<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ad Entity.
 */
class Ad extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'tipo' => true,
        'url' => true,
        'tempo' => true,
        'dt_inicio' => true,
        'dt_fim' => true,
        'ordem' => true,
        'ativo' => true,
        'imagem_file' => true,
        'video_url' => true,
        'imagem_fullpath' => true
    ];

    protected function _getImagemFullpath()
    {
        if ($this->_properties['tipo'] == 0) {
            return 'propagandas/' . $this->_properties['id'] . '/' . $this->_properties['url'];
        }
        return null;
    }
}
