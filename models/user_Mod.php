<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user_Mod extends CI_Model {

        
        public function get_all_sek_count(){
            return $this->db->count_all_results('sekretaris');
        }
        
        public function get_user($id){
            if($user=$this->db->get_where('user',['id'=>$id])->row()){
                return $user->user_name;
            }else{
                return false;
            }
            
        }


        public function get_all_op($length="",$start="",$order="",$dir="",$search=""){
            $this->db->order_by($order,$dir); 
            $this->db->like('fullname',$search);
            $this->db->or_like('email',$search);
            $this->db->limit($length,$start);
            $this->db->from('user');
            $this->db->join('sekretaris', 'sekretaris.id = user.id');
            return  $query = $this->db->get()->result();
        }

        public function del_Sekre($id_sekretaris){
            $this->db->delete('sekretaris',['id_sekretaris'=>$id_sekretaris]);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
}

?>