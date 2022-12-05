<?php
class crud
{
    public function delete($query,$conn){
        if ($conn->query($query)===TRUE){
            $result="success";
        }else{
            $result='failed'.$conn->error;
        }
        echo json_encode($result);
        $conn->close();
    }
    public function addData($query,$conn,$url){
        if ($conn->query($query)===TRUE){
            $result=$url;
        }else{
            $result='failed'.$conn->error;
        }
        echo json_encode($result);
        $conn->close();
    }
    public function multiAddData($queryCek,$multiQuery,$conn){
        if ($conn->query($queryCek)->num_rows > 0){
            $result="ada data";
        }else{
            if ($conn->multi_query($multiQuery)==TRUE){
                $result="success";
            }else{
                $result='failed'.$conn->error;
            }
        }
        echo json_encode($result);
        $conn->close();
    }
    public function update($query,$conn,$url){
        if ($conn->multi_query($query)===TRUE){
            $result=$url;
        }else{
            $result='failed'.$conn->error;
        }
        echo json_encode($result);
        $conn->close();
    }
    public function multiUpdate($queryCek,$multiQuery,$conn,$url){
        if ($conn->query($queryCek)->num_rows > 0){
            $result="ada data";
        }else{
            if ($conn->multi_query($multiQuery)==TRUE){
                $result=$url;
            }else{
                $result='failed'.$conn->error;
            }
        }
        echo json_encode($result);
        $conn->close();
    }
}