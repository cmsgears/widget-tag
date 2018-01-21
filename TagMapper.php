<?php
namespace cmsgears\widgets\tag;

// Yii Imports
use Yii;
use yii\helpers\Html;

class TagMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	public $template	= 'mapper';

	// The model using Tag Trait
	public $model;

	// Disable all the rendered tags.
	public $disabled	= false;

	// Notes to help user in choosing tags.
	public $notes		= '<b>Notes</b>: Specify all your tags in comma seperated values.';

	// Flag to show notes
	public $showNotes	= true;

	// Application
	public $app				= 'main';

	// Controller where mapping request need to be triggered
	public $controller		= 'tag';

	// Controller action to handle the mapping request
	public $mapAction		= 'mapModelTag';

	// Explicit URL to handle the controller mapping action request
	public $mapActionUrl	= null;

	// Controller action to handle the delete request
	public $deleteAction	= 'deleteModelTag';

	// Explicit URL to handle the controller delete action request
	public $deleteActionUrl	= null;

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

		$this->tags	= $this->tagService->getIdNameMap();

		return $this->renderWidget();
	}

	// TagWidget

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

		return Html::tag( 'div', $widgetHtml, $this->options );
	}
}
