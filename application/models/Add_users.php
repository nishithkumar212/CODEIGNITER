<?php
class Add_users extends CI_Model
{
    public function add($data)
    {
        $this->load->database();
        $this->db->set($data);
        $count=$this->db->insert('Second',$data);
        if($count>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getuser()
    {
        $this->load->database();
        $data=$this->db->get('Second');
        return $data->result();
    }

	public function deleteuser($id)
	{
		$this->db->where('firstname',$id);
		$this->db->delete('Second');
		//return true;
    }
    
    public function updateuser($fname)
    {
        $this->db->update();
    }
}
?>