<?php

class Book_Model extends CI_Model
{

	public $id = 0;
	public $title;
	public $author;
	public $category_id;
	public $unit_price;
	public $image_name;
	public $created_on;
	public $description;

	public function save($title, $author, $category_id, $unit_price, $description, $image_name, $createdOn)
	{
		$this->title = $title;
		$this->author = $author;
		$this->category_id = $category_id;
		$this->unit_price = $unit_price;
		$this->image_name = $image_name;
		$this->created_on = $createdOn;
		$this->description = $description;
		$this->db->insert('book', $this);
	}

	public function update($id, $title, $author, $category_id, $unit_price, $description, $image_name)
	{
		$this->db->where('id', $id);
		$this->db->update('category', array('title' => $title, 'author' => $author, 'unit_price' => $unit_price, ', image_name' => $image_name, 'category_id' => $category_id, 'description' => $description));
	}

	public function loadAll()
	{
		return $this->db->get('book')->result();
	}

	public function getBook($id)
	{
		$result = $this->db->get_where('book', array('id' => $id));
		if ($result->num_rows() == 0) {
			throw new RuntimeException('Book Not Found');
		}
		return $result->result();
	}


	public function idNotEqualAndNameEqual($id, $title)
	{
		return $this->db->query('SELECT * FROM book WHERE id != ? AND title = ?', array($id, $title));
	}
}
