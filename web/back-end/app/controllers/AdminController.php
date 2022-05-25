<?php
header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Credentials", true);
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Max-Age: 3600 ");
header("Access-Control-Allow-Headers: * ");


class AdminController
{
    public function login()
    {
        
        $data =json_decode(file_get_contents("php://input"));
        if(isset($data->reference)){
            $referenceCheck = $data->reference;
        }
        if(isset($referenceCheck))
        {
            $data =[];
            $data['data'] =[];
            $admin = new Admin();
            $result = $admin->getAdmin();
            extract($result);
            if($reference==$referenceCheck){
                $message = array(
                    'reference'=>$reference
                );
                echo json_encode($message);
            }
            else{
                $message = array(
                    'error'=>true,
                    'message'=>'admin not found'
                );
                array_push($data['data'],$message);
                echo json_encode($data);
            }
        }
    }



}