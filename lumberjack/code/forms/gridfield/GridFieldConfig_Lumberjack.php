<?php

/**
 * GridField config necessary for managing a SiteTree object.
 *
 * @package silverstripe
 * @subpackage lumberjack
 *
 * @author Michael Strong <mstrong@silverstripe.org>
 **/
class GridFieldConfig_Lumberjack extends GridFieldConfig {

	public function __construct($itemsPerPage = null) {
		parent::__construct($itemsPerPage);
		$this->addComponent(new GridFieldButtonRow('before'));
		$this->addComponent(new GridFieldSiteTreeAddNewButton('buttons-before-left'));
		$this->addComponent(new GridFieldToolbarHeader());
		$this->addComponent(new GridFieldSortableHeader());
		$this->addComponent(new GridFieldFilterHeader());
		$this->addComponent(new GridFieldDataColumns());
		$this->addComponent(new GridFieldSiteTreeEditButton());
		$this->addComponent(new GridFieldPageCount('toolbar-header-right'));
		$this->addComponent($pagination = new GridFieldPaginator($itemsPerPage));
		$this->addComponent(new GridFieldSiteTreeState());

		$pagination->setThrowExceptionOnBadDataType(true);
	}
}