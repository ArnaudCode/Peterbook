<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model
{
	private $table = 'post';
	
	public function addPost($email, $content)
	{
		if(!is_string($email) OR !is_string($content) OR empty($email) OR empty($content))
		{
			return false;
		}

		$content = htmlspecialchars($content);

		return $this->db->set(array('emailpost' => $email, 'content' =>$content, 'date' => time()))
						->insert($this->table);
	}

	public function getAllPosts()
	{
		return $this->db->select('idpost, emailpost, content, date, firstname, lastname')
				->from($this->table)
				->join('user', 'user.email = '. $this->table .'.emailpost')
				->order_by('idpost', 'desc')
				->get()
				->result();
	}
}
