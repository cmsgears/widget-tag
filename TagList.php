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
use yii\helpers\Url;
use yii\base\InvalidConfigException;

/**
 * TagList widgets shows the tags based on widget options.
 *
 * @since 1.0.0
 */
class TagList extends \cmsgears\core\common\base\Widget {

	// TODO: Fix the query filters based on type, parentType and parentId

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	/**
	 * The html options for the parent container.
	 */
	public $options;

	/**
	 * It can be used to show all the available tags for a particular type.
	 */
	public $type;

	/**
	 * It can be used to show all the available tags for a particular parent type.
	 */
	public $parentType;

	/**
	 * It can be used to show tags associated with a particular parent.
	 */
	public $parentId;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

	public function init() {

		parent::init();

		// Do init tasks
	}

	// Instance Methods --------------------------------------------

	// yii\base\Widget

	public function run() {

		if( !isset( $this->parentType ) ) {

			throw new InvalidConfigException( "Tag parent type is required." );
		}

		$tagsHtml = $this->renderWidget();

		return Html::tag( 'div', $tagsHtml, $this->options );
	}

	// Tags
	public function renderWidget( $config = [] ) {

		$htmlData	= "<ul class='tags'>";

		if( isset( $tags ) && count( $tags ) ==0 ) {

			$tags	= TagService::getIdNameMap();

			foreach( $tags as $tag ) {

				$htmlData .= '<li><a href="'.Url::home().'tag/'.$tag.'">' .$tag. '</a></li>';
			}
		}

		else {

			foreach( $tags as $tag ) {

				$htmlData .= '<li><a href="'.Url::home().'tag/'.$tag->slug.'">' .$tag->name. '</a></li>';
			}
		}

		return $htmlData .= "</ul>";
   }
}
