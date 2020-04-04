<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Managemen extends CI_Controller {

    public function list_op($param=""){
            $judul="User Managemen";
            $halaman='user_maneg/list_op';
            $this->template->TemplateGen($judul,$halaman);  
    }
    public function get_op(){
        $length= intval($this->input->post('length'));
        $start= intval($this->input->post('start'));
        $draw= intval($this->input->post('draw'));
        $order= $this->input->post('order');
        $search= $this->input->post('search');
        $search = $search['value'];
        $col=0;
        $dir="";

            if(!empty($order)){
                foreach($order as $or){
                    $col = $or['column'];
                    $dir = $or['dir'];
                }
            }
            if($dir!='asc' && $dir!='desc'){
                $dir='desc';
            }
            $valid_columns=[
                1=>'fullname',
                2=>'user_name',
                3=>'email',
            ];
            if(!isset($valid_columns[$col])){
                $order=null;
            }else{
                $order= $valid_columns[$col];
            }

        $data=$this->user_Mod->get_all_op($length,$start,$order,$dir,$search);
        $json = [];
        $no=1+$start;
        foreach($data as $row){
            $json[]=[
                $no++,
                $row->fullname,
                $row->user_name,  
                $row->email,
                '<a href="#" type="button" class="btn btn-warning  edt-usr">Edit</a>
                <a href="'.base_url().'User_Managemen/delSekre/'.$row->id.'/'.$row->id_sekretaris.'" type="button" class="btn btn-danger" >Delete</a>
                </div>'
            ];
        }
        $tot=$this->user_Mod->get_all_sek_count();
        // $respon['draw']=$draw;
        $respon['recordsTotal']=$tot;
        $respon['recordsFiltered']=$tot;
        $respon['data']=$json;
        echo json_encode($respon);die();
    }
    public function delSekre($iduser,$id_sekretaris){
        $cek_user=$this->user_Mod->get_user($iduser);

        if($this->user_Mod->del_Sekre($id_sekretaris)== true){
            $this->session->set_flashdata('pesanaddop','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              Berhasil Menghapus '.$cek_user.' Sebagai Sekretaris
            </div>');  
            redirect("User_Managemen/list_op");
        }else{
            $this->session->set_flashdata('pesanaddop','<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               Gagal Menghapus  '.$cek_user.' Sebagai Sekretaris
            </div>');  
            redirect("User_Managemen/list_op");
        }    
    }
    
}
?>