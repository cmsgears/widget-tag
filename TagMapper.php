<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\tag;

// Yii Imports
use Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\base\Widget;

/**
 * TagMapper maps tags to models.
 *
 * @since 1.0.0
 */
class TagMapper extends Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

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
	public $app				= 'mapper';

	// Controller where mapping request need to be triggered
	public $controller		= 'csv';

	// Controller action to handle the mapping request
	public $mapAction		= 'mapItem';

	// Explicit URL to handle the controller mapping action request
	public $mapActionUrl	= null;

	// Controller action to handle the delete request
	public $deleteAction	= 'deleteItem';

	// Explicit URL to handle the controller delete action request
	public $deleteActionUrl	= null;

	// Protected --------------

	// Private ----------------

	private $tags;

	private $tagService;

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->tagService = Yii::$app->factory->get( 'tagService' );
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	public function run() {

		$this->tags	= $this->tagService->getIdNameMap();

		return $this->renderWidget();
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// TagMapper -----------------------------

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

		return Html::tag( 'div', $widgetHtml, $this->options );
	}

}
