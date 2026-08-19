<?php
class conexion
{
    private $hostname;
    private $username;
    private $password;
    private $database;
    
    public $conexion;

    function __construct()
    {
        $this->hostname = '34.55.77.19';
        $this->username = 'sondeadmin';
        $this->password = 'srk142536';
        $this->database = 'base1';
    }
    function getConexion()
    {
        try{
            $this->conexion = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);            
        }
        catch(Exception $e)
        {
            echo $e->getMessage();  
        }
        return $this->conexion;
    }
    function closeConexion()
    {
        $this->conexion->close();
    }
}