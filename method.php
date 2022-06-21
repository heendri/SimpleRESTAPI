<?php
require_once "koneksi.php";
class Music
{

    public  function get_all_data()
    {
        global $mysqli;
        $query = "SELECT * FROM music_table LIMIT 2";
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        // var_dump($data);
        $response = array(
            'status' => 1,
            'message' => 'Get List Music Data Successfully.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get_single_data($id = 0)
    {
        global $mysqli;
        $query = "SELECT * FROM music_table";
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1";
        }
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get Music Info Successfully.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_data()
    {
        global $mysqli;
        $arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        $nim = $_POST["nim"];
        // $hitung = 1;
        // ($hitung == count($arrcheckpost
        if ($hitung == count($arrcheckpost)) {

            $result = mysqli_query($mysqli, "INSERT INTO tbl_mahasiswa SET
               nim = '$_POST[nim]',
               nama = '$_POST[nama]',
               jk = '$_POST[jk]',
               alamat = '$_POST[alamat]',
               jurusan = '$_POST[jurusan]'");

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Mahasiswa Added Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Mahasiswa Addition Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_data($id)
    {
        global $mysqli;
        parse_str(file_get_contents('php://input'), $_PUT);
        $arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
        $hitung = count(array_intersect_key($_PUT, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {

            $result = mysqli_query($mysqli, "UPDATE tbl_mahasiswa SET
              nim = '$_PUT[nim]',
              nama = '$_PUT[nama]',
              jk = '$_PUT[jk]',
              alamat = '$_PUT[alamat]',
              jurusan = '$_PUT[jurusan]'
              WHERE id='$id'");

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Mahasiswa Updated Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Mahasiswa Updation Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function test()
    {
        parse_str(file_get_contents('php://input'), $_PUT);
        // var_dump($_PUT);
        $response = array(
            'message' => $_PUT["nama"]
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function delete_mhs($id)
    {
        global $mysqli;
        $query = "DELETE FROM tbl_mahasiswa WHERE id=" . $id;
        if (mysqli_query($mysqli, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Mahasiswa Deleted Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Mahasiswa Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
