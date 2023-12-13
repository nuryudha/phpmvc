<?php

class Mahasiswa_model
{

    //SERVICES
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database; // nyambungin ke file database
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan) VALUES 
                    (:nama, :nrp, :email, :jurusan)";


        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET 
                    nama = :nama, 
                    nrp = :nrp, 
                    email= :email, 
                    jurusan= :jurusan
                WHERE id = :id";


        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchDataMahasiswa()
    {
        $keywordSearch = $_POST['keywordSearch'];
        $query = "SELECT * FROM mahasiswa
                    WHERE nama LIKE :keywordSearch";
        $this->db->query($query);
        $this->db->bind('keywordSearch', "%$keywordSearch%");
        return $this->db->resultSet();
    }
}
