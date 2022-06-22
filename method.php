<?php
require_once "connection.php";
class Music
{

    public  function get_all_data()
    {
        global $mysqli;
        // select random data from db because we cant show all the data (http limit)
        $query = "SELECT id,artist_name,track_name FROM music ORDER BY RAND() LIMIT 20";
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
        $query = "SELECT * FROM music";
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1";
        }
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        if ($data) {
            $response = array(
                'status' => 1,
                'message' => 'Get Music Info Successfully.',
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Music Data not found.'
                // 'data' => $data
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_data()
    {
        global $mysqli;
        // the POST request method must have same parameter for our data
        // we will describe it in db
        $default_parameter = array(
            'id' => '', 'artist_name' => '', 'track_name' => '', 'release_date' => '', 'genre'   => '', 'topic'   => '', 'lyrics'   => ''
        );

        // to validate the input
        $count_param = count(array_intersect_key($_POST, $default_parameter));
        // // $count_param = 1;
        // // ($count_param == count($default_parameter

        // count param == default param means we have same amount of parameter/variable in our db and from request
        if ($count_param == count($default_parameter)) {

            $result = mysqli_query($mysqli, "INSERT INTO music SET
                id = '$_POST[id]',
                artist_name = '$_POST[artist_name]',
                track_name = '$_POST[track_name]',
                release_date = '$_POST[release_date]', 
                genre   = '$_POST[genre]', 
                topic = '$_POST[topic]',
                lyrics   = '$_POST[lyrics]'");

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Music Added Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Music Addition Failed.'
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
        $default_parameter = array(
            'artist_name' => '', 'track_name' => '', 'release_date' => '', 'genre'   => '', 'topic'   => '', 'lyrics'   => ''
        );
        $count_param = count(array_intersect_key($_PUT, $default_parameter));
        if ($count_param == count($default_parameter)) {

            $result = mysqli_query($mysqli, "UPDATE music SET
                artist_name = '$_PUT[artist_name]',
                track_name = '$_PUT[track_name]',
                release_date = '$_PUT[release_date]', 
                genre   = '$_PUT[genre]', 
                topic = '$_PUT[topic]',
                lyrics   = '$_PUT[lyrics]'
                WHERE id='$id'");

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Music Data Updated Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Music Data Updation Failed.'
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

    // function test()
    // {
    //     parse_str(file_get_contents('php://input'), $_PUT);
    //     // var_dump($_PUT);
    //     $response = array(
    //         'message' => $_PUT["nama"]
    //     );
    //     header('Content-Type: application/json');
    //     echo json_encode($response);
    // }

    function delete_data($id)
    {
        global $mysqli;
        $query = "DELETE FROM music WHERE id=" . $id;
        if (mysqli_query($mysqli, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Music Data Deleted Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Music Data Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
