<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 10/18/18
 * Time: 11:17 AM
 */

class CategoryLib
{

	/**
	 * CategoryLib constructor.
	 */
	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('category_model');
	}

	public function save($categoryName, $id = 0)
	{
		if ($categoryName == '') {
			throw new RuntimeException('Category name cannot be empty');
		} else {
			$this->checkAvailability($categoryName, $id);
			if ($id == 0)
				return $this->ci->category_model->save($categoryName, date("Y-m-d H:i:s"));
			else
				return $this->ci->category_model->update($id, $categoryName);
		}
	}

	public function checkAvailability($categoryName, $id)
	{
		$categoryResult = $this->ci->category_model->idNotEqualAndNameEqual($id, $categoryName);
		if ($categoryResult->num_rows() > 0) {
			throw new RuntimeException('Category is already created');
		}
	}

	public function loadAllCategories()
	{
		return $this->ci->category_model->loadAll();
	}

	public function getCategory($id)
	{
		return $this->ci->category_model->getCategory($id)[0];
	}

	public function mostViewedCategories()
	{
		return $this->ci->category_model->mostViewedCategories();
	}
}
