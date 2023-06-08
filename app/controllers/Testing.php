<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

    // public function __construct(){
    //     parent::__construct();

    // }

    public function index()
    {
        // $query = $this->db->query('SELECT nik, nama_lengkap FROM emp_master LIMIT 10');

        $this->db->select('nik, nama_lengkap');
        $this->db->from('emp_master');
        $this->db->limit(10);
        $query = $this->db->get();

        foreach($query->result() as $id) {
            echo $id->nik.' - ';
            echo $id->nama_lengkap.'<br>';
        }
    }

    public function sqlsrv_apache()
    {
        $this->dbsql = $this->load->database('sqlserver_apache', TRUE);

        $this->dbsql->select('nik, nama_lengkap');
        $this->dbsql->from('emp_master');
        $this->dbsql->limit(10);
        $query = $this->dbsql->get();

        foreach($query->result() as $id) {
            echo $id->nik.' - ';
            echo $id->nama_lengkap.'<br>';
        }
    }

    public function sqlsrv_odbc()
    {
        $this->dbsql = $this->load->database('sqlserver_odbc', TRUE);

        $query = $this->db->query('SELECT nik, nama_lengkap FROM emp_master LIMIT 10');

        // $this->dbsql->select('nik, nama_lengkap');
        // $this->dbsql->from('emp_master');
        // $this->dbsql->limit(10);
        // $query = $this->dbsql->get();

        foreach($query->result() as $id) {
            echo $id->nik.' - ';
            echo $id->nama_lengkap.'<br>';
        }
    }

    public function hana_odbc()
    {
        $this->sap = $this->load->database('hana_odbc', TRUE);

        $query = $this->sap->query(
            'SELECT "DocEntry", "DocNum", "ReqName", "Branch", "Department", "U_NAME", TO_NVARCHAR("DocDate", \'DD-MM-YYYY\') as "DocDateCs", TO_NVARCHAR("ReqDate", \'DD-MM-YYYY\') as "ReqDateCs", "Comments", "ReservationRequester" FROM IMIP_TEST.VIEW_PR_IT LIMIT 5'
        );

        foreach($query->result() as $id) {
            echo $id->DocEntry.' - ';
            echo $id->ReqName.'<br>';
        }
    }

}