<?php

class Category_Model extends CI_Model
{

	public $id = 0;
	public $category_name;
	public $created_on;

	public function save($categoryName, $createdOn)
	{
		$this->category_name = $categoryName;
		$this->created_on = $createdOn;
		$this->db->insert('category', $this);
	}

	public function update($id, $categoryName)
	{
		$this->db->where('id', $id);
		$this->db->update('category', array('category_name' => $categoryName));
	}

	public function loadAll()
	{
		return $this->db->get('category')->result();
	}

	public function getCategory($id)
	{
		$result = $this->db->get_where('category', array('id' => $id));
		if ($result->num_rows() == 0) {
			throw new RuntimeException('Category Not Found');
		}
		return $result->result();
	}


	public function idNotEqualAndNameEqual($id, $categoryName)
	{
		return $this->db->query('SELECT * FROM category WHERE id != ? AND category_name = ?', array($id, $categoryName));
	}
}
