<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class siswa_model extends CI_Model {
  
      public function getAllSiswa(){
        return $this->db->get('siswa') -> result_array();
      }

      public function hapusDataSiswa($id){
        $this->db->where('id', $id);
        $this->db->delete('siswa');       
      }

      public function tambaDataSiswa(){
        $data =
        array(
          "id" => $this->input->post("id",true),
          "nama" => $this->input->post("nama",true),
          "alamat" => $this->input->post("alamat",true),
          "nim" => $this->input->post("nim",true),
        );
        $this->db->insert('siswa',$data);
      }
      public function getDataSiswaById($id){
        return $this->db->get_where('siswa',array('id'=>$id))->row_array();
      }

      public function editDataSiswa(){
        $data =
        array(
          "id" => $this->input->post("id",true),
          "nama" => $this->input->post("nama",true),
          "alamat" => $this->input->post("alamat",true),
          "nim" => $this->input->post("nim",true),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('siswa', $data);
      }

      public function cariDataSiswa(){
        $keyword = $this->input->post("keyword");
        $this->db->like('nama',$keyword);
        $this->db->or_like('alamat',$keyword);
        $this->db->or_like('nim',$keyword);
        return $this->db->get('siswa') -> result_array();
      }
  }
  
  /* End of file siswa_model.php */
  
?>