<?php
namespace cmsgears\widgets\tag;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

class TagMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	// The model using Tag Trait
	public $model;

	public $createUrl;

	public $deleteUrl;

	// Disable all the rendered tags.
	public $disabled	= false;

	// Notes to help user in choosing tags.
	public $notes		= 'Note: Specify all your tags in comma seperated values.';

	// Flag to show notes
	public $showNotes	= true;

	public $template	= 'mapper';

	// Private Variables -------------------

	private $tags;

	private $tagService;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();

		$this->tagService	= Yii::$app->factory->get( 'tagService' );
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

    public function run() {

		$this->tags			= $this->tagService->getIdNameMap();
		$this->createUrl	= $this->createUrl;
		$this->deleteUrl	= $this->deleteUrl;

        return $this->renderWidget();
    }

	// TagWidget

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

        return Html::tag( 'div', $widgetHtml, $this->options );
	}
}

?>