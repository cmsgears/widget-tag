<?php
namespace cmsgears\widgets\tag;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\services\resources\TagService;

class TagMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	// The model using Tag Trait
	public $model;

	public $createUrl;
	public $deleteUrl;

	public $notes		= 'Note: Specify all your tags in comma seperated values.';

	public $template	= 'mapper';

	// Private Variables -------------------

	private $tags;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

    public function run() {

		$this->tags			= TagService::getIdNameMap();
		$this->createUrl	= $this->createUrl;
		$this->deleteUrl	= $this->deleteUrl;

        return $this->renderWidget();
    }

	// TagWidget

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [
			'tags' => $this->tags,
			'model' => $this->model,
			'createUrl' => $this->createUrl,
			'deleteUrl' => $this->deleteUrl,
			'notes' => $this->notes
		]);

        return Html::tag( 'div', $widgetHtml, $this->options );
	}
}

?>