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
		return $this->db->query('SELECT
				book.*,
				category.category_name 
			FROM
				book
				INNER JOIN category ON book.category_id = category.id')->result();
	}

	public function getBook($id)
	{
		$this->db->select('*');
		$this->db->from('book');
		$this->db->join('category', 'category.id = book.category_id');
		$this->db->where('book.id', $id);
		$result = $this->db->get();
		if ($result->num_rows() == 0) {
			throw new RuntimeException('Book Not Found');
		}
		return $result->result();
	}


	public function idNotEqualAndNameEqual($id, $title)
	{
		return $this->db->query('SELECT * FROM book WHERE id != ? AND title = ?', array($id, $title));
	}

	public function loadBooksByCategory($categoryId, $page, $perPage)
	{
		if ($perPage > 0)
			$this->db->limit($perPage, $page);
		$result = $this->db->get_where('book', array('category_id' => $categoryId));
		return $result->result();
	}

	public function countBooksByCategory($categoryId)
	{
		$this->db->where('category_id', $categoryId);
		$this->db->from('book');
		$result = $this->db->count_all_results();
		return $result;
	}

	function getMostViewedBooks($bookId)
	{
		$sql = 'SELECT
					book.* 
				FROM
					book
					INNER JOIN (
				SELECT
					book_id,
					count( book_id ) a 
				FROM
					book_statistics 
				WHERE
					u_id IN ( SELECT u_id FROM book_statistics WHERE book_id = ? ) 
					AND book_id != ? 
				GROUP BY
					book_id 
				ORDER BY
					a DESC 
					LIMIT 5 
			) AS b ON book.id = b.book_id';
		$result = $this->db->query($sql, array($bookId, $bookId));
		return $result->result();
	}

	function getMostViewedBooksAll()
	{
		$sql = 'SELECT
				book.* 
			FROM
				book
				INNER JOIN ( SELECT book_id, count( book_id ) a FROM book_statistics GROUP BY book_id ORDER BY a DESC LIMIT 5 ) AS b ON book.id = b.book_id';
		$result = $this->db->query($sql);
		return $result->result();
	}
}
