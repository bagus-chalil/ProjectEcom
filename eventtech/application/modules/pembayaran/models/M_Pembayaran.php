<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pembayaran extends CI_Model
{
    public function delete_Pembayaran($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pembayaran_midtrans');
    }
    public function getPembayaran(){
        $query = "SELECT event.*,pembayaran_midtrans.* 
                    from pembayaran_midtrans 
                    join event 
                    on pembayaran_midtrans.event=event.event_id
                    order by (pembayaran_midtrans.order_id);
        ";
        return $this->db->query($query)->result_array();
    }
    public function getJmlPembayaran(){
        $query = "SELECT COUNT(order_id) as jml FROM pembayaran_midtrans 
        ";
        return $this->db->query($query)->result_array();
    }
    public function getJmlStatusFailed(){
        $query = "SELECT COUNT(transaction_status) as statusf FROM pembayaran_midtrans where transaction_status='expire'";
        return $this->db->query($query)->result_array();
    }
    public function getJmlStatusSuccess(){
        $query = "SELECT COUNT(transaction_status) as statuss FROM pembayaran_midtrans where transaction_status='settlement'";
        return $this->db->query($query)->result_array();
    }
    public function getJmlStatusPending(){
        $query = "SELECT COUNT(transaction_status) as statusp FROM pembayaran_midtrans where transaction_status='pending'";
        return $this->db->query($query)->result_array();
    }
}