<?php

class Book_Statistics_Model extends CI_Model
{

	public $id = 0;
	public $book_id;
	public $u_id;
	public $date_time;

	public function save($bookId, $uId, $dateTime)
	{
		$this->book_id = $bookId;
		$this->u_id = $uId;
		$this->date_time = $dateTime;
		$this->db->insert('book_statistics', $this);
	}


	public function alreadyAdded($bookId, $uId)
	{
		$result = $this->db->get_where('book_statistics', array('book_id' => $bookId, 'u_id' => $uId));
		return $result->num_rows() != 0;
	}


	function viewCountForTheMonth($bookId)
	{
		$sql = 'SELECT
					s.start_date + INTERVAL ( days.d ) DAY AS my_date,
					ifnull( stats.count, 0 ) AS count 
				FROM
					( SELECT LAST_DAY( CURRENT_DATE ) + INTERVAL 1 DAY - INTERVAL 1 MONTH AS start_date, LAST_DAY( CURRENT_DATE ) AS end_date ) AS s
					JOIN days ON days.d <= DATEDIFF( s.end_date, s.start_date )
					LEFT JOIN (
				SELECT
					count( _date ) AS count,
					_date AS date1 
				FROM
					( SELECT date( date_time ) AS _date FROM book_statistics WHERE book_id = ? ) AS tmp 
				WHERE
					tmp._date BETWEEN LAST_DAY( CURRENT_DATE ) + INTERVAL 1 DAY - INTERVAL 1 MONTH 
					AND LAST_DAY( CURRENT_DATE ) 
				GROUP BY
					tmp._date 
					) AS stats ON stats.date1 = s.start_date + INTERVAL ( days.d ) DAY 
				ORDER BY
					my_date';
		$result = $this->db->query($sql, array($bookId));
		return $result->result();
	}

	function viewCountAllTime($bookId)
	{
		$sql = 'SELECT
					count( id ) AS view_count 
				FROM
					book_statistics 
				WHERE
					book_id = ?';
		$result = $this->db->query($sql, array($bookId));
		return $result->result();
	}


}
